<?php

namespace App\Libraries;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        parse_str($conn->httpRequest->getUri()->getQuery(), $query);
        $userId = $query['userId'] ?? null;

        if ($userId) {
            // Asosiasikan koneksi dengan ID pengguna
            $conn->userId = $userId;
            $this->clients->attach($conn);
            echo "User {$userId} connected\n";
        } else {
            // Tidak ada ID pengguna yang diberikan, tutup koneksi
            $conn->close();
        }
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg);
        $targetUserId = $data->targetUserId;

        foreach ($this->clients as $client) {
            if ($client->userId == $targetUserId) {
                // Kirim pesan hanya ke pengguna yang diajak berbicara
                $client->send($data->message);
                break;
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        // Koneksi ditutup, hapus dari storage
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        // Terjadi error, tutup koneksi
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}

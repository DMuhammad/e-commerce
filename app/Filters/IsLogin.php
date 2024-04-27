<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class IsLogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // If user is already logged in
        if (session()->get('id')) {
            // then redirect him to the dashboard page
            return redirect()->to('/dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
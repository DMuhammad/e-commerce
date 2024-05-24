<?= $this->extend('layouts/admin/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-dark fw-semibold">Transactions</h3>
                <p class="text-subtitle text-muted">
                    Ensuring accuracy and security through meticulous transaction validation processes
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Transactions
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header ">
                <h5 class="card-title fw-medium text-dark">Transactions Table</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="display nowrap table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($transactions as $transaction) : ?>
                                <tr>

                                    <td><?= $no++ ?></td>
                                    <td><?= $transaction->kode_transaksi ?></td>
                                    <td><?= $transaction->created_at ?></td>
                                    <td><?= $transaction->user->nama_lengkap ?></td>
                                    <td>Rp. <?= $transaction->total_bayar ?></td>
                                    <td>
                                        <?php if ($transaction->status == 'pending') : ?>
                                            <span class="badge bg-warning">Pending</span>
                                        <?php elseif ($transaction->status == 'canceled') : ?>
                                            <span class="badge bg-danger">Canceled</span>
                                        <?php elseif ($transaction->status == 'success') : ?>
                                            <span class="badge bg-success">Success</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#detail<?= $transaction->id ?>" class="btn btn-info btn-sm edit-button"">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                        <div class="modal fade" id="detail<?= $transaction->id ?>" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Transaction
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <table class="table table-striped">
                                                                            <tr>
                                                                                <th>Pembeli</th>
                                                                                <td><?= $transaction->user->nama_lengkap ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Produk</th>
                                                                                <?php foreach ($transaction->detailtransactions as $detail) : ?>
                                                                                    <td><?= $detail->nama_produk ?> <?= $detail->variant ?> x<?= $detail->qty ?> pcs</td>
                                                                                <?php endforeach; ?>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit<?= $transaction->id ?>" class="btn btn-warning btn-sm edit-button"">
                                            <i class=" fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <div class="modal fade" id="edit<?= $transaction->id ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Change Status Transaction
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form form-horizontal" id="form-product" method="post" action="<?= base_url('dashboard/transactions/update/') . $transaction->id ?>">
                                                            <div class="form-body">
                                                                <div class="col-md-12 form-group">
                                                                    <label for="category">Status</label>
                                                                    <select class="form-control" name="status" required>
                                                                        <?php foreach ($statuses as $status) { ?>
                                                                            <option value="<?= $status ?>" <?= ($status == $transaction->status) ? 'selected' : '' ?>><?= $status ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                                <div class="col-sm-12 d-flex justify-content-end">
                                                                    <button type="submit" name="submit" class="btn btn-success me-1 mb-1">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="<?= base_url('dashboard/transactions/delete/') . $transaction->id ?>" method="POST" class="form-delete d-inline-block">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <button type="submit" class="btn btn-danger btn-sm delete-item">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-item');
        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });

    });
</script>

<?= $this->endSection(); ?>
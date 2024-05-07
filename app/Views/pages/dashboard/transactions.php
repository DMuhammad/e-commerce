<?= $this->extend('layouts/admin/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Transactions</h3>
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
                <h5 class="card-title">Transactions Table</h5>
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
                            <tr>
                                <td>1</td>
                                <td>INV-20210403-001</td>
                                <td>2021-04-03</td>
                                <td>Customer 1</td>
                                <td>Rp. 100.000</td>
                                <td>
                                    <span class="badge bg-warning">Pending</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editStatusModal">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger delete-item">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>INV-20210403-002</td>
                                <td>2021-04-03</td>
                                <td>Customer 2</td>
                                <td>Rp. 200.000</td>
                                <td>
                                    <span class="badge bg-info">Process</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editStatusModal">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger delete-item">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>INV-20210403-003</td>
                                <td>2021-04-03</td>
                                <td>Customer 3</td>
                                <td>Rp. 300.000</td>
                                <td>
                                    <span class="badge bg-success">Success</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editStatusModal">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger delete-item">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form Edit Status</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form form-horizontal" id="form-product" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="col-md-12 form-group">
                                                        <label for="status">Status</label>
                                                        <select class="form-control" name="status" id="status" required>
                                                            <option value="" disabled selected>--Change Status--</option>
                                                            <option value="1">Pending</option>
                                                            <option value="2">Process</option>
                                                            <option value="3">Success</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
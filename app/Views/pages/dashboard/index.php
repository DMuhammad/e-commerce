<?= $this->extend('layouts/admin/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <h3 class="text-dark fw-semibold">Profile Statistics</h3>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xxl-5 d-flex justify-content-start align-items-center">
                            <div class="stats-icon mb-2" style="background-color: #D9D5F6;">
                                <i class="fa-solid fa-clipboard-check"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Categories</h6>
                            <h6 class="fw-bold text-dark mb-0">112.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon mb-2" style="background-color: #D0EFF8;">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Products</h6>
                            <h6 class="fw-bold text-dark mb-0">112</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon mb-2" style="background-color: #C6EEE6;">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Orders</h6>
                            <h6 class="fw-bold text-dark mb-0">183.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon mb-2" style="background-color: #FDEDD2;">
                                <i class="fa-solid fa-user text-warning"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Customers</h6>
                            <h6 class="fw-bold text-dark mb-0">80.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-dark fw-semibold mb-0">Sales Analytics</div>
                    <canvas id="line"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-dark fw-semibold">Top Sales</div>
                    <div class="d-flex justify-content-center align-items-center">
                        <canvas id="donut"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="fw-semibold text-dark card-title mb-4">Latest Transactions</h6>
                    <div class="table-responsive">
                        <table id="table1" class="display table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th data-priority="1">Invoice</th>
                                    <th>Customer</th>
                                    <th data-priority="2">Date</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>INV-20210403-001</td>
                                    <td>Customer 1</td>
                                    <td>2021-04-03</td>
                                    <td>Rp. 100.000</td>
                                    <td>
                                        <span class="badge bg-warning">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>INV-20210403-002</td>
                                    <td>Customer 2</td>
                                    <td>2021-04-03</td>
                                    <td>Rp. 200.000</td>
                                    <td>
                                        <span class="badge bg-info">Process</span>
                                    </td>
                                </tr>
                                <!-- AMBIL 5 DATA TRANSAKSI TERAKHIR -->
                                <?php for ($i = 0; $i < 3; $i++) {  ?>
                                    <tr>
                                        <td>3</td>
                                        <td>INV-20210403-003</td>
                                        <td>Customer 3</td>
                                        <td>2021-04-03</td>
                                        <td>Rp. 300.000</td>
                                        <td>
                                            <span class="badge bg-success">Success</span>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>
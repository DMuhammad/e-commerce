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
                            <h6 class="fw-bold text-dark mb-0"><?= $total_categories ?></h6>
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
                            <h6 class="fw-bold text-dark mb-0"><?= $total_products ?></h6>
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
                            <h6 class="fw-bold text-dark mb-0"><?= $total_transactions ?></h6>
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
                            <h6 class="fw-bold text-dark mb-0"><?= $total_users ?></h6>
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
                        <table class="table table-striped">
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
                                <?php $no = 1; ?>
                                <?php foreach ($transactions as $key => $transaction) : ?>
                                    <tr>
                                        <td> <?= $no++ ?> </td>
                                        <td><?= $transaction->kode_transaksi ?></td>
                                        <td><?= $transaction->nama_lengkap ?></td>
                                        <td><?= $transaction->created_at ?></td>
                                        <td>Rp. <?= number_format($transaction->total_bayar, 0, ',', '.') ?></td>
                                        <td>
                                            <?php if ($transaction->status == 'pending') : ?>
                                                <span class="badge bg-warning">Pending</span>
                                            <?php elseif ($transaction->status == 'canceled') : ?>
                                                <span class="badge bg-danger">Canceled</span>
                                            <?php elseif ($transaction->status == 'success') : ?>
                                                <span class="badge bg-success">Success</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/extensions/chart.js/chart.umd.js') ?>"></script>
<script>
    let productNames = <?= json_encode(array_column($top_sales, 'nama_produk')) ?>;
    let productSales = <?= json_encode(array_column($top_sales, 'total_qty')) ?>;

    const donut = document.getElementById("donut").getContext("2d");
    const myDonut = new Chart(donut, {
        type: "doughnut",
        data: {
            labels: [...productNames],
            datasets: [{
                backgroundColor: [
                    "#FFC107",
                    "#28A745",
                    "#007BFF",
                    "#DC3545",
                    "#17A2B8",
                ],
                data: [...productSales],
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            title: {
                display: false,
            },
            tooltips: {
                mode: "index",
                intersect: false,
            },
        },
    });

    let salesPerMonth = <?= json_encode($sales_per_month) ?>;
    let months = salesPerMonth.map((item) => {
        return `${item.year}-${item.month}`;
    });

    let sales = salesPerMonth.map((item) => {
        return item.total_qty;
    });

    const line = document.getElementById("line").getContext("2d");
    const myLine = new Chart(line, {
        type: "line",
        data: {
            labels: [...months],
            datasets: [{
                label: "Sales",
                data: [...sales],
                borderColor: "#007BFF",
                backgroundColor: "rgba(0, 123, 255, 0.1)",
                pointBackgroundColor: "#007BFF",
                pointBorderColor: "#007BFF",
                pointHoverBackgroundColor: "#007BFF",
                pointHoverBorderColor: "#007BFF",
                pointRadius: 4,
                pointBorderWidth: 2,
                pointHoverRadius: 6,
                pointHoverBorderWidth: 2,
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            title: {
                display: false,
            },
            tooltips: {
                mode: "index",
                intersect: false,
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: "Month",
                    },
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: "Sales",
                    },
                },
            },
        },
    });
</script>

<?= $this->endSection(); ?>
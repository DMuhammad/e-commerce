<?= $this->extend('layouts/admin/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="fw-semibold text-dark">Sales Report</h3>
                <p class="text-subtitle text-muted">
                    A report of all sales transactions
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Reports
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-md-8 col-10">
                        <h5 class="card-title fw-medium text-dark">Sales Table</h5>
                    </div>
                    <div class="col-md-4 col-12">
                        <div id="reportrange" style="cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; ">
                            <i class="fa-regular fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="display nowrap table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>No Order</th>
                                <th>Product Sold</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2021-10-10</td>
                                <td>001</td>
                                <td>18</td>
                                <td>Rp. 1.800.000</td>
                            </tr>
                            <tr>
                                <td>2</td>

                                <td>2021-10-11</td>
                                <td>002</td>
                                <td>20</td>
                                <td>Rp. 3.000.000</td>
                            </tr>
                            <tr>
                                <td>3</td>

                                <td>2021-10-12</td>
                                <td>003</td>
                                <td>15</td>
                                <td>Rp. 3.000.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const start = moment().subtract(29, 'days');
        const end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    })
</script>

<?= $this->endSection(); ?>
<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
  exit();
}

include '../auth/config.php';

// Ambil data statistik
$total_vehicles = $conn->query("SELECT COUNT(*) as total FROM armada")->fetch_assoc()['total'];
$total_bookings = $conn->query("SELECT COUNT(*) as total FROM peminjaman")->fetch_assoc()['total'];
$total_payments = $conn->query("SELECT SUM(jumlah_bayar) as total FROM pembayaran")->fetch_assoc()['total'];
$total_users = $conn->query("SELECT COUNT(*) as total FROM user")->fetch_assoc()['total'];

// Ambil data booking terbaru
$recent_bookings = $conn->query("
    SELECT p.*, a.merk, a.nopol 
    FROM peminjaman p 
    JOIN armada a ON p.armada_id = a.id 
    ORDER BY p.created_at DESC 
    LIMIT 5
")->fetch_all(MYSQLI_ASSOC);

// Ambil data pendapatan bulanan
$monthly_income = $conn->query("
    SELECT 
        DATE_FORMAT(tanggal, '%Y-%m') as month, 
        SUM(jumlah_bayar) as total 
    FROM pembayaran 
    GROUP BY DATE_FORMAT(tanggal, '%Y-%m') 
    ORDER BY month DESC 
    LIMIT 6
")->fetch_all(MYSQLI_ASSOC);

// Siapkan data untuk chart
$months = [];
$income_data = [];
foreach($monthly_income as $income) {
    $months[] = date('M Y', strtotime($income['month']));
    $income_data[] = $income['total'];
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Dashboard Admin - Rental Mobil</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Sidebar -->
            <?php include 'components/sidebar.php'; ?>
            <!-- / Sidebar -->

            <div class="layout-page">
                <!-- Navbar -->
                <?php include 'components/navbar.php'; ?>
                <!-- / Navbar -->

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Overview</h4>

                        <!-- Statistik -->
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <span class="avatar-initial rounded bg-label-primary">
                                                    <i class="bx bx-car"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="fw-semibold d-block mb-1">Total Armada</span>
                                        <h3 class="card-title mb-2"><?= $total_vehicles ?></h3>
                                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +<?= rand(5, 20) ?>%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <span class="avatar-initial rounded bg-label-success">
                                                    <i class="bx bx-calendar-check"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="fw-semibold d-block mb-1">Total Booking</span>
                                        <h3 class="card-title mb-2"><?= $total_bookings ?></h3>
                                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +<?= rand(5, 20) ?>%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <span class="avatar-initial rounded bg-label-info">
                                                    <i class="bx bx-money"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="fw-semibold d-block mb-1">Total Pendapatan</span>
                                        <h3 class="card-title mb-2">Rp <?= number_format($total_payments, 0, ',', '.') ?></h3>
                                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +<?= rand(5, 20) ?>%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <span class="avatar-initial rounded bg-label-warning">
                                                    <i class="bx bx-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="fw-semibold d-block mb-1">Total Pengguna</span>
                                        <h3 class="card-title mb-2"><?= $total_users ?></h3>
                                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +<?= rand(5, 20) ?>%</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Grafik Pendapatan -->
                        <div class="row">
                            <div class="col-md-8 mb-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Pendapatan Bulanan</h5>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="incomeReport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="incomeReport">
                                                <a class="dropdown-item" href="javascript:void(0);">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="incomeChart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Status Booking</h5>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="bookingStatus" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="bookingStatus">
                                                <a class="dropdown-item" href="javascript:void(0);">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="bookingStatusChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Terbaru -->
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Booking Terbaru</h5>
                                        <a href="peminjaman.php" class="btn btn-sm btn-primary">Lihat Semua</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nama Peminjam</th>
                                                        <th>Mobil</th>
                                                        <th>Tanggal Mulai</th>
                                                        <th>Tanggal Selesai</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    <?php foreach($recent_bookings as $booking): ?>
                                                    <tr>
                                                        <td>#<?= $booking['id'] ?></td>
                                                        <td><?= $booking['nama_peminjam'] ?></td>
                                                        <td><?= $booking['merk'] ?> (<?= $booking['nopol'] ?>)</td>
                                                        <td><?= date('d M Y', strtotime($booking['mulai'])) ?></td>
                                                        <td><?= date('d M Y', strtotime($booking['selesai'])) ?></td>
                                                        <td>
                                                            <?php 
                                                            $status_class = '';
                                                            switch($booking['status_pinjam']) {
                                                                case 'Pending': $status_class = 'bg-label-warning'; break;
                                                                case 'Dibooking': $status_class = 'bg-label-primary'; break;
                                                                case 'Dibatalkan': $status_class = 'bg-label-danger'; break;
                                                                case 'Selesai': $status_class = 'bg-label-success'; break;
                                                                default: $status_class = 'bg-label-secondary';
                                                            }
                                                            ?>
                                                            <span class="badge <?= $status_class ?>"><?= $booking['status_pinjam'] ?></span>
                                                        </td>
                                                        <td>
                                                            <a href="peminjaman_detail.php?id=<?= $booking['id'] ?>" class="btn btn-sm btn-outline-primary">Detail</a>
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

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © <script>document.write(new Date().getFullYear());</script>
                                , dibuat dengan ❤️ oleh <strong>Rental Mobil Team</strong>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- Core JS -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        // Grafik Pendapatan
        const incomeChartEl = document.querySelector('#incomeChart'),
            incomeChartConfig = {
                series: [{
                    name: 'Pendapatan',
                    data: [<?= implode(',', $income_data) ?>]
                }],
                chart: {
                    height: 350,
                    type: 'area',
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 2,
                    curve: 'smooth'
                },
                colors: ['#696cff'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 0.6,
                        opacityFrom: 0.5,
                        opacityTo: 0.25,
                        stops: [0, 95, 100]
                    }
                },
                grid: {
                    borderColor: '#e0e0e0',
                    strokeDashArray: 3,
                    padding: {
                        top: -20,
                        bottom: 8,
                        left: 20,
                        right: 20
                    }
                },
                xaxis: {
                    categories: [<?= "'" . implode("','", $months) . "'" ?>],
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#a1a1aa',
                            fontSize: '13px'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        offsetX: -15,
                        formatter: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        },
                        style: {
                            colors: '#a1a1aa',
                            fontSize: '13px'
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return 'Rp ' + val.toLocaleString('id-ID');
                        }
                    }
                }
            };
        if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
            const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
            incomeChart.render();
        }

        // Grafik Status Booking
        const bookingStatusChartEl = document.querySelector('#bookingStatusChart'),
            bookingStatusChartConfig = {
                series: [25, 15, 10, 5],
                labels: ['Dibooking', 'Pending', 'Selesai', 'Dibatalkan'],
                chart: {
                    height: 300,
                    type: 'donut'
                },
                colors: ['#696cff', '#8592a3', '#71dd37', '#ff3e1d'],
                stroke: {
                    width: 0
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    position: 'bottom',
                    markers: {
                        offsetX: -3
                    },
                    itemMargin: {
                        vertical: 3,
                        horizontal: 10
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    fontSize: '1.2rem'
                                },
                                value: {
                                    fontSize: '1.2rem',
                                    color: '#a1a1aa',
                                    formatter: function(val) {
                                        return parseInt(val) + '%';
                                    }
                                },
                                total: {
                                    show: true,
                                    fontSize: '1.2rem',
                                    label: 'Total',
                                    formatter: function() {
                                        return '100%';
                                    }
                                }
                            }
                        }
                    }
                }
            };
        if (typeof bookingStatusChartEl !== undefined && bookingStatusChartEl !== null) {
            const bookingStatusChart = new ApexCharts(bookingStatusChartEl, bookingStatusChartConfig);
            bookingStatusChart.render();
        }
    </script>
</body>
</html>
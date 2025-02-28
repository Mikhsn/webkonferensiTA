@extends('master.kerangka')
@section('content')
    <style>
        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="page-heading">
                    <h3>Dashboard Admin</h3>
                </div>
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldUser"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total<br>Users</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalUsers }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldUser1"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Members</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalMembers }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldPaper"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Conferences</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalConference }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldWallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Transactions</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalTransactions }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Revenue Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="revenueChart"></div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var options = {
                                    chart: {
                                        type: 'bar',
                                        height: 350
                                    },
                                    series: [{
                                        name: 'Revenue',
                                        data: [
                                            {{ $memberRevenue }},
                                            {{ $conferenceRevenue }}
                                        ]
                                    }],
                                    xaxis: {
                                        categories: ['Upgrade Member', 'Conference Purchase']
                                    },
                                    title: {
                                        text: 'Total Revenue (in Currency)',
                                        align: 'left'
                                    }
                                };

                                var chart = new ApexCharts(document.querySelector("#revenueChart"), options);
                                chart.render();
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="assets/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-1 name">
                                <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                                <h6 class="text-muted mb-0">Admin</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Approve</h4>
                    </div>
                    <div class="card-content pb-4">
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">Recent Upgrade</h5>
                                    <h6 class="text-muted mb-0">{{ $recentUpgrade }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="iconly-boldCalendar"></i>
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">Recent Conference</h5>
                                    <h6 class="text-muted mb-0">{{ $recentConference }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Visitors Profile</h4>
                    </div>
                    <div class="card-body">
                        <!-- Mengubah ID menjadi yang unik -->
                        <div id="visitors-profile-chart"></div>
                    </div>
                </div>

                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['User Type', 'Number'],
                            ['Users', {{ $totalRegularUsers }}],
                            ['Members', {{ $totalMembers }}]
                        ]);

                        var options = {
                            pieHole: 0.3, // Jika Anda ingin pie chart penuh, ubah menjadi 0
                            colors: ['#008FFB', '#00E396'],
                            chartArea: {
                                width: '90%',
                                height: '80%'
                            }
                        };

                        // Menggunakan ID baru 'visitors-profile-chart'
                        var chart = new google.visualization.PieChart(document.getElementById('visitors-profile-chart'));
                        chart.draw(data, options);
                    }
                </script>

            </div>
        </section>
    </div>
@endsection

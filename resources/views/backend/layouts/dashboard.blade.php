@extends('backend.app')

@section('title', 'Dashboard')

@push('styles')
    <style>
        .scrollable-list {
            max-height: 300px;
            /* Set your desired max height */
            overflow-y: auto;
            /* Enable vertical scrolling */
            white-space: nowrap;
            /* Prevent line breaks */
        }
    </style>
@endpush

@section('content')
    {{--  ========== title-wrapper start ==========  --}}
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Dashboard</h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                    <nav>
                        <ol class="base-breadcrumb breadcrumb-three">
                            <li>
                                <a href="{{ route('dashboard') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 0a8 8 0 1 0 4.596 14.104A5.934 5.934 0 0 1 8 13a5.934 5.934 0 0 1-4.596-2.104A7.98 7.98 0 0 0 8 0zm-2 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm-1.465 5.682A3.976 3.976 0 0 0 4 9c0 1.044.324 2.01.882 2.818a6 6 0 1 1 6.236 0A3.975 3.975 0 0 0 12 9a3.976 3.976 0 0 0-.536-1.318l-1.898.633-.018-.056 2.194-.732a4 4 0 1 0-7.6 0l2.194.733-.018.056-1.898-.634z" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li class="active"><span><i class="lni lni-angle-double-right"></i></span>Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{--  ========== title-wrapper end ==========  --}}



    <div class="row">

        <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
            <div class="icon-card d-flex flex-column justify-content-center align-items-center h-100">
                <div class="icon success">
                    <i class="lni lni-user"></i>
                </div>
                <div class="content text-center mt-3">
                    <h6 class="mb-10">Total User</h6>
                    <h3 class="text-bold">{{ $total_users }}</h3>
                    <p class="text-sm text-success">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
            <div class="icon-card d-flex flex-column justify-content-center align-items-center h-100">
                <div class="icon success">
                    <i class="lni lni-money-location"></i>
                </div>
                <div class="content text-center mt-3">
                    <h6 class="mb-10">Total </h6>
                    {{-- <h3 class="text-bold">{{ $total_plan ?? 0 }}</h3> --}}
                    <p class="text-sm text-success">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
            <div class="icon-card d-flex flex-column justify-content-center align-items-center h-100">
                <div class="icon success">
                    <i class="lni lni-user"></i>
                </div>
                <div class="content text-center mt-3">
                    <h6 class="mb-10">Total </h6>
                    {{-- <h3 class="text-bold">{{ $total_subscription ?? 0 }}</h3> --}}
                    <p class="text-sm text-success">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-3">
            <div class="icon-card d-flex flex-column justify-content-center align-items-center h-100">
                <div class="icon success">
                    <i class="lni lni-book"></i>
                </div>
                <div class="content text-center mt-3">
                    <h6 class="mb-10">Total Blogs</h6>
                    {{-- <h3 class="text-bold">{{ $total_blog ?? 0 }}</h3> --}}
                    <p class="text-sm text-success">
                </div>
            </div>
        </div>

    </div>


    <!-- Display the usernames of users who registered this month -->
    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card-style mb-30">
                <p class="text-success text-bold text-center">Users Data for Each Month</p>
                <div class="chart-container">
                    <hr>
                    {{-- cavas tag for chart js --}}
                    {{-- <canvas id="new-users-chart"></canvas> --}}

                    {{-- div tag for apex chart --}}
                    <div id="new-users-chart"></div>

                </div>
            </div>
        </div>

       {{--  <div class="col-lg-6">
            <div class="card-style mb-10">
                <p class="text-success text-bold text-center">Active Subscriptions</p>
                <hr>
                <div class="chart-container">
                    <div id="subscription-line-chart"></div>
                </div>
            </div>
        </div> --}}
    </div>


@endsection

@push('script')
    {{-- chart js --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    {{-- chart for new users start --}}
    {{-- <script>
        // Data passed from the controller
        const labels = @json($chartData['labels']); // Will always have 12 months
        const data = @json($chartData['data']); // Will have counts, with 0 for months without users

        const ctx = document.getElementById('new-users-chart').getContext('2d');
        const newUserChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'This year\'s Users',
                    data: data,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(0, 123, 255, 0.5)',
                        'rgba(220, 53, 69, 0.5)',
                        'rgba(40, 167, 69, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(23, 162, 184, 0.5)',
                        'rgba(255, 193, 7, 0.5)',
                        'rgba(188, 80, 144, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132,0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(0, 123, 255, 0.5)',
                        'rgba(220, 53, 69, 0.5)',
                        'rgba(40, 167, 69, 0.5)',
                        'rgba(23, 162, 184, 0.5)',
                        'rgba(255, 193, 7, 0.5)',
                        'rgba(188, 80, 144, 0.5)'
                    ],
                    borderWidth: 1,
                    barThickness: 50
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script> --}}
    {{-- chart for new users end --}}

    {{-- Apex Chart js --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const labels = @json($chartData['labels']);
            const data = @json($chartData['data']);

            var options = {
                chart: {
                    type: 'bar',
                    height: 350
                },
                series: [{
                    name: "This month's Users",
                    data: data
                }],
                xaxis: {
                    categories: labels
                },
                colors: [
                    '#36A2EB', '#FF6384', '#4BC0C0', '#9966FF', '#FF9F40',
                    '#007BFF', '#DC3545', '#28A745', '#FFCE56', '#17A2B8',
                    '#FFC107', '#BC5090'
                ],
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                        distributed: true
                    }
                },
                legend: {
                    show: false
                }
            };

            var chart = new ApexCharts(document.querySelector("#new-users-chart"), options);
            chart.render();
        });
    </script>

@endpush

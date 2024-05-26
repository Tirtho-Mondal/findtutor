@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4 bg-light shadow-sm">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('admin.sidebar')
            </div>
            <div class="col-lg-9">
                @include('front.message')
                <div class="card border-0 shadow mb-4">
                    <div class="card-body dashboard text-center">
                        <p class="h2 mb-4">Welcome Administrator!!</p>
                        <div class="row text-left">
                            <div class="col-md-4 mb-4">
                                <div class="card border-0 shadow-sm h-100 bg-primary text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-users fa-2x me-3"></i>
                                            <h5 class="card-title mb-0">Users</h5>
                                        </div>
                                        <p class="card-text">Manage all users from this section.</p>
                                        <a href="#" class="btn btn-outline-light">Go to Users</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card border-0 shadow-sm h-100 bg-success text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-cogs fa-2x me-3"></i>
                                            <h5 class="card-title mb-0">Settings</h5>
                                        </div>
                                        <p class="card-text">Adjust your settings here.</p>
                                        <a href="#" class="btn btn-outline-light">Go to Settings</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card border-0 shadow-sm h-100 bg-warning text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-chart-line fa-2x me-3"></i>
                                            <h5 class="card-title mb-0">Reports</h5>
                                        </div>
                                        <p class="card-text">View detailed reports and analytics.</p>
                                        <a href="#" class="btn btn-outline-light">Go to Reports</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-left">
                            <div class="col-md-4 mb-4">
                                <div class="card border-0 shadow-sm h-100 bg-info text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-bell fa-2x me-3"></i>
                                            <h5 class="card-title mb-0">Notifications</h5>
                                        </div>
                                        <p class="card-text">Check your latest notifications.</p>
                                        <a href="#" class="btn btn-outline-light">Go to Notifications</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card border-0 shadow-sm h-100 bg-danger text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-tasks fa-2x me-3"></i>
                                            <h5 class="card-title mb-0">Tasks</h5>
                                        </div>
                                        <p class="card-text">Manage your tasks efficiently.</p>
                                        <a href="#" class="btn btn-outline-light">Go to Tasks</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card border-0 shadow-sm h-100 bg-secondary text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-life-ring fa-2x me-3"></i>
                                            <h5 class="card-title mb-0">Support</h5>
                                        </div>
                                        <p class="card-text">Get support and help here.</p>
                                        <a href="#" class="btn btn-outline-light">Go to Support</a>
                                    </div>
                                </div>
                            </div>
                        </div>                          
                    </div>
                </div>                          
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
<script>
    // Custom JavaScript if needed
</script>
@endsection

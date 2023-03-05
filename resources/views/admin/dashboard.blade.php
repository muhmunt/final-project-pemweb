@extends('admin.layouts.app')
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                  <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Dashboard</h1>

        </div>

    </div>
</div>
@endsection
@section('content')
<!-- ============================================================== -->
<!-- Table -->
<!-- ============================================================== -->
<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2>Welcome, Admin</h2>
                <h4 class="text-muted">Have a nice day!</h4>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Table -->
<!-- ============================================================== -->
@endsection

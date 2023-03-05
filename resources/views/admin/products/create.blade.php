@extends('admin.layouts.app')
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                  <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Create a Product</h1>

        </div>

    </div>
</div>
@endsection
@section('content')
{{-- form --}}
    <!-- Column -->
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route("products.store") }}" class="form-horizontal form-material mx-2">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-12">Name</label>
                        <div class="col-md-12">
                            <input type="text" name="name" placeholder="Name Product"
                                class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Price Rp :</label>
                        <div class="col-md-12">
                            <input type="number" name="price" placeholder="Rp:"
                                class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Stock</label>
                        <div class="col-md-12">
                            <input type="number" name="stock" placeholder=""
                                class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Description</label>
                        <div class="col-md-12">
                            <textarea rows="5" name="description" class="form-control form-control-line"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-success text-white" value="Add Product">
                            {{-- <button class="btn btn-success text-white">Update Profile</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
{{-- end form --}}
@endsection

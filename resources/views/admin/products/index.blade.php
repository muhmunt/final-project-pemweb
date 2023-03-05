@extends('admin.layouts.app')
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                  <li class="breadcrumb-item"><a href="{{route('products')}}" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Products</h1>

        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <label for="">Add a new item for your list products.</label>
                <br>
                <a href="{{ route("products.create") }}" class="btn btn-primary text-white"
                    target=""><i class="mdi mdi-open-in-new"></i> Add</a>
            </div>
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
                <!-- title -->
                <div class="d-md-flex">
                    <div>
                        <h4 class="card-title">List of Products</h4>
                        <h5 class="card-subtitle">Overview of Products</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="dl">
                            <select class="form-select shadow-none">
                                <option value="0" selected>Monthly</option>
                                <option value="1">Daily</option>
                                <option value="2">Weekly</option>
                                <option value="3">Yearly</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- title -->
                <div class="table-responsive">
                    <table class="table mb-0 table-hover align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#ID-PRODUCT</th>
                                <th class="border-top-0">Products</th>
                                <th class="border-top-0">Stock</th>
                                <th class="border-top-0">Price</th>
                                <th class="border-top-0">Description</th>
                                <th class="border-top-0">Delete</th>
                                <th class="border-top-0">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a
                                                class="btn btn-circle d-flex btn-info text-white">{{strtoupper(Str::substr($item->name, 0, 2))}}</a>
                                        </div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">{{$item->id}}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>
                                    <label class="badge bg-success">{{$item->stock}}</label>
                                </td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <a href="{{ route("products.destroy",$item->id) }}" class="badge bg-danger text-white"><i class="mdi mdi-delete-empty m-r-5 m-l-5"></i>delete</a>
                                </td>
                                <td>
                                    <a href="{{ route("products.edit",$item->id) }}" class="badge bg-primary text-white"><i class="mdi mdi-table-edit m-r-5 m-l-5"></i>edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Table -->
<!-- ============================================================== -->
@endsection

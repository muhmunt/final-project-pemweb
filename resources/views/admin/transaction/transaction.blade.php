@extends('admin.layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Table -->
<!-- ============================================================== -->
<div class="row">
    <!-- column -->
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning" role="alert">
                {{ session('warning') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <!-- title -->
                <div class="d-md-flex">
                    <div>
                        <h4 class="card-title">Order Products</h4>
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
                                <th class="border-top-0">Price</th>
                                <th class="border-top-0">Qty</th>
                                <th class="border-top-0">Description</th>
                                <th class="border-top-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <tr>
                                <form action="{{ route("add.to.cart") }}" method="POST">
                                    @csrf
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
                                    <input type="number" name="quantity">
                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                </td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <button class="btn badge bg-success text-white" type="submit"><i class="mdi mdi-cart-plus m-r-5 m-l-5"></i>Add to cart</button>
                                </td>
                                </form>
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

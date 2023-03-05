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
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
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
                                <th class="border-top-0">Total</th>
                                <th class="border-top-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($data as $item)
                            <form action="{{ route("transaction.buy") }}" method="POST">
                            <tr>
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
                                    {{$item->quantity}}
                                    <input type="hidden" name="product_id[]" value="{{ $item->id }}">
                                    <input type="hidden" name="quantity[]" value="{{ $item->quantity }}">
                                    <input type="hidden" name="total[]" value="{{ $item->total }}">
                                </td>
                                <td>{{$item->total}}</td>
                                <td>
                                    <a href="{{ route("cart.destroy",$item->id) }}" class="badge bg-danger text-white"><i class="mdi mdi-delete-empty m-r-5 m-l-5"></i>delete</a>
                                </td>
                            </tr>
                            @php
                                $total += $item->total;
                            @endphp
                            @endforeach
                            <div class="row mt-5">
                                <div class="col-6 right">
                                    <h3>Total = Rp. <?= number_format($total); ?></h3>
                                </div>
                                <div class="col-6">
                                    <div class="text-end upgrade-btn">
                                        <button class="btn btn-primary text-white" type="submit"><i class="mdi mdi-cart"></i> Click to Order</button>
                                    </div>
                                </div>
                            </div>
                            </form>

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

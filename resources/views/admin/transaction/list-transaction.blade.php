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
                        <h4 class="card-title">List Transaction</h4>
                        <h5 class="card-subtitle">Overview of all Transaction</h5>
                    </div>
                    {{-- <div class="ms-auto">
                        <div class="dl">
                            <select class="form-select shadow-none">
                                <option value="0" selected>Monthly</option>
                                <option value="1">Daily</option>
                                <option value="2">Weekly</option>
                                <option value="3">Yearly</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
                <!-- title -->
                <div class="table-responsive">
                    <table class="table mb-0 table-hover align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#ID-TRANSACTION</th>
                                <th class="border-top-0">Product</th>
                                <th class="border-top-0">Price</th>
                                <th class="border-top-0">Qty</th>
                                <th class="border-top-0">Total</th>
                                <th class="border-top-0">Transaction Date</th>
                                <th class="border-top-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction as $item)
                            <tr>
                                <td>{{$item->id}}</td>
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
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>Rp. {{number_format($item->total_amount)}}</td>
                                <td>{{$item->created_at}}</td>
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

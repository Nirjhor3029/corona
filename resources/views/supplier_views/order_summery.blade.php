@extends('layouts.app')
@section('title',config('app.dev_com')."-Supplier orders")

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Orders Summery</h1>
        <h1 class="pull-right">
            {{-- <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('orders.create') }}">Add New</a> --}}
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <ul class="nav nav-tabs">
            @foreach ($order_statuses as $status)
                <li class="{{($statusId == $status->id )? 'active' : ''}}"> {{--class="active"--}}
                    {{-- <form action="{{route('ordersByStatus','pending')}}" method="get"> --}}
                        <a class="font_capitalized"  href="{{route('supplier.order_summeryByStatus',$status->id)}}">{{$status->status_name}}</a>
                    {{-- </form> --}}
                </li>
            @endforeach
            <li class="{{($statusId == 0 )? 'active' : ''}}"> {{--class="active"--}}
                {{-- <form action="{{route('ordersByStatus','pending')}}" method="get"> --}}
                    <a class="font_capitalized"  href="{{route('supplier.order_summery')}}">All</a>
                {{-- </form> --}}
            </li>
        </ul>
        <div class="box box-primary">
            <div class="box-body">
                    @include('supplier_views.suppliers.table_summery')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection


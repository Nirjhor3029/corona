@extends('layouts.app')
@section('title',config('app.dev_com')."-Orders")

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Distributed Orders</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('orders.create') }}">Add New</a>
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
                        <a class="font_capitalized"  href="{{route('ordersByStatus',$status->id)}}">{{$status->status_name}}</a>
                    {{-- </form> --}}
                </li>
            @endforeach
        </ul>
        <div class="box box-primary">
            <div class="box-body">
                    @include('orders.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection


@extends('layouts.app')
@section('title',config('app.dev_com')."-Orders")

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            Distributed Orders

        </h1>
        <h1 class="pull-right">
            <a class="btn btn-success pull-left" style="margin-top: -10px;margin-right: 10px;margin-bottom: 5px" href="{{ route('orders.redistribute') }}" onclick="return confirm('Are you sure?')">Redistribute</a>

            <a class="btn btn-danger pull-left" style="margin-top: -10px;margin-right: 10px;margin-bottom: 5px" href="{{ route('orders.deleteAll') }}" onclick="return confirm('Are you sure?')">Delete All</a>
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
            <li class="{{($statusId == 0 )? 'active' : ''}}"> {{--class="active"--}}
                {{-- <form action="{{route('ordersByStatus','pending')}}" method="get"> --}}
                    <a class="font_capitalized"  href="{{route('ordersByStatus',0)}}">All</a>
                {{-- </form> --}}
            </li>
            <li class="{{($statusId == 0 )? 'active' : ''}}"> {{--class="active"--}}
                {{-- <form action="{{route('ordersByStatus','pending')}}" method="get"> --}}
                    {{-- <a class="font_capitalized"  href="{{route('ordersByStatus',0)}}">All</a> --}}
                {{-- <input type="date" name="date_create" id="" value="{{date("Y-m-j")}}" onchange="dateFilter(this)"> --}}
                {{-- </form> --}}
            </li>
        </ul>
        <div class="box box-primary">
            <div class="box-body">
                    @include('orders.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>

        <script>
            function dateFilter(ev) {
                // console.log(ev.value);
                // let day = moment(ev.value).utc().format("D");
                // let month = moment(ev.value).utc().format("M");
                // let year = moment(ev.value).utc().format("YYYY");

                const monthNames = ["Jan", "Feb", "March", "Apr", "May", "June","July", "Aug", "Sept", "Oct", "Nov", "Dec"];

                let check = moment(ev.value, 'YYYY/MM/DD');

                let month = check.format('M');
                month --;
                let day   = check.format('DD');
                let year  = check.format('YYYY');
                console.log(month)
                let date = monthNames[month]+" "+day+", "+year;
                console.log(date);
                
                let search = document.getElementsByTagName("input")[2];
                search.value = date;
                console.log(search);
                

            }
        </script>
    </div>
@endsection


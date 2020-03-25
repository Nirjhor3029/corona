{{-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.8 Import Export Excel to database Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body> --}}

@extends('layouts.app')
@section('content')

<section class="content-header">
    <h1>
        Order Data CSV file import
    </h1>
</section>
<div class="container content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary bg-light mt-30">
        <div class="box-header">
            {{-- Laravel 5.8 Import Export Excel to database Example - ItSolutionStuff.com --}}
        </div>
        <div class="box-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                {{-- <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a> --}}
            </form>
        </div>
    </div>
</div>
@endsection
{{-- 
</body>
</html> --}}
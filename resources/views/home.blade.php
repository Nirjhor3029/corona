@extends('layouts.app')

@section('title',config('app.dev_com')."-Home")
    
@section('content')
<div class="container">
    <div class="row">
        @include('flash::message')


    </div>
</div>
@endsection

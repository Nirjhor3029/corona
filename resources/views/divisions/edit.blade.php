@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Divisions
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($divisions, ['route' => ['divisions.update', $divisions->id], 'method' => 'patch']) !!}

                        @include('divisions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
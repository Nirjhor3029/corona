@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Union
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($union, ['route' => ['unions.update', $union->id], 'method' => 'patch']) !!}

                        @include('unions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
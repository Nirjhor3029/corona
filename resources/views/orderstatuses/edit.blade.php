@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Orderstatus
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orderstatus, ['route' => ['orderstatuses.update', $orderstatus->id], 'method' => 'patch']) !!}

                        @include('orderstatuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
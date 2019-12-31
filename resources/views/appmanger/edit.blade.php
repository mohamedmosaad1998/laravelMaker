@extends('layouts.app')
@push('css')

@endpush
@push('js')

@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header p-2 text-center text-capitalize bg-primary text-white">
                        <h1> Edit  {{$appmanger->name}}</h1>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['appmanger.update',$appmanger], 'method' => 'put']) !!}
                        {!! Form::text('name', $appmanger->name, ['placeholder'=>'Name ','class' => 'form-control mb-3 mt-3 shadow-sm border-0']) !!}
                        {!! Form::submit('Update', ['class' => 'btn btn-warning']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

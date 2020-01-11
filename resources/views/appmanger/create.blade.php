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
                <div class="card-header p-2 text-center text-capitalize  bg-primary text-white">
                    <h1> create </h1>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'appmanger.store', 'method' => 'post']) !!}
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                {!! Form::text('name', old('name') ?? '', ['placeholder'=>'Name ','class' => 'form-control mb-3 mt-3 shadow-sm border-0']) !!}
                            </div>
                            <div class="col-md-12 col-sm-6">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            </div>

                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

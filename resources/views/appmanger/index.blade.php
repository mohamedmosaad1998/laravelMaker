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
                        <h1> All Apps </h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach (auth()->user()->appMangers()->orderBy('name')->get() as $appManger)
                                <div class="col-md-4 mb-2  mt-2 ">
                                    <div class="card  border-0">
                                        <div class="card-header shadow-sm rounded-0 text-center  border-0 bg-danger">
                                            <h3><a class="text-white nav-link" href="{{route('appmanger.showSections',$appManger)}}">{{$appManger->name}}</a></h3>
                                        </div>
                                        <div class="card-body">
                                            {!! Form::open(['route' => ['appmanger.destroy',$appManger], 'method' => 'delete']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

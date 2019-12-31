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
                        <h1> show {{$appmanger->name}}</h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mb-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                         <div class="row links-types">

                            @foreach (config('mainData.types',[]) as $type)
                                <div class="col-sm-3 mb-2">
                                    <a  class="nav-link p-sm-1 {{(isset($link) && $link==$type)?' active disabled ':''}}" href="{{route('appmanger.type',[$appmanger,$type])}}">{{ucfirst($type)}}</a>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
            @isset($link)
                <div class="col-sm-12 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header p-2 text-center text-capitalize bg-success text-white">
                            <h1> Create {{ucfirst($link)}}</h1>
                        </div>
                        <div class="card-body">

                            {!! Form::open(['route' => ['appmanger.typeStore',$appmanger,$link], 'method' => 'post']) !!}
                            {!! Form::text('name', old('name'), ['placeholder'=>'Name ','class' => 'form-control mb-3 mt-3 shadow-sm border-0']) !!}
{{--                            {!! Form::select('type',config('mainData.types',[]), ['placeholder'=>'Name ','class' => 'form-control mb-3 mt-3 shadow-sm border-0']) !!}--}}
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
                @if ($appmanger->sections()->count())
                    <ul>
                        @foreach ($appmanger->selectType($link)->get() as $selected)
                            <li><a href="{{route('appmanger.section.show',[$appmanger,$link,$selected])}}">{{$selected->name}}</a></li>
                        @endforeach
                    </ul>
                @endif
            @endisset


        </div>
    </div>
@endsection

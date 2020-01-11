@extends('layouts.app')
@push('css')

@endpush
@push('js')

@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card  rounded-0 shadow-sm border-0">
                    <div class="card-header rounded-0 p-2 text-center text-capitalize bg-primary text-white">
                        <h1> show {{$appmanger->name}}</h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mb-3">
                <div class="card border-0 rounded-0 shadow-sm">
                    <div class="card-body">
                         <div class="row links-types">

                            @foreach (config('mainData.types',[]) as $type)
                                <div class="col-sm-3 mb-2">
                                    <a  class="nav-link p-sm-1 {{(isset($link) && $link==$type)?' active disabled ':''}}" href="{{route('appmanger.showSections',$appmanger)}}">{{ucfirst($type)}}</a>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection

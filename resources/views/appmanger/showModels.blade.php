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
                        <h1> show {{$appmanger->name}} Models</h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mb-3">
                <div class="card border-0 rounded-0 shadow-sm">
                    <div class="card-body">
                         <div class="row links-types">
                             <div class="col-md-12 mb-2">
                                 <a href="{{route('appmanger.section.create',$appmanger)}}" class="btn btn-success">
                                     Create Model
                                 </a>
                             </div>
                            @if ($appmanger->sections()->count())
                                 @foreach ($appmanger->sections()->orderBy('name')->get() as $section)
                                     <div class="col-sm-3 mb-2">
                                         <a  class="nav-link p-sm-1" href="{{route('appmanger.showSection',[$appmanger,$section])}}">{{ucfirst($section->name)}}</a>
                                     </div>
                                 @endforeach
                            @else
                                 <div class="col-md-12">
                                     <div class="text-center alert alert-info">
                                         <h2>No Models</h2>
                                     </div>
                                 </div>
                            @endif


                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection

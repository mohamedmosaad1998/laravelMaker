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
                        <h1> {{ucfirst($section->NameType)}}  </h1>
                    </div>
                </div>
            </div>
            @isset($type)
                @include('includes.'.$type,['name'=>$section->name,'attributes'=>$section->data['attributes']??[]])
            @endisset
        </div>
    </div>
@endsection

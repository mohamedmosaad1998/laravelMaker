@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-12 mb-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">

                        <form action="{{url('/')}}" method="GET">
                            <div class="row">
                                <div class="col-sm-4 mb-2">
                                    <div class="form-group">
                                        <label>@lang('data.model')</label>
                                        <input type="text" class="form-control"  name="module" value="{{$_GET['module'] ?? ''}}" placeholder="@lang('data.model')">
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <div class="form-group">
                                        <label>Relationship Model</label>
                                        <input type="text" class="form-control"  name="rmmodel" value="{{$_GET['rmmodel'] ?? ''}}" placeholder="@lang('data.rmmodel')">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <select class="custom-select" multiple id="attributes"  name="attributes[]">
                                        @foreach($attributes as $key => $attribute)
                                            <option selected class="attr" value="{{$attribute}}">{{$attribute}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="attributesText" placeholder="@lang('data.attributes')">
                                    </div>
                                </div>

                            @foreach ($AllData as $type)
                                    <div class="col-sm-3 mb-2">
                                        <div class="custom-control custom-checkbox">
                                            <input {{(isset($_GET[strtolower($type)]) && $_GET[strtolower($type)]=="on")?'checked':''}} type="checkbox" onchange="submitForm()" name="{{strtolower($type)}}" class="custom-control-input" id="customCheckDisabled{{$type}}">
                                            <label class="custom-control-label" for="customCheckDisabled{{$type}}"><b>{{ucfirst($type)}}</b></label>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-sm-12 mb-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">


                        </div>
                    </div>
                </div>
            </div>

            @if(count($selected)>0)
                @foreach ($selected as $type)

                    @include('includes.'.strtolower($type),['name'=>$module,'attributes'=>$attributes ?? [] ])

                @endforeach
            @else
                <div class="alert alert-danger text-center w-100 d-block">
                    <b> No Choice</b>
                </div>
            @endif

        </div>

    </div>

@endsection
@push('js')
    <script>
        $(function () {
            $('#attributesText').keypress(function(e){
                if(e.keyCode==13){ e.preventDefault(); let text=$(this);
                let value=text.val().replace(/ /gi,'');
                    console.log(value);
                    $('#attributes').append(`<option selected class="attr" value="${value}">${value}</option>`)
                    text.val('');
                }
            });
        });
    </script>
@endpush

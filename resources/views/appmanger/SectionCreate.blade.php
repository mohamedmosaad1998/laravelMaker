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
                    <h1> Create Section </h1>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['appmanger.typeStore',$appmanger], 'method' => 'post']) !!}
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                {!! Form::text('name', $section->name ?? old('name') ?? '', ['placeholder'=>'Name ','class' => 'form-control mb-3 mt-3 shadow-sm border-0']) !!}
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <hr>
                                <h2>Options</h2>
                                <div class="row">
                                    @foreach (config('mainData.model.options',[]) as $key=> $option)

                                            @if(is_array($option))
                                            <div class="col-md-12 border pt-3 pb-3 col-sm-12">
                                                <div class="row">

                                                </div>
                                                @foreach ($option as $subKey => $subOption)
                                                    @if (is_bool($subOption))
                                                        <div class="col-sm-12">
                                                            <h2>{{ucfirst($key)}}</h2>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="options[{{$key}}][{{$subKey}}]" {{( ($subOption && !isset($section)) || (isset($section->options[$key][$subKey]) && $section->options[$key][$subKey]==true))?'checked':''}} id="custom-checkbox-{{$key}}-{{$subKey}}"
                                                                       class="custom-control-input">
                                                                <label for="custom-checkbox-{{$key}}-{{$subKey}}" class="custom-control-label">{{ucfirst($subKey)}}</label>
                                                            </div>
                                                        </div>

                                                    @elseif (is_array($subOption))
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                @foreach ($subOption as $subSubKey=> $subSubOption)
                                                                    @if (is_bool($subSubOption))
                                                                        <div class="col-md-3 col-sm-4">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="options[{{$key}}][{{$subKey}}][{{$subSubKey}}]" {{( ($subSubOption && !isset($section)) || (isset($section->options[$key][$subKey][$subSubKey]) && $section->options[$key][$subKey]==true))?'checked':''}} id="custom-checkbox-{{$key}}-{{$subKey}}-{{$subSubKey}}"
                                                                                       class="custom-control-input">
                                                                                <label for="custom-checkbox-{{$key}}-{{$subKey}}-{{$subSubKey}}" class="custom-control-label">{{ucfirst($subSubKey)}}</label>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" value="{{$section->options[$key][$subKey] ?? old('options')[$key][$subKey] ?? ''}}" name="options[{{$key}}][{{$subKey}}]"  placeholder="{{ucfirst($subKey)}}">
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            @elseif(is_bool($option))
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="options[{{$key}}]" {{( ($option && !isset($section)) || (isset($section->options[$key]) && $section->options[$key]==true))?'checked':''}} id="custom-checkbox-{{$key}}"
                                                               class="custom-control-input">
                                                        <label for="custom-checkbox-{{$key}}" class="custom-control-label">{{ucfirst($key)}}</label>
                                                    </div>
                                                </div>
                                            @endif

                                    @endforeach
                                </div>
                                <hr>

                            </div>

                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

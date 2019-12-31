<div class="container">
    <div class="row">
@isset($section)
    <div class="col-md-12 mb-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body ">
                {!! Form::open(['route' => ['appmanger.section.update',$section], 'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Request</label>
                            {!! Form::select('data[request][]',$appmanger->sections()->where('type','Request')->get()->map(function($va,$ky){return [$va['name']=>$va['name']];})  ,$section->data['request'], ['multiple','class' => 'custom-select']) !!}
                        </div>
                        <div class="col-md-4">
                            <label for="">Middleware</label>
                            {!! Form::select('data[middleware][]', $appmanger->sections()->where('type','Middleware')->get('name')->map(function($va,$ky){return [$va['name']=>$va['name']];})  ,$section->data['middleware'], ['class' => 'custom-select']) !!}
                        </div>
                        <div class="col-md-4">
                            <label for="">Policy</label>
                            {!! Form::select('data[policy][]', $appmanger->sections()->where('type','Policy')->get()->map(function($va,$ky){return [$va['name']=>$va['name']];})  ,$section->data['policy'], ['class' => 'custom-select']) !!}
                        </div>
                        <div class="col-md-4">
                            <label for="">Model</label>
                            {!! Form::select('data[model][]', $appmanger->sections()->where('type','Model')->get()->map(function($va,$ky){return [$va['name']=>$va['name']];})  ,$section->data['model'], ['class' => 'custom-select']) !!}
                        </div>
                        <div class="col-md-4">
                            <label for="">Save</label>
                            {!! Form::submit('Save', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endisset
    <div class="col-md-12 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body ">
                    @include('layouts.boxTitle')
                    <h6>Api</h6>
                    <code class="language-php">
                        php artisan make:controller api/{{strtolower($name)}}/{{ucfirst($name)}}Controller --api <br>
                        Route::apiResource('{{strtolower($name)}}' ,'{{strtolower($name)}}/{{ucfirst($name)}}Controller'); <br>
                        Route::get('/{{strtolower($name)}}', '{{strtolower($name)}}/{{ucfirst($name)}}Controller@index')->name('{{strtolower($name)}}.index');<br>
                        Route::post('/{{strtolower($name)}}', '{{strtolower($name)}}/{{ucfirst($name)}}Controller@store')->name('{{strtolower($name)}}.store');<br>
                        Route::get('/{{strtolower($name)}}/&lbrace;{{strtolower($name)}}}', '{{strtolower($name)}}/{{ucfirst($name)}}Controller&commat;show')->name('{{strtolower($name)}}.show');<br>
                        Route::put('/{{strtolower($name)}}/&lbrace;{{strtolower($name)}}}', '{{strtolower($name)}}/{{ucfirst($name)}}Controller@update')->name('{{strtolower($name)}}.update');<br>
                        Route::delete('/{{strtolower($name)}}/&lbrace;{{strtolower($name)}}}', '{{strtolower($name)}}/{{ucfirst($name)}}Controller@destroy')->name('{{strtolower($name)}}.destroy');<br>

                    </code>
                    <hr>
                    <h6>web</h6>

                    <code class="language-php">
                        php artisan make:controller {{strtolower($name)}}/{{ucfirst($name)}}Controller <br>
                        --resource <br>
                        --invokable <br>
                        --model={{ucfirst($name)}} <br>
                        --api <br>
                        Route::resource('{{strtolower($name)}}' ,'{{strtolower($name)}}/{{ucfirst($name)}}Controller'); <br>
                        Route::get('/{{strtolower($name)}}', '{{strtolower($name)}}/{{ucfirst($name)}}Controller@index')->name('{{strtolower($name)}}.index');<br>
                        Route::get('/{{strtolower($name)}}/create', '{{strtolower($name)}}/{{ucfirst($name)}}Controller@create')->name('{{strtolower($name)}}.create');<br>
                        Route::post('/{{strtolower($name)}}', '{{strtolower($name)}}/{{ucfirst($name)}}Controller@store')->name('{{strtolower($name)}}.store');<br>
                        Route::get('/{{strtolower($name)}}/&lbrace;{{strtolower($name)}}}', '{{strtolower($name)}}/{{ucfirst($name)}}Controller&commat;show')->name('{{strtolower($name)}}.show');<br>
                        Route::get('/{{strtolower($name)}}/&lbrace;{{strtolower($name)}}}/edit', '{{strtolower($name)}}/{{ucfirst($name)}}Controller@edit')->name('{{strtolower($name)}}.edit');<br>
                        Route::put('/{{strtolower($name)}}/&lbrace;{{strtolower($name)}}}', '{{strtolower($name)}}/{{ucfirst($name)}}Controller@update')->name('{{strtolower($name)}}.update');<br>
                        Route::delete('/{{strtolower($name)}}/&lbrace;{{strtolower($name)}}}', '{{strtolower($name)}}/{{ucfirst($name)}}Controller@destroy')->name('{{strtolower($name)}}.destroy');<br>
                    </code>
                    <hr>
                    <h6>custome</h6>
                    <code class="language-php">
                        ->parameters([ 'users' => 'admin_user' ]) <br>
                        ->names([ 'create' => 'photos.build' ]) <br>
                        php artisan route:clear <br>
                    </code>
                    <pre  class="code-style ">

namespace App\Http\Controllers\{{strtolower($name)}};

use App\Http\Controllers\Controller;
use App\Http\Requests\{{ucfirst($name)}}CreateRequest;
use App\Http\Requests\{{ucfirst($name)}}UpdatedRequest;
use App\{{ucfirst($name)}};
use Illuminate\Http\Request;

class {{ucfirst($name)}}Controller extends Controller{

    public function __construct(){
        $this->middleware(['']);
        $this->authorizeResource({{ucfirst($name)}}::class,'{{strtolower($name)}}');
    }

    public function index(){
        return view('{{strtolower($name)}}.index',['{{strtolower($name)}}s'=>{{ucfirst($name)}}::paginate()]);
    }


    public function create(){
        return view('{{strtolower($name)}}.create');
    }
    // {{ucfirst($name)}}CreateRequest
    public function store(Request $request) {
          $user=auth()->check()? auth()->user():null;
        if($user){
                        @if (count($section->data['attributes'] ?? []))
/*
$validator=$request->validate([
@foreach ($section->data['attributes'] as $attribute)
'{{$attribute}}' => ['required'],
@endforeach
<br>]);
*/
/*
$validator = Validator::make($request->all(), [
@foreach ($section->data['attributes'] as $attribute)
'{{$attribute}}' => ['required'],
@endforeach
<br>]);
if ($validator->fails()) {
return redirect()->route('{{strtolower($name)}}.create')
->withErrors($validator)
->withInput();
}
*/
                        @endif

        $user->{{strtolower($name)}}s()->create($validator);
        }

        return back();
    }

    public function show({{ucfirst($name)}} ${{strtolower($name)}}) {

        return view('{{strtolower($name)}}.show',['{{strtolower($name)}}'=>${{strtolower($name)}}]);
    }

    public function edit({{ucfirst($name)}} ${{strtolower($name)}}) {
        return view('{{strtolower($name)}}.edit',['{{strtolower($name)}}'=>${{strtolower($name)}}]);
    }
    // {{ucfirst($name)}}UpdateRequest
    public function update(Request $request, {{ucfirst($name)}} ${{strtolower($name)}}) {
        $user=auth()->check()? auth()->user():null;
        if($user){
@if (count($section->data['attributes'] ?? []))
/*
$validator=$request->validate([
@foreach ($section->data['attributes']??[] as $attribute)
'{{$attribute}}' => ['required'],
@endforeach
<br>]);
*/
/*
$validator = Validator::make($request->all(), [
@foreach ($section->data['attributes']??[] as $attribute)
'{{$attribute}}' => ['required'],
@endforeach
<br>]);
if ($validator->fails()) {
return redirect()->route('{{strtolower($name)}}.create')
->withErrors($validator)
->withInput();
}
*/
@endif

        ${{strtolower($name)}}->update($validator);
        }
        return back();
    }

    public function destroy({{ucfirst($name)}} ${{strtolower($name)}}) {

        ${{strtolower($name)}}->delete();

        return back();
    }
}
</pre>

                </div>
            </div>
        </div>
    </div>
</div>

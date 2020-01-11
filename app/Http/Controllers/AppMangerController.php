<?php

namespace App\Http\Controllers;
//use App\Http\Requests\AppMangerCreateRequest;
//use App\Http\Requests\AppMangerUpdatedRequest;
use App\AppManger;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
class AppMangerController extends Controller{

    public function __construct(){
        $this->middleware(['auth']);
//        $this->authorizeResource(AppManger::class,'appmanger');
    }

    public function index(){ return view('appmanger.index',['appmangers'=>AppManger::paginate()]); }


    public function create(){ return view('appmanger.create'); }
    // AppMangerCreateRequest
    public function store(Request $request) {
        $user=auth()->check()? auth()->user():null;
        if($user){
            $validator=$request->validate([ 'name' => ['required','unique:app_mangers,name'] ]);
            $user->appMangers()->create($validator);
            return back();
        }
        return back();
    }

    public function show(AppManger $appmanger) { return view('appmanger.show',['appmanger'=>$appmanger]); }

    public function edit(AppManger $appmanger) { return view('appmanger.edit',['appmanger'=>$appmanger]); }


    // AppMangerUpdateRequest
    public function update(Request $request, AppManger $appmanger) {
        $user=auth()->check()? auth()->user():null;
        if($user && $user == $appmanger->user ){
            $validator=$request->validate([ 'name' => ['required',Rule::unique('app_mangers')->ignore($appmanger->name,'name')] ]);
            $appmanger->update($validator);
        }
        return redirect()->route('appmanger.edit',$appmanger);
    }

    public function destroy(AppManger $appmanger) {
        $user=auth()->check()? auth()->user():null;

        if($user && $user == $appmanger->user ) $appmanger->delete();

        return redirect()->route('appmanger.index');
    }


    // Sections

    public function createSection(AppManger $appmanger) { return view('appmanger.SectionCreate',['appmanger'=>$appmanger]); }

    public function showSections(AppManger $appmanger){ return view('appmanger.showModels',['appmanger'=>$appmanger]); }

    public function showSection(AppManger $appmanger,Section $section){ return view('appmanger.showModels',compact('appmanger','section')); }

    public function typeStore(Request $request,AppManger $appmanger) {
        $request->validate([
            'name'=>['required','string'],
            'options'=>['required','array'],
        ]);

        $data=str_replace('"on"', '"true"', collect($request->options)->toJson());
        $data=str_replace('"off"', '"false"',$data);
        $options=collect(
            json_decode($data))->map(function ($key,$value){
            return ((is_object($key)? collect($key)->map(function($kk,$vv){
                return (is_object($kk)? collect($kk)->toArray(): $kk);
            })->toArray() : $key));
        })->toArray();
        $section=$appmanger->sections()->create([
            'name'=>ucfirst($request->name),
            'data'=>$options,
        ]);
        return back();

    }


}

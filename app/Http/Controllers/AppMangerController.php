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

    public function index(){
        return view('appmanger.index',['appmangers'=>AppManger::paginate()]);
    }


    public function create(){
        return view('appmanger.create');
    }
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

    public function show(AppManger $appmanger) {

        return view('appmanger.show',['appmanger'=>$appmanger]);
    }
    public function type(AppManger $appmanger,$type) {
        if (file_exists(resource_path('views/includes/'.$type.'.blade.php')) )
            return view('appmanger.show',['appmanger'=>$appmanger,'link'=>$type]);
        else return redirect()->route('appmanger.show',$appmanger);

    }

    public function edit(AppManger $appmanger) {
        return view('appmanger.edit',['appmanger'=>$appmanger]);
    }

    public function typeShow(AppManger $appmanger,$type,Section $section) {
        $data=config('mainData.types',[]);

        if ( in_array(strtolower($section->type), $data) && in_array($type, $data) ){
            return view('appmanger.section.index',compact('appmanger','section','type'));
        }
        return redirect()->route('appmanger.show',$appmanger);
    }
    public function typeStore(Request $request,AppManger $appmanger,$type) {
        $request['type']=$type;
        $request['name']=ucfirst($request['name']).ucfirst($type);
        $validator=$request->validate([
            'name' => ['required',
                Rule::unique('sections')
                    ->where(function ($query) use ($appmanger, $request) {
                        return $query->where('name',$request['name'])
                            ->where('app_manger_id',$appmanger->id);
                    })
            ],
            'type' => ['required',Rule::in(config('mainData.types',[]))]
        ]);
        $validator['data']=config('mainData.data',[]);
        $section=Section::firstOrCreate($appmanger->sections()->create($validator)->only('name'));

        return redirect()->route('appmanger.section.show',['appmanger'=>$appmanger,'type'=>$type,'section'=>$section]);
    }

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

    public function sectionUpdate(Request $request,Section $section){
            if ($request->has('data')){
                $section->update([
                    'data'=>$request->data
                ]);
            }
            dd($section->data);
            return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller{

    public function setting(){
        $data=config('mainData.types',[]);
        $load=collect($_GET)->filter(function($value,$key){
            return ( ($_GET[$key]=="on") && (file_exists(resource_path('views/includes/'.$key.'.blade.php'))) );
        })->map(function($value,$key){
            return $key;
        })->only($data);

        $module=request('module')   ?? 'user';
        $module=rtrim(str_replace(' ','',$module),' ');
        return view('welcome',[
            'AllData'   =>  $data ?? [],
            'selected'  =>  $load ?? [],
            'module'    =>  $module ,
            'attributes'=>  collect(request('attributes')  ?? ['name','email'])->sort()->toArray()
        ]);
    }

    public function home(){
        return view('appmanger.index');
    }

}

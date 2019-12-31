<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model{
    use SoftDeletes;
    public $incrementing=true;
    protected $visible = [ 'name','type','data'];
    protected $fillable = [ 'name','type','data'];
    protected $touches=['appmanger'];
    protected $casts = [
        'name'=>'string',
        'type'=>'string',
        'data'=>'array',
    ];
    protected $attributes = [
        'name' => 'App',
        'type'=>'string',
    ];
    public function getRouteKeyName(){ return 'name'; }
    public function setNameAttribute($value){ $this->attributes['name'] = ucfirst(str_replace(' ', '_', $value)); }
    public function setTypeAttribute($value){ $this->attributes['type'] = ucfirst(str_replace(' ', '_', $value)); }

    public function appmanger(){ return $this->belongsTo(AppManger::class,'app_manger_id'); }
}

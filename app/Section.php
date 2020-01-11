<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model{
    public $incrementing=true;
    protected $visible = [ 'name','data'];
    protected $fillable = [ 'name','data'];
    protected $touches=['appmanger'];
    protected $casts = [
        'name'=>'string',
        'data'=>'array',
    ];

    public function getRouteKeyName(){ return 'name'; }
    public function setNameAttribute($value){ $this->attributes['name'] = ucfirst(str_replace(' ', '_', $value)); }
    public function appmanger(){ return $this->belongsTo(AppManger::class,'app_manger_id'); }
}

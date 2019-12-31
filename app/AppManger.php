<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppManger extends Model{
    use SoftDeletes;
    public $incrementing=true;
    protected $visible = [ 'name'];
    protected $appends = [ 'name'];
    protected $fillable = [ 'name'];
    protected $touches=['user'];
    protected $casts = [ 'name'=>'string'];
    protected $attributes = [ 'name'=>'App' ];
    public function getRouteKeyName(){ return 'name'; }
    public function setNameAttribute($value){ $this->attributes['name'] = ucfirst(str_replace(' ', '_', $value)); }
    public function user(){ return $this->belongsTo(User::class); }
    public function sections(){ return $this->hasMany(Section::class,'app_manger_id'); }

    public function selectType($value) { return $this->sections()->where('type',$value);}

    public static function  selectTypeStatic($value) { return self::sections()->where('type',$value);}

}

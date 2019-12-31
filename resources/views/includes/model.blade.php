<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @include('layouts.boxTitle')
                    <code class="language-php">
                        php artisan make:model {{ucfirst($name)}} -a <br>
                        <br>
                        <h3>Model</h3>
                        use Illuminate\Database\Eloquent\SoftDeletes; <br>
                        use SoftDeletes;<br>
                        <h3>Migrate</h3>
                        $table->softDeletes();<br>
                        <br>
                    </code>
                    @if(count($attributes))
                        <hr>
                        <h6>Accessors</h6>
                        <code class="language-php">
                            @foreach ($attributes as $attribute)
                                public function get{{ucfirst($attribute)}}Attribute(){ return $this->attributes['{{$attribute}}']; }<br>
                            @endforeach
                        </code>
                        <hr>
                        <h6>Mutators</h6>
                        <code class="language-php">
                            @foreach ($attributes as $attribute)
                                public function set{{ucfirst($attribute)}}Attribute($value){ $this->attributes['{{$attribute}}'] = $value; }<br>
                            @endforeach
                        </code>
                        <hr>
                        <h6>Scopes</h6>
                        <code class="language-php">
                            @foreach ($attributes as $attribute)
                                public function scope{{ucfirst($attribute)}}($query){ return $query->where('{{$attribute}}', 'Value');}<br>
                            @endforeach
                        </code>
                    @endif
                    <hr>
                    <h6>Properties</h6>
                    <code class="language-php">
                        public $incrementing = true;<br>
                        public $incrementing = true;<br>
                        public $exists = false;<br>
                        const CREATED_AT = 'created_at';<br>
                        const UPDATED_AT = 'updated_at';<br>
                        protected $perPage = 15;<br>
                        protected $connection;<br>
                        protected $table;<br>
{{--                        protected $relations = [];<br>--}}
                        protected $touches = [];<br>
                        protected $primaryKey = 'id';<br>
                        protected $keyType = 'int';<br>
                        protected $hidden  = [ '{{implode("' , '",$attributes)}}'];<br>
                        protected $visible = [ '{{implode("' , '",$attributes)}}'];<br>
                        protected $appends = [ '{{implode("' , '",$attributes)}}'];<br>
                        protected $guarded = [ '{{implode("' , '",$attributes)}}'];<br>
                        protected static $unguarded = false;<br>
                        protected $fillable = [ '{{implode("' , '",$attributes)}}'];<br>
                        protected $casts   = [ '{{implode("' => '' , '",$attributes)}}'=>''];<br>
                        protected $attributes = [ '{{implode("' => '' , '",$attributes)}}'=>'' ];
                    </code>
                    <hr>
                    <h6>Properties</h6>
                    <code class="language-php">

                        protected function serializeDate(DateTimeInterface $date) { return $date->format('Y-m-d');  }

                    </code>

                    @if (isset($_GET['rmmodel']) && !empty($_GET['rmmodel']))
                        <hr>
                        <h6>Relationships</h6>
                        <code class="language-php">
                            public function {{str_replace(' ','',strtolower($_GET['rmmodel']))}}() { return $this->hasOne('App\{{ucfirst($_GET['rmmodel'])}}','{{strtolower($module)}}_id','id'); }<br>
                            public function {{str_replace(' ','',strtolower($_GET['rmmodel']))}}() { return $this->belongsTo('App\{{ucfirst($_GET['rmmodel'])}}','{{strtolower($module)}}_id','id'); }<br>
                            public function {{str_replace(' ','',strtolower($_GET['rmmodel']))}}s() { return $this->hasMany('App\{{ucfirst($_GET['rmmodel'])}}','{{strtolower($module)}}_id','id'); }<br>
                            public function {{str_replace(' ','',strtolower($_GET['rmmodel']))}}s() { return $this->belongsToMany('App\{{ucfirst($_GET['rmmodel'])}}','{{strtolower($module)}}_id','id')->withPivot(['']); }<br>
                        </code>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

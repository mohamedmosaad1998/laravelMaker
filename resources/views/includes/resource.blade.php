<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @include('layouts.boxTitle')
                    <code class="language-php">
                        php artisan make:resource {{ucfirst($name)}} --collection <br>

                        php artisan make:resource {{ucfirst($name)}}Collection <br>
                        public $preserveKeys = true; <br>
                        public $collects = 'App\Http\Resources\';<br>
                    </code>

                </div>
            </div>
        </div>
    </div>
</div>

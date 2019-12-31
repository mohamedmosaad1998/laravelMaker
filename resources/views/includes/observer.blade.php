<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @include('layouts.boxTitle')
                    <code class="language-php">
                        php artisan make:observer {{ucfirst($name)}}Observer --model={{ucfirst($name)}}

                    </code>

                </div>
            </div>
        </div>
    </div>
</div>

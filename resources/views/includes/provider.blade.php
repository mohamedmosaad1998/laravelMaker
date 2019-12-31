<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @include('layouts.boxTitle')
                    <code class="language-php">
                        php artisan make:provider {{ucfirst($name)}}ServiceProvider
                    </code>
                    <pre class="code-style">
{{'<'}}?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class {{ucfirst($name)}}ServiceProvider extends ServiceProvider {

    public function register()
    {
        // Something
    }

    public function boot() {
        // Something
    }
}
                    </pre>

                </div>
            </div>
        </div>
    </div>
</div>

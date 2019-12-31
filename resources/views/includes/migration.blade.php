<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @include('layouts.boxTitle')
                    <pre class="language-php">
php     artisan make:migration create_{{strtolower($name)}}_table --create={{strtolower($name)}}
                        <code class="language-php token function">
Schema::create('{{strtolower($name)}}', function (Blueprint $table) {
    $table->bigIncrements('id');
    @foreach ($attributes as $attribute)
$table->string('{{$attribute}}');
    @endforeach

    $table->softDeletesTz();
    $table->timestamps();
});
                        </code>

                    </pre>

                </div>
            </div>
        </div>
    </div>
</div>

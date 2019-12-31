<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @include('layouts.boxTitle')
                    <textarea readonly  class="code-style border-0">
php artisan make:factory {{ucfirst($name)}}Factory --model={{ucfirst($name)}}
                        @foreach(['define','afterCreating','afterMaking'] as $ty)

        $factory->{{$ty}}(App\{{ucfirst($name)}}::class, function (@if ($ty!="define")${{strtolower($name)}},@endif$faker) {
            @if ($ty=="define")
return [
    @foreach ($attributes as $attribute)
            '{{$attribute}}' => $faker->{{$attribute}},
    @endforeach
        ];
            @endif

        });

                        @endforeach


                    </textarea>
                </div>
            </div>
        </div>
    </div>
</div>


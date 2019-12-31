<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @include('layouts.boxTitle')
<pre class="language-php token function">
<span class="token function">php artisan make:request {{ucfirst($name)}}Request</span>
return [
    @foreach ($attributes as $attribute)
    '{{$attribute}}' => ['required'],
    @endforeach
];
</pre>

                </div>
            </div>
        </div>
    </div>
</div>

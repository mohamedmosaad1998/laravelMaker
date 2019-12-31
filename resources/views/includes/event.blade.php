<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @include('layouts.boxTitle')
                    <code class="language-php">
                        @foreach( collect([
    '','Retrieved', 'Creating', 'Created', 'Updating', 'Updated', 'Saving', 'Saved', 'Deleting', 'Deleted', 'Restoring', 'Restored'
                        ])->sort()->toArray() as $value )
                            php artisan make:event {{ucfirst($name).ucfirst($value)}}Event <br>
                        @endforeach
                        <br>
                        php artisan event:generate <br>
                    </code>
                </div>
            </div>
        </div>
    </div>
</div>

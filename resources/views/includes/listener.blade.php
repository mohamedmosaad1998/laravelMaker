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
                            php artisan make:listener {{ucfirst($name).ucfirst($value)}}Listener <br>
                        @endforeach
                    </code>
                    <h4>
                        use Events
                    </h4>

                    <code class="language-php">
                        @foreach( collect([
'','Retrieved', 'Creating', 'Created', 'Updating', 'Updated', 'Saving', 'Saved', 'Deleting', 'Deleted', 'Restoring', 'Restored'
])->sort()->toArray() as $value )
                        '\App\Events\{{ucfirst($name).ucfirst($value)}}Event' => [<br>
                            '\App\Listeners\{{ucfirst($name).ucfirst($value)}}Listener',<br>
                        ],<br>
                        @endforeach
                    </code>

                </div>
            </div>
        </div>
    </div>
</div>

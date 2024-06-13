<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Relation::enforceMorphMap(
            collect(config('ozu-client.collections'))
                ->mapWithKeys(fn (string $collectionClass) => [
                    app($collectionClass)->ozuCollectionKey() => $collectionClass,
                ])
                ->toArray()
        );
    }
}

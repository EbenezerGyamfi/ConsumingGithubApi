<?php

namespace App\Http\Integrations\Github\Requests;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetAllUserRepoRequest extends Request implements Paginatable
{


    public function __construct(public string $name)
    {
        
    }


    // public function resolveCacheDriver(): Driver
    // {
    //     return new LaravelCacheDriver(Cache::store('file'));
    // }


    // public function cacheExpiryInSeconds(): int
    // {
    //     return 5;
    // }
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/users/'.$this->name.'/repos';
    }
}

<?php

namespace App\Http\Integrations\Github;

use GuzzleHttp\Psr7\Header;
use Illuminate\Support\Facades\Cache;
use Saloon\Http\Connector;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\PagedPaginator;
use Saloon\PaginationPlugin\Paginator;
use Saloon\RateLimitPlugin\Contracts\RateLimitStore;
use Saloon\RateLimitPlugin\Limit;
use Saloon\RateLimitPlugin\Stores\LaravelCacheStore;
use Saloon\RateLimitPlugin\Traits\HasRateLimits;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;


class GithubConnector extends Connector implements HasPagination
{
    use AcceptsJson;
    use HasRateLimits;

     protected function resolveLimits(): array{
        return [
            Limit::allow(requests: 10)->everySeconds(seconds: 1),
            Limit::allow(requests: 1000)->everyHour()
        ];
     }

     protected function resolveRateLimitStore(): RateLimitStore{


        return new LaravelCacheStore(Cache::store(config('cache.default')));

     }


    public function boot(PendingRequest $pendingRequest) : void{

        $pendingRequest->headers()->add('X-Signature', 'this is just for testing to add header to the request');

    }
    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return 'https://api.github.com/';
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    public function paginate(Request $request): PagedPaginator
    {

        return new class($this, $request) extends PagedPaginator
        {

            protected ?int $perPage  = 10;

            protected function isLastPage(Response $response): bool
            {
                $linkHeader = Header::parse($response->header('Link'));


                return collect($linkHeader)
                    ->where(fn (array $link): bool => $link['rel'] === 'next')
                    ->isEmpty();
            }


            protected function getPagedItems(Response $response, Request $request): array
            {
                return $response->dtoOrFail()->toArray();
            }


            protected function applyPagination(Request $request) : Request
            {
                return $request;
            }
        };
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [];
    }
}

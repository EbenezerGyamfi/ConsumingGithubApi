<?php

namespace App\Http\Integrations\Github;

use GuzzleHttp\Psr7\Header;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\PagedPaginator;
use Saloon\PaginationPlugin\Paginator;
use Saloon\Traits\Plugins\AcceptsJson;

use function PHPUnit\Framework\isEmpty;

class GithubConnector extends Connector implements HasPagination
{
    use AcceptsJson;

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

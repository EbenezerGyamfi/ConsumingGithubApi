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

class GithubConnector extends Connector implements HasPagination
{
    use AcceptsJson;

    public function paginate(Request $request) : PagedPaginator
    {
        return new class($this, $request) extends PagedPaginator
        {
            protected ?int $perPageLimit  = 2;

            // protected function applyPagination(Request $request): Request
            // {
            //     $request->query()->add('current_page', $this->page);
        
            //     if (isset($this->perPageLimit)) {
            //         $request->query()->add('page_size', $this->perPageLimit);
            //     }
        
            //     return $request;
            // }

            protected  function isLastPage(Response $response): bool
            {

                $linkHeader = Header::parse($response->header('link'));

                return collect($linkHeader)
                    ->where(fn (array $link): bool => $link['rel'] === 'next')
                    ->isEmpty();
            }



            protected function getPageItems(Response $response, Request $request) : array
            {

                return $response->json();
            }
        };
    }


    public function resolveBaseUrl(): string
    {
        return 'https://api.github.com';
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [];
    }
}

<?php

namespace App\Http\Integrations\Github;

use App\Exceptions\Integrations\Github\GithubExceptions;
use App\Exceptions\Integrations\GitHub\NotFoundException;
use App\Exceptions\Integrations\GitHub\UnauthorizedException;
use GuzzleHttp\Psr7\Header;
use Saloon\Http\Connector;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\PagedPaginator;
use Saloon\PaginationPlugin\Paginator;
use Saloon\Traits\Plugins\AcceptsJson;
use Throwable;

class GithubConnector extends Connector implements HasPagination
{
    use AcceptsJson;

    public function paginate(Request $request): PagedPaginator
    {
        return new class($this, $request) extends PagedPaginator

        {
            protected ?int $perPageLimit  = 2;

            public function getRequestException(Response $response, Throwable $senderException): Throwable
            {
                return match ($response->status()) {
                    403  => new UnauthorizedException(message: $response->body(), code: $response->status(), previous: $senderException),
                    404 => new NotFoundException(message: $response->body(), code: $response->status(), previous: $senderException),

                    default => new GithubExceptions(message: $response->body(), code: $response->status(), previous: $senderException),
                };
            }

            // protected function applyPagination(Request $request): Request
            // {
            //     $request->query()->add('current_page', $this->page);

            //     if (isset($this->perPageLimit)) {
            //         $request->query()->add('page_size', $this->perPageLimit);
            //     }

            //     return $request;
            // }


            public function boot(PendingRequest $pendingRequest)
            {
                $pendingRequest->headers()->add('X-TRY', 'test eben request');
            }

            protected  function isLastPage(Response $response): bool
            {

                $linkHeader = Header::parse($response->header('link'));

                return collect($linkHeader)
                    ->where(fn (array $link): bool => $link['rel'] === 'next')
                    ->isEmpty();
            }



            protected function getPageItems(Response $response, Request $request): array
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

<?php

namespace App\Data;

use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\PaginatedDataCollection;

class ResponseData extends Data
{
    public int $current_page;

    public int $last_page;

    public ?string $prev_page_url;

    public ?string $next_page_url;

    // You can add more properties as needed

    public static function fromPaginator(PaginatedDataCollection $paginator)
    : self
    {

        return new self([
            'links' => [
                'current_page'  => $paginator,
            ],
        ]);
    }
}

<?php

namespace App\Data;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Optional;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class CategoryData extends Data
{
    public function __construct(
        public ?int $id,

        public string $title,

        public string|null $is_active,

        /** @var Collection<int, BlogData>|null */
        public ?Collection $blogs,

        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $updated_at
    )
    {
    }
}

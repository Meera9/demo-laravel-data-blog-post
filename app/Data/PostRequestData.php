<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PostRequestData extends Data
{
    public function __construct(
        #[Sometimes]
        public Optional|int $id,

        public string $title,

        public int $blog_id,

        public string $description,
    )
    {
    }
}

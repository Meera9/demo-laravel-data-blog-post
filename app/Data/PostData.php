<?php

namespace App\Data;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Optional;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class PostData extends Data
{
    public function __construct(
        public Optional|int $id,

        public string $title,

        public string $description,

        public ?UserData $author,

        public ?BlogData $blog,

        /** @var Collection<int, CommentData> */
        public ?Collection $comments,

        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d H:i:s')]
        public Carbon $created_at,

        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d H:i:s')]
        public Carbon $updated_at
    )
    {
    }
}

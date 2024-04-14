<?php

namespace App\Data;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class BlogData extends Data
{
    public function __construct(
        #[Sometimes]
        public Optional|int $id,

        public string $title,

        public int $order,

        public string $description,

        public ?UserData $author,

        /** @var Collection<int, CategoryData>|null */
        public ?DataCollection $categories,

        /** @var Collection<int, PostData>|null */
        public ?Collection $posts,

        /** @var Collection<int, CommentData>|null */
        public ?Collection $comments,

        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d H:i:s')]
        public Carbon $created_at,

        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d H:i:s')]
        public Carbon $updated_at,
    )
    {
    }
}

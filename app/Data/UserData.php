<?php

namespace App\Data;

use Carbon\Carbon;
use Illuminate\Support\Optional;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class UserData extends Data
{
    public function __construct(
        public Optional|int $id,

        public string $name,

        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d H:i:s')]
        public Carbon $updated_at
    )
    {
    }
}

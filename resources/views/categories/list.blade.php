<div class="row">
    @foreach ($categories as $index => $item)
    @if ($index % 3 == 0)
    <div class="col-sm-6">
        <ul class="list-unstyled mb-0">
            @endif
            <li><a href="{{route('categories.show',['category' => $item->id])}}">{{ $item->title }}</a></li>
            @if (($index + 1) % 3 == 0 || $index + 1 == count($categories))
        </ul>
    </div>
    @endif
    @endforeach
</div>

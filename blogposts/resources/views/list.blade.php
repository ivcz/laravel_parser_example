<div class="blogpost-list">
    @foreach($posts as $post)
        <div class="blogpost-item">
            <div class="blogpost-item__title">
                <a class="blogpost-item__link" href="/{{ $post->id }}">{{ $post->title }}</a>
            </div>
            <div class="blogpost-item__preview">
                {{ $post->short_text }}
            </div>
            <div class="blogpost-item__date">
                {{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}
            </div>
        </div>
    @endforeach
</div>

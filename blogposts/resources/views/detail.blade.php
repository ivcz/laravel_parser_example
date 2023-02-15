<div class="blogpost">
    <div class="blogpost__date">
        {{ \Carbon\Carbon::parse($created_at)->format('d-m-Y') }}
    </div>
    <div class="blogpost__title">
        {{ $title }}
    </div>
    <div class="blogpost__text">
        {{ $text }}
    </div>
</div>

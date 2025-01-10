<marquee width="100%" direction="left">
    @foreach ($runningText as $text)
        <span>{{ $text->running_text }}</span>
    @endforeach
</marquee>

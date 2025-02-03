@foreach($posts as $post)
<div class="card max-w-xs m-10">
    <img class="card-img-top size-60" src="{{ url('images/posts/' . $post->post_image) }}"
        alt="{{ $post->post_title }}">
    <div class="card-body">
        <h5 class="my-2 card-title text-xl font-semibold">{{ $post->post_title }}</h5>
        <p class="my-2 card-text text-justify h-32">{{ Str::limit($post->post_description, 150) }}</p>
        <div class="text-sm flex space-between mt-4">
            <a href="{{ route('posts.detailAdmin', $post->id) }}" class="border border-[#94918f] py-2 px-4 rounded">
                Read More
            </a>
            <p class="font-medium italic mx-auto my-auto">Updated at: {{
                \Carbon\Carbon::parse($post->created_at)->timezone('Asia/Jakarta')->diffForHumans() }}</p>
        </div>
    </div>
</div>
@endforeach

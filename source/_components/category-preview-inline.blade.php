<div class="flex flex-col mb-4">
    <p class="m-0">
        <a
            href="{{ $post->getUrl() }}"
            title="Read more - {{ $post->title }}"
            class="text-2xl text-gray-900 font-extrabold"
        >
            {{ $post->title }}<span class="text-gray-700 font-medium text-base"> - {{ $post->getDate()->format('F j, Y') }}</span>
        </a> 
    </p>
</div>

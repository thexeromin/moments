<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    @foreach($posts as $post)
    <div class="relative group">
        <img 
            class="h-auto max-w-full rounded-lg transition-all duration-300 ease-in-out group-hover:brightness-75 w-[400px] h-[400px]" 
            src="{{ $post->image_url }}" 
            alt="">
        <!-- Icon -->
        <form action="{{ route('post.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <i class="fas fa-trash text-red-500 text-4xl"></i>
            </button>
        </form>
    </div>
    @endforeach
</div>

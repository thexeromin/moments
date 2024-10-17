<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg sm:p-0 p-5">
                <div class="flex flex-col items-center">
                    @foreach($posts as $post)
                    <div class="image-container mb-5 max-w-[500px] relative">
                        <img class="h-auto max-w-full rounded-lg" src="{{ $post->image_url }}"
                            alt="{{ $post->caption }}">
                        <!-- Always visible heart icon -->
                        <div class="absolute top-2 left-2 text-white text-3xl z-10">
                            <form method="post" action="{{ route('post.like', ['postId' => $post['id'] ]) }}">
                                @csrf
                                <button type="submit"
                                    class="appearance-none bg-transparent border-none p-0 m-0 focus:outline-none">
                                    <i
                                        class="fas fa-heart {{ $post->isLikedBy(auth()->user()) ? 'text-red-500' : 'text-white-500' }}"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"
        integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</x-app-layout>
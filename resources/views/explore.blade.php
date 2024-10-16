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
                            <i class="fas fa-heart text-red-500"></i>
                        </div>

                        <!-- Hover overlay with heart and trash icon -->
                        <div
                            class="absolute inset-0 bg-white bg-opacity-20 backdrop-blur-lg flex justify-center space-x-4 items-center rounded-lg opacity-0 hover:opacity-100 transition-opacity duration-300">
                            <i class="fas fa-heart text-white text-5xl"></i>
                            <!-- <i class="fas fa-trash text-white text-5xl"></i> -->
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
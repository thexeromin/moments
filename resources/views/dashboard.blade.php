<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg sm:p-0 p-5">
                <div class="flex flex-col items-center">
                    @foreach($posts as $post)
                    <div class="mb-5 max-w-[500px]">
                        <img
                            class="rounded-lg"
                            src="{{ $post->image_url }}" 
                            alt="{{ $post->caption }}"
                        >
                    </div>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
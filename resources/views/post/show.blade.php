<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moment #' . $post->id) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <!-- section -->
                <div
                    class="flex flex-col md:flex-row items-start gap-6 max-w-full mx-auto p-4">
                    <!-- Image Section -->
                    <div class="w-full md:w-1/2">
                        <img class="h-auto max-w-full rounded-lg" src="{{ $post->image_url }}"
                            alt="{{ $post->caption }}">
                    </div>

                    <!-- Caption and Comments Section -->
                    <div class="w-full md:w-1/2 flex flex-col gap-4">
                        <!-- Caption -->
                        <div class="text-lg font-medium text-gray-700">
                            {{ $post->caption }}
                        </div>

                        <!-- Scrollable Comments Section -->
                        <div class="flex flex-col gap-3 max-h-48 overflow-y-auto border rounded-lg p-3 bg-gray-50">
                            <!-- Example Comment -->
                            @foreach($comments as $comment)
                            <div class="text-sm text-gray-600">
                                <span class="font-semibold text-gray-800">{{ $comment->author->name }}</span>: {{ $comment->message }}
                            </div>
                            @endforeach
                        </div>

                        <!-- Add Comment Input -->
                        @include('post.partials.create-comment-form', [ 'post_id' => $post->id ])
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
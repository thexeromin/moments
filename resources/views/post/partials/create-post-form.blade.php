<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Post Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Create a new post to share your moments") }}
        </p>
    </header>

    <form 
        method="post"
        action="{{ route('post.store') }}"
        enctype="multipart/form-data"
        class="mt-6 space-y-6"
    >
        @csrf

        <div>
            <x-input-label for="caption" :value="__('Caption')" />
            <x-text-input id="caption" name="caption" type="text" class="mt-1 block w-full" required autofocus autocomplete="caption" />
            <x-input-error class="mt-2" :messages="$errors->get('caption')" />
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image_file">Upload file</label>
            <x-input-upload aria-describedby="file_input_help" id="image_file" type="file" name="image_file" />
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

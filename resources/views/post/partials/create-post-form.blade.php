<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Post Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Create a new post to share your moments") }}
        </p>
    </header>

    <form method="post" action="{{ route('post.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="title" :value="__('Caption')" />
            <x-text-input id="title" title="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <x-input-upload aria-describedby="file_input_help" id="file_input" type="file" />
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

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('form.delete_account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('form.warning_delete') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('form.delete_account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('form.sure') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('form.warning_delete')}} {{__('form.enter')}}
            </p>

            <div class="mt-6">
                <x-input-label for="email" value="{{ __('form.email') }}" class="sr-only" />

                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('form.email') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('email')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <button class="" x-on:click="$dispatch('close')">
                    {{ __('form.cancel') }}
                </button>

                <button class="bg-[#FF6961] text-white">
                    {{ __('form.delete_account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>

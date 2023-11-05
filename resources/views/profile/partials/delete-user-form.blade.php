<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('form.delete_account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('form.warning_delete') }}
        </p>
    </header>

    <button
        class="flex w-auto justify-center  mt-2 rounded-md bg-red-600 px-4 py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('form.delete_account') }}</button>

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
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('form.cancel') }}
                </x-secondary-button>

                <button class="flex w-auto justify-center  mt-2 rounded-md bg-red-600 px-4  ml-2 py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    {{ __('form.delete_account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>

<button {{ $attributes->merge(['type' => 'button', 'class' => 'flex w-auto justify-center  mt-2 rounded-md bg-deep-black px-4  ml-2 py-1.5  text-sm font-semibold leading-6 text-white shadow-sm hover:bg-kdg-dark-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600']) }}>
    {{ $slot }}
</button>

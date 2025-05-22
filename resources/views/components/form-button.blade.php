<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-md bg-indigo-600 px-3 py-2 text-sm cursor-pointer font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600']) }}>
    {{ $slot }}
</button>

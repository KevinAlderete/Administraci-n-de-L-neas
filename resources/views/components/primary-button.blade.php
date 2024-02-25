<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex shadow-lg border-[#1958A6]  items-center gap-2 rounded-md bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-500 transition-all']) }}>
    {{ $slot }}
</button>

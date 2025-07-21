<button {{ $attributes->merge([
    'type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#00205B;] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-[#00205B;] active:bg[#00205B;] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>

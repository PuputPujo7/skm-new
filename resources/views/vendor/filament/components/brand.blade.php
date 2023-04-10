@if (filled($brand = config('filament.brand')))
    <div @class([
        'filament-brand text-xl font-bold tracking-tight',
        'dark:text-white' => config('filament.dark_mode'),
    ])>
        {{-- {{ $brand }} --}}
        <div class="grid grid-rows-2">
            {{-- <img src="logo-skm.png" alt="" style="height: 25px"> --}}
            <img src="{{ asset('skm-admin.png') }}" alt="Logo" class="h-10">
            {{-- <h1 class="font-bold">SKM</h1> --}}
        </div>
    </div>
@endif

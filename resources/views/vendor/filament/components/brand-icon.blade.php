@if (filled($brand = config('filament.brand')))
    <div @class([
        'filament-brand text-xl font-bold tracking-tight',
        'dark:text-white' => config('filament.dark_mode'),
    ])>
        {{-- {{
            \Illuminate\Support\Str::of($brand)
                ->snake()
                ->upper()
                ->explode('_')
                ->map(fn (string $string) => \Illuminate\Support\Str::substr($string, 0, 1))
                ->take(2)
                ->implode('')
        }} --}}
        <div class="">
            {{-- <img src="logo-skm.png" alt="" style="height: 25px"> --}}
            <img src="{{ asset('logo-skm.png') }}" alt="Logo" class="h-10">
            {{-- <h1 class="font-bold">SKM</h1> --}}
        </div>
    </div>
@endif

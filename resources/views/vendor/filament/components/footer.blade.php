{{ \Filament\Facades\Filament::renderHook('footer.before') }}

<div class="filament-footer flex items-center justify-center">
    {{ \Filament\Facades\Filament::renderHook('footer.start') }}

    @if (config('filament.layout.footer.should_show_logo'))
    <div class="flex items-center justify-center filament-footer">
        <a
            href="https://github.com/bhoobalan-bhoo/"
            target="_blank"
            rel="noopener noreferrer"
            class="text-gray-300 hover:text-primary-500 transition"
        >
        <span class="px-1"></span>&copy; {{ date('Y') }} - Bhoobalan B R - DevRev Task
        </a>
    </div>
    @endif

    {{ \Filament\Facades\Filament::renderHook('footer.end') }}
</div>

{{ \Filament\Facades\Filament::renderHook('footer.after') }}

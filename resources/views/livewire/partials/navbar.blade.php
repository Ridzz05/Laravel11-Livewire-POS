<div class="navbar border-b-2 border-base-300 bg-base-100">
    {{-- humberger menu --}}
    <div class="navbar-start">
        <label for="drawer" class="btn btn-circle btn-ghost">
            <x-tabler-menu class="size-5" />
        </label>
    </div>
    {{-- tulisan di tengah navbar --}}
    <div class="navbar-center">
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl" wire:navigate>{{ config('app.name') }}</a>
    </div>
    {{-- plus menu --}}
    <div class="navbar-end">
        <a class="btn btn-circle btn-ghost" wire:navigate>
            <x-tabler-plus class="size-5" />
        </a>
    </div>
</div>

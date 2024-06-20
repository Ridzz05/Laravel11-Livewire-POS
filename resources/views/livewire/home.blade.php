<div class="page-wrapper">
    {{-- bagi menjadi 3 kolom --}}
    <div class="grid grid-cols-3 gap-6">
        {{-- card 1 --}}
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-4">
                <div class="avatar placeholder">
                    <div class="w-12 rounded-full bg-warning">
                        <x-tabler-calendar-month class="size-6" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-60">Pendapatan bulan ini</div>
                    <div class="text-2xl font-bold">Rp. {{ Number::format($monthly) }}</div>
                </div>
            </div>
        </div>
        {{-- card 2 --}}
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-4">
                <div class="avatar placeholder">
                    <div class="w-12 rounded-full bg-warning">
                        <x-tabler-calendar-check class="size-6" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-60">Pendapatan hari ini</div>
                    <div class="text-2xl font-bold">Rp. {{ Number::format($today->sum('price')) }}</div>
                </div>
            </div>
        </div>
        {{-- card 3 --}}
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-4">
                <div class="avatar placeholder">
                    <div class="w-12 rounded-full bg-warning">
                        <x-tabler-list-check class="size-6" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-60">Pesanan hari ini</div>
                    <div class="text-2xl font-bold">{{ $today->count() }} Pesanan</div>
                </div>
            </div>
        </div>
    </div>
</div>

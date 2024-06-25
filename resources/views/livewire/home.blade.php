<div class="page-wrapper">
    {{-- bagi menjadi 3 kolom --}}
    <div class="grid gap-2 md:grid-cols-3 md:gap-6">
        {{-- card 1 --}}
        <div class="card-compact card">
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
        <div class="card-compact card">
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
        <div class="card-compact card">
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

    {{-- table --}}
    <h2 class="text-center font-bold uppercase underline md:text-2xl">Transaksi belum selesai</h2>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Customer</th>
                <th>Keterangan</th>
                <th>Total Bayar</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    {{-- wire key berfungsi untuk key yang bersifat unique dalam perulangan livewire --}}
                    <tr wire:key='{{ $data->id }}'>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->created_at->format('d F Y') }}</td>
                        <td>{{ $data->customer?->name ?? '-' }}</td>
                        <td>{{ $data->desc }}</td>
                        <td>{{ Number::format($data->price) }}</td>
                        <td>
                            <input type="checkbox" class="toggle toggle-primary toggle-sm" @checked($data->done)
                                wire:change='toggleDone({{ $data->id }})'>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

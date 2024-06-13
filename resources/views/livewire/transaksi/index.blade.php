<div class="page-wrapper">
    {{-- search --}}
    <div class="flex justify-between">
        <!-- wire:model.live akan melalukan pencarian dengan filter secara langsung -->
        <input type="date" class="input input-bordered" wire:model.live="date">

        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
            <x-tabler-plus class="size-5" />
            <span>tambah transaksi</span>
        </a>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->created_at->diffForHumans() }}</td>
                        <td>{{ $transaksi->desc }}</td>
                        <td>
                            {{ $transaksi->customer->name ?? '-' }}
                            {{-- @if ($transaksi->customer->name == null)
                                <span>-</span>
                            @else
                                {{ $transaksi->customer->name }}
                            @endif --}}
                        </td>
                        <td>{{ Number::format($transaksi->price) }}</td>
                        <td>
                            <input type="checkbox" class="toggle toggle-primary toggle-sm" @checked($transaksi->done)
                                wire:change='toggleDone({{ $transaksi->id }})'>
                        </td>
                        {{-- action --}}
                        <td>
                            <div class="flex justify-center gap-1">
                                <a href="" class="btn btn-xs">
                                    <x-tabler-edit class="size-4" />
                                </a>
                                <button class="btn btn-xs" wire:click='deleteTransaksi({{ $transaksi->id }})'>
                                    <x-tabler-trash class="size-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

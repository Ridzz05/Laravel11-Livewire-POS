<div class="page-wrapper">
    {{-- buat menjadi 2 bagian menggunakan grid (kanan dan kiri) --}}
    <div class="grid grid-cols-2 gap-6">
        <div class="card-divider card h-fit">
            {{-- sebalah kiri --}}
            <div class="card-body">
                {{-- pencarian --}}
                <input type="search" class="input input-bordered" placeholder="Pencarian" wire:model.live='search'>
            </div>
            @foreach ($menus as $type => $menu)
                <div class="card-body">
                    {{-- tampilkan data --}}
                    <h3 class="text-xl font-bold capitalize">{{ $type }}</h3>
                    {{-- <pre>@json($menu, JSON_PRETTY_PRINT)</pre> --}}
                    <div class="grid grid-cols-4">
                        @foreach ($menu as $item)
                            {{-- class avatar milik daisyui --}}
                            <div class="flex flex-col">
                                <div class="avatar">
                                    <div class="w-full rounded">
                                        <img src="{{ $item->gambar }}" alt="">
                                    </div>
                                </div>
                                <h5 class="text-center text-[10px] font-normal">{{ $item->name }}</h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        {{-- sebelah kanan --}}
        <div class="card h-fit">
            <div class="card-body space-y-4">
                <h3 class="card-title">Detail transaksi</h3>

                {{-- table --}}
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th></th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <select class="select select-bordered" wire:model='customer_id'>
                    <option value="">Pilih Customer</option>
                    @foreach ($customers as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>

                <textarea rows="5" class="textarea textarea-bordered"
                    placeholder="keterangan dapat diisi dengan jenis pembayaran atau nomor meja" wire:model='desc'></textarea>

                <div class="card-actions justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs">Total</div>
                        <div class="card-title">Rp. 0</div>
                    </div>
                    <button class="btn btn-primary">
                        <x-tabler-check class="size-5" />
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

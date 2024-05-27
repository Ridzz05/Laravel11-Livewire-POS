<div class="page-wrapper">
    {{-- search  --}}
    <div class="flex justify-between">
        <input type="text" class="input input-bordered" placeholder="Pencarian..">
        <button class="btn btn-primary">
            <x-tabler-plus class="size-5" />
            <span>tambah menu</span>
        </button>
    </div>


    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                {{-- foreach dari livewire --}}
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $no++ }}</td>
                        {{-- image and name --}}
                        <td>
                            <div class="flex gap-2">
                                <div class="avatar">
                                    {{-- photo --}}
                                    <div class="w-12 rounded-lg">
                                        <img src="{{ $menu->gambar }}" alt="">
                                    </div>
                                </div>
                                {{-- menu name and menu type --}}
                                <div class="flex flex-col">
                                    <span>{{ $menu->name }}</span>
                                    <span class="text-xs text-gray-500">{{ $menu->type }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $menu->harga }}</td>
                        <td>{{ $menu->desc }}</td>
                        <td>
                            <butto class="btn btn-square btn-xs">
                                <x-tabler-edit class="size-4" />
                            </butto>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

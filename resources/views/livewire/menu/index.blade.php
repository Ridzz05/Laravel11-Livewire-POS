<div class="page-wrapper">
    {{-- search  --}}
    <div class="flex flex-col justify-between gap-2 md:flex-row">
        <!-- wire:model.live akan melalukan pencarian dengan filter secara langsung -->
        <input type="text" class="input input-bordered" placeholder="Pencarian.." wire:model.live="search">

        {{-- wire:click mengarah pada action liveweire --}}
        <button class="btn btn-primary" wire:click="dispatch('createMenu')">
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
                <th class="text-center">Aksi</th>
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
                                    <div class="w-10 rounded-lg border-2">
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
                        <!-- agar tidak terlalu kekanan -->
                        <td class="w-80 whitespace-normal">
                            <div class="line-clamp-2">
                                {{ $menu->desc }}
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-center gap-1">
                                <!-- wire:click untuk edit data dengan membawa menu:id -->
                                <button class="btn-s btn btn-square btn-warning"
                                    wire:click="$dispatch('editMenu', {menu: {{ $menu->id }}})">
                                    <x-tabler-edit class="size-4" />
                                </button>
                                <button class="btn-s btn btn-square btn-error"
                                    wire:click="$dispatch('deleteMenu', {menu: {{ $menu->id }}})">
                                    <x-tabler-trash class="size-4" s />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @livewire('menu.actions')
</div>

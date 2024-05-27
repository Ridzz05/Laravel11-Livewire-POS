<div class="page-wrapper">
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
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->oke }}</td>
                        <td>{{ $menu->desc }}</td>
                        <td>
                            <butto class="btn btn-square btn-primary btn-xs">
                                <x-tabler-edit class="size-4" />
                            </butto>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

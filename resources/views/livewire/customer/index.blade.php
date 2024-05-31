<div class="page-wrapper">
    {{-- search  --}}
    <div class="flex justify-between">
        <!-- wire:model.live akan melalukan pencarian dengan filter secara langsung -->
        <input type="text" class="input input-bordered" placeholder="Pencarian.." wire:model.live="search">

        {{-- wire:click mengarah pada action liveweire --}}
        <button class="btn btn-primary" wire:click="dispatch('createCustomer')">
            <x-tabler-plus class="size-5" />
            <span>tambah customer</span>
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama Customer</th>
                <th>Nomer </th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
            </thead>
            <tbody>
                {{-- foreach dari livewire --}}
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->contact }}</td>
                        <td>{{ $customer->desc }}</td>
                        <td>
                            <div class="flex justify-center gap-1">
                                <!-- wire:click untuk edit data dengan membawa customer:id -->
                                <button class="btn-s btn btn-square btn-warning"
                                    wire:click="$dispatch('editCustomer', {customer: {{ $customer->id }}})">
                                    <x-tabler-edit class="size-4" />
                                </button>
                                <button class="btn-s btn btn-square btn-error"
                                    wire:click="$dispatch('deleteCustomer', {customer: {{ $customer->id }}})">
                                    <x-tabler-trash class="size-4" s />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @livewire('customer.actions')
</div>

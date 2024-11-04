<ul class="menu min-h-full w-80 space-y-4 border-r-2 border-base-300 bg-base-100 p-4 text-base-content">
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            <li>
                <a href="{{ route('home') }}" @class(['active' => Route::is('home')]) wire:navigate>
                    <x-tabler-layout-dashboard class="size-5" />
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.create') }}" @class(['active' => Route::is('transaksi.create')]) wire:navigate>
                    <x-tabler-shopping-cart class="size-5" />
                    <span>Mulai Jual</span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <h2 class="menu-title">Data Master</h2>
        <ul>
            <li>
                <a href="{{ route('menu.index') }}" @class(['active' => Route::is('menu.index')]) wire:navigate>
                    <x-tabler-box-multiple class="size-5" />
                    <span>Tambah Produk</span>
                </a>
            </li>
            <li>
                <a href="{{ route('customer.index') }}" @class(['active' => Route::is('customer.index')]) wire:navigate>
                    <x-tabler-users class="size-5" />
                    <span>Data Customer</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.index') }}" @class(['active' => Route::is(['transaksi.index', 'transaksi.export'])]) wire:navigate>
                    <x-tabler-license class="size-5" />
                    <span>Riwayat Transaksi</span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <h2 class="menu-title">Data Gudang</h2>
        <ul>
            <li>
                <a href="{{ route('stok.index') }}" @class(['active' => Route::is('stok.index')]) wire:navigate>
                    <x-tabler-package class="size-5" />
                    <span>Data Stok</span>
                </a>
            </li>
            <li>
                <a href="{{ route('supplier.index') }}" @class(['active' => Route::is('supplier.index')]) wire:navigate>
                    <x-tabler-truck-delivery class="size-5" />
                    <span>Data Supplier</span>
                </a>
            </li>
            <li>
                <a href="{{ route('barang-masuk.index') }}" @class(['active' => Route::is('barang-masuk.index')]) wire:navigate>
                    <x-tabler-package-import class="size-5" />
                    <span>Data Barang Masuk</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Cetak Dokumen</h2>
        <ul>
            <li>
                <a href="{{ route('suratjalan.index') }}" @class(['active' => Route::is('suratjalan.index')]) wire:navigate>
                    <x-tabler-printer class="size-5" />
                    <span>Cetak Surat Jalan</span>
                </a>
            </li>            
        </ul>
    </li>    
    <li>
        <h2 class="menu-title">Account</h2>
        <ul>
            <li>
                <a href="{{ route('profile') }}" @class(['active' => Route::is('profile')]) wire:navigate>
                    <x-tabler-user class="size-5" />
                    <span>Edit Profile</span>
                </a>
            </li>
            <li>
                <button wire:click='logout'>
                    <x-tabler-logout class="size-5" />
                    <span>Logout</span>
                </button>
            </li>
        </ul>
    </li>
</ul>

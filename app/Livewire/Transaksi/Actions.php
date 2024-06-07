<?php

namespace App\Livewire\Transaksi;

use App\Models\Customer;
use App\Models\Menu;
use Livewire\Component;

class Actions extends Component
{
    //search attribute
    public $search;

    public function render()
    {
        return view('livewire.transaksi.actions', [
            //get menu. jika terdapat search gunakan function search, jika tidak get by type;
            'menus' => Menu::when($this->search, function ($menu) {
                $menu->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('type', 'like', '%' . $this->search . '%')
                    ->orWhere('desc', 'like', '%' . $this->search . '%');
            })->get()->groupBy('type'),
            //get customer
            'customers' => Customer::pluck('name', 'id')
        ]);
    }
}

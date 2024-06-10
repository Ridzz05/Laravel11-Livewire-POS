<?php

namespace App\Livewire\Transaksi;

use App\Livewire\Forms\TransaksiForm;
use App\Models\Customer;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Actions extends Component
{
    //search public property
    public $search;

    //item total public property
    public $items = []; //ini akan menyimpan 2 data obj yaitu qty dan price

    public ?TransaksiForm $form;

    public function addItem(Menu $menu)
    {
        //$menu->name adalah key
        if (isset($this->items[$menu->name])) {
            // jika item sudah ada, tambahkan qty
            $item = $this->items[$menu->name];

            //tambahkan qty dan price jika item sudah ada
            $this->items[$menu->name] = [
                'qty' => $item['qty'] + 1,
                'price' => $item['price'] + $menu->price,
            ];
        } else {
            $this->items[$menu->name] = [
                'qty' => 1,
                'price' => $menu->price,
            ];
        }
        // dd($this->items);
    }

    public function removeItem($key)
    {
        $item = $this->items[$key];

        //jika qty lebih dari 1, kurangi qty dan price
        if ($item['qty'] > 1) {
            //deklare
            $hargaSatuan = $item['price'] / $item['qty'];
            $qtyBaru = $item['qty'] - 1;

            //kurangi qty dan price jika item lebih dari 1
            $this->items[$key]['qty'] = $qtyBaru;
            $this->items[$key]['price'] = $hargaSatuan * $qtyBaru;
        } else {
            //unset
            unset($this->items[$key]);
        }
    }

    public function getTotalPrice()
    {
        $prices = array_column($this->items, 'price');

        //return sum
        return array_sum($prices);
    }

    public function simpan()
    {
    }

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

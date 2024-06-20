<?php

namespace App\Livewire;

use App\Models\Transaksi;
use Livewire\Component;

class Home extends Component
{
    public function toggleDone(Transaksi $transaksi)
    {
        $transaksi->done = !$transaksi->done;
        $transaksi->save();
    }
    public function render()
    {
        // ambil tahun dan bulan dengan menggunakan explode dari Y-m
        [$tahun, $bulan] = explode('-', date('Y-m'));
        // atau bisa satuan
        $today = date('Y-m-d');

        $transaksi = Transaksi::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun);
        return view('livewire.home', [
            'monthly' => $transaksi->get()->sum('price'),
            'today' => $transaksi->whereDate('created_at', $today)->get(),
            'datas' => Transaksi::where('done', false)->get(),
        ]);
    }
}

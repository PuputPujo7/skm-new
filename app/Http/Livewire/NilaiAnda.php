<?php

namespace App\Http\Livewire;

use App\Models\HasilSurvey;
use App\Models\Pemohon;
use Livewire\Component;

class NilaiAnda extends Component
{
    // public $pemohons;
    public 
    $tiket,
    $nilai;

    public function mount($nomorTiket){
        $this->tiket = $nomorTiket;
        $this->nilai = Pemohon::whereNotNull('review')->latest()->first();
    }

    public function render()
    {
        $nilai = $this->nilai;
        // dd($pemohon);
        return view('livewire.nilai-anda', compact('nilai'));
    }

}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SoalLatihan extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public  $nomor;
    public  $gambarSoal;
    public  $gambarIterasi;
    public $jawabanBenar = [];

    // public $nomer;

    public function __construct(
        $nomor = 1,
        $gambarSoal,
        $gambarIterasi,
        $jawabanbenar
    ) {
        $this->nomor = $nomor;
        $this->gambarSoal = $gambarSoal;
        $this->gambarIterasi = $gambarIterasi;
        $this->jawabanBenar = $jawabanbenar;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.soal-latihan');
    }
}

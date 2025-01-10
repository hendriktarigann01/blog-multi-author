<?php

namespace App\Livewire\Text;

use Livewire\Component;
use App\Models\RunningTextModels;

class RunningText extends Component
{
    public $runningText;

    public function mount()
    {
        // Ambil data dari model saat komponen di-mount
        $this->runningText = RunningTextModels::all();
    }

    public function render()
    {
        return view('livewire.text.running-text');
    }
}

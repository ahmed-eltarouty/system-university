<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;

class StudentsDashboard extends Component
{
    public function render()
    {
        return view('livewire.students.students-dashboard')->layout('livewire.layouts.admin');
    }
}

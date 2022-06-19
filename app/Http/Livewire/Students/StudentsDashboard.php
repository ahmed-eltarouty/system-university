<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;

class StudentsDashboard extends Component
{
    public $user ='';

    public function render()
    {
        $this->user= auth()->user();
        if($this->user->status == 0 ){
            return view('livewire.components.noregister',['message'=>'عفواً حسابك موقوف يرجى مراجعه الإدارة'])->layout('livewire.layouts.block');
        }
        return view('livewire.students.students-dashboard')->layout('livewire.layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Supervisor;


use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStudents extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $count=10;


    public function render()
    {
        $user=Auth::guard('supervisor')->user();


        $searchSection = '%'. $this->search . '%';
        $students=$user->students()
            ->where('name','like',$searchSection)
            ->orderBy('id','desc')
            ->paginate($this->count);

        return view('livewire.supervisor.show-students',['students'=>$students])->layout('livewire.layouts.admin');
    }
}

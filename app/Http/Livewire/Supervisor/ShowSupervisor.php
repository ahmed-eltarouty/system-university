<?php

namespace App\Http\Livewire\Supervisor;

use App\Models\Supervisor;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSupervisor extends Component
{

    protected $paginationTheme = 'bootstrap';
    public $supervisor;
    public $search;
    public $count=10;

    public function render()
    {
        $searchSection = '%'. $this->search . '%';
        $supervisors = Supervisor::where('name','like',$searchSection)
            ->orWhere('email','like',$searchSection)
            ->orWhere('phone','like',$searchSection)
            ->paginate($this->count);
        return view('livewire.supervisor.show-supervisor',['supervisors'=>$supervisors])->layout('livewire.layouts.admin');
    }


    public function supervisorId($id){
        $this->supervisor = $id;
    }

    public function delete(){
        try{
            if (isset($this->supervisor)){
                Supervisor::find($this->supervisor)->delete();
            }

            return session()->flash('success','تم حذف المشرف بنجاح ');

        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }
}

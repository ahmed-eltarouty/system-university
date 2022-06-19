<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStudents extends Component
{
    public $deleteId='';
    public $search;
    public $count=10;

    protected $paginationTheme = 'bootstrap';

    use WithPagination;
    public function render()
    {
        $searchSection = '%'. $this->search . '%';
        $students=User::where('name','like',$searchSection)
            ->orWhere('email','like',$searchSection)
            ->orWhere('phone','like',$searchSection)
            ->orWhere('semester','like',$searchSection)
            ->orWhere('code','like',$searchSection)
            ->orderBy('id','desc')
            ->paginate($this->count);
        return view('livewire.admin.students.show-students',['students'=>$students])->layout('livewire.layouts.admin');
    }

    // ===================================== Delete ====================================================

    public function deleteId($id){
        $this->deleteId = $id;
    }

    public function delete(){
        try{
            if (isset($this->deleteId)){
                User::find($this->deleteId)->delete();
            }

            return session()->flash('success','تم حذف الطالب بنجاح ');

        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }
        // =========================================================================================
}

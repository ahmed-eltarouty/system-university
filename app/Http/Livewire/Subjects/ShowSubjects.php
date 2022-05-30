<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Subject;
use Livewire\Component;

class ShowSubjects extends Component
{

    protected $paginationTheme = 'bootstrap';

    public $search;
    public $deleteId='';
    public $count=10;

    use \Livewire\WithPagination;
    public function render()
    {
        $searchSection = '%'. $this->search . '%';
        $subjects = Subject::where('name','like',$searchSection)
            ->orWhere('code','like',$searchSection)
            ->paginate($this->count);
        return view('livewire.subjects.show-subjects',['subjects'=>$subjects])->layout('livewire.layouts.admin');
    }


    // ===================================== Delete ====================================================
    public function deleteId($id){
        $this->deleteId = $id;
    }

    public function delete(){
        try{
            if (isset($this->deleteId)){
                Subject::find($this->deleteId)->delete();
            }

            return session()->flash('success','تم حذف المادة بنجاح ');

        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }
}

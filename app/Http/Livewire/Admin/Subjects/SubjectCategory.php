<?php

namespace App\Http\Livewire\Admin\Subjects;

use App\Models\SubjectCategory as ModelsSubjectCategory;
use Livewire\Component;

class SubjectCategory extends Component
{

    protected $paginationTheme = 'bootstrap';

    public $search;
    public $deleteId='';
    public $count=10;

    use \Livewire\WithPagination;

    public function deleteId($id){
        $this->deleteId = $id;
    }

    public function delete(){
        try{
            if (isset($this->deleteId)){
                ModelsSubjectCategory::find($this->deleteId)->delete();
            }

            return session()->flash('success','تم حذف التخصص بنجاح ');

        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }

    public function render()
    {
        $searchSection = '%'. $this->search . '%';
        $categories = ModelsSubjectCategory::where('name','like',$searchSection)->paginate($this->count);
        return view('livewire.admin.subjects.subject-category',['categories'=> $categories])->layout('livewire.layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Admin\Subjects;

use App\Models\SubjectCategory;
use Livewire\Component;

class EditSubjectCategory extends Component
{

    public $catogory;
    public $name;
    public $code;
    public $total_hours;
    public $min_hours;
    public $max_hours;
    public $M_hours;
    public $E_hours;
    public $status;

    public function mount($id){
        try{
            $this->catogory=SubjectCategory::findOrFail($id);
            $this->name=$this->catogory->name;
            $this->code=$this->catogory->code;
            $this->total_hours=$this->catogory->total_hours;
            $this->min_hours=$this->catogory->min_hours;
            $this->max_hours=$this->catogory->max_hours;
            $this->M_hours=$this->catogory->M_hours;
            $this->E_hours=$this->catogory->E_hours;
            $this->status=$this->catogory->status;


        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }

    protected $rules=[
        'name'=>'required|unique:subject_categories,name,',
    ];

    protected $messages=[
        'name.required'=>'يجب ادخال اسم التخصص',
        'name.unique'=>'عفواً هذا التخصص موجود مسبقاً',
    ];

    public function updated($property){
        $this->validateOnly($property);
    }

    public function resetInput(){
        $this->name=null;
        $this->code=null;
        $this->total_hours=null;
        $this->min_hours=null;
        $this->max_hours=null;
        $this->M_hours=null;
        $this->E_hours=null;
        $this->status=1;
    }


    public function store(){
        try{
            SubjectCategory::where('id',$this->catogory->id)->update([
                'name'=>$this->name,
                'code'=>$this->code,
                'total_hours'=>$this->total_hours,
                'min_hours'=>$this->min_hours,
                'max_hours'=>$this->max_hours,
                'M_hours'=>$this->M_hours,
                'E_hours'=>$this->E_hours,
                'status'=>($this->status ? $this->status : 0),
            ]);
            session()->flash('success','تم تعديل التخصص بنجاح');

        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }

    public function render()
    {
        return view('livewire.admin.subjects.edit-subject-category')->layout('livewire.layouts.admin');
    }
}

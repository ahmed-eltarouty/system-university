<?php

namespace App\Http\Livewire\Admin\Subjects;

use App\Models\Subject;
use App\Models\SubjectCategory;
use Livewire\Component;

class EditSubject extends Component
{
    public $subject;
    public $name;
    public $code;
    public $hours;
    public $students_number;
    public $finished_subject1;
    public $finished_subject2;
    public $required_hours;
    public $category_id;
    public $subject_status=1;
    public $status=1;



    public function mount($id){
        try{
            $this->subject=Subject::findOrFail($id);
            $this->name=$this->subject->name;
            $this->code=$this->subject->code;
            $this->hours=$this->subject->study_hours;
            $this->students_number=$this->subject->total_students_can_register;
            $this->finished_subject1=$this->subject->finished_subject_id_1;
            $this->finished_subject2=$this->subject->finished_subject_id_2;
            $this->required_hours=$this->subject->required_hours;
            $this->category_id=$this->subject->category_id;
            $this->subject_status=$this->subject->subject_status;
            $this->status=$this->subject->status;


        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }

    protected $rules=[
        'name'=>'required',
        'hours'=>'numeric|nullable',

        'students_number'=>'numeric|nullable',

        'finished_subject1'=>'numeric|nullable',
        'finished_subject2'=>'numeric|nullable',
        'category_id'=>'numeric',
    ];

    protected $messages=[
        'name.required'=>'يجب ادخال اسم المادة',
        'hours.numeric'=>'عفوا يجب ادخال عدد الساعات',

        'students_number.numeric'=>' عفوا يجب ادخال عدد الطلاب المسموح لهم باختيار المادة',

        'finished_subject1.numeric'=>'عفواً لم يتم اختيار مادة صحيحة',
        'finished_subject2.numeric'=>'عفواً لم يتم اختيار مادة صحيحة',
    ];

    public function updated($property){

        $this->validateOnly($property);
    }

    public function store(){
        try{
            Subject::where('id',$this->subject->id)->update([
                'name'=>$this->name,
                'code'=>$this->code,
                'study_hours'=>$this->hours,

                'total_students_can_register'=>$this->students_number,

                'finished_subject_id_1'=>$this->finished_subject1 ? $this->finished_subject1 : null,
                'finished_subject_id_2'=>$this->finished_subject2 ? $this->finished_subject2 : null,
                'required_hours'=>$this->required_hours,
                'category_id'=>$this->category_id,
                'subject_status'=>$this->subject_status,
                'status'=>($this->status ? $this->status : 0),
            ]);
            session()->flash('success','تم تعديل المادة بنجاح');

        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }

    public function render()
    {
        $categories=SubjectCategory::all();
        $subjects = Subject::all();
        return view('livewire.admin.subjects.edit-subject',['subjects'=>$subjects,'categories'=>$categories])->layout('livewire.layouts.admin');
    }
}

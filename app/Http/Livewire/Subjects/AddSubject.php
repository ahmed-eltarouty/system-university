<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Subject;
use App\Models\SubjectCategory;
use Livewire\Component;

class AddSubject extends Component
{

    public $name;
    public $code;
    public $hours;
    public $max;
    public $min;
    public $students_number;
    public $GPA;
    public $finished_subject1;
    public $finished_subject2;
    public $required_hours;
    public $category_id;
    public $subject_status=1;
    public $status=1;

    protected $rules=[
        'name'=>'required',
        'hours'=>'numeric|nullable',
        'max'=>'numeric|nullable',
        'min'=>'numeric|nullable',
        'students_number'=>'numeric|nullable',
        'GPA'=>'numeric|nullable',
        'finished_subject1'=>'numeric|nullable',
        'finished_subject2'=>'numeric|nullable',
        'category_id'=>'numeric',
    ];


    protected $messages=[
        'name.required'=>'يجب ادخال اسم المادة',
        'hours.numeric'=>'عفوا يجب ادخال عدد الساعات',
        'max.numeric'=>'عفوا يجب ادخال عدد الدرجات الاقصى',
        'min.numeric'=>'عفوا يجب ادخال عدد الدرجات الأقل',
        'students_number.numeric'=>' عفوا يجب ادخال عدد الطلاب المسموح لهم باختيار المادة',
        'GPA.numeric'=>'عفوا يجب ادخال قيمه صحيحة للمعدل',
        'finished_subject1.numeric'=>'عفواً لم يتم اختيار مادة صحيحة',
        'finished_subject2.numeric'=>'عفواً لم يتم اختيار مادة صحيحة',
    ];

    public function updated($property){

        $this->validateOnly($property);
    }

    public function resetInput(){
        $this->name=null;
        $this->code=null;
        $this->hours=null;
        $this->max=null;
        $this->min=null;
        $this->students_number=null;
        $this->GPA=null;
        $this->finished_subject1=null;
        $this->finished_subject2=null;
        $this->required_hours=null;
        $this->category_id=null;
        $this->status=1;
    }

    public function store(){
        try{
            Subject::create([
                'name'=>$this->name,
                'code'=>$this->code,
                'study_hours'=>$this->hours,
                'max_degree'=>$this->max,
                'min_degree'=>$this->min,
                'total_students_can_register'=>$this->students_number,
                'GPA_Greater_Than'=>$this->GPA,
                'finished_subject_id_1'=>$this->finished_subject1,
                'finished_subject_id_2'=>$this->finished_subject2,
                'required_hours'=>$this->required_hours,
                'category_id'=>$this->category_id,
                'subject_status'=>$this->subject_status,
                'status'=>($this->status ? $this->status : 0),
            ]);
            session()->flash('success','تم اضافة المادة بنجاح');
            $this->resetInput();

        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }

    public function render()
    {
        $categories = SubjectCategory::all();
        $subjects = Subject::all();
        return view('livewire.subjects.add-subject',['subjects'=>$subjects,'categories'=>$categories])->layout('livewire.layouts.admin');
    }
}

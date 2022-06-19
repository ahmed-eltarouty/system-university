<?php

namespace App\Http\Livewire\Supervisor;

use App\Models\User;
use Livewire\Component;

class ShowStudentDetails extends Component
{

    public $student;
    public $name;
    public $code;
    public $phone;
    public $address;
    public $semester;
    public $year_enrolled;
    public $max_register_hours;
    public $min_register_hours;
    public $supervisor_id;
    public $status;
    public $GPA;
    public $CGPA;
    public $email;
    public $password;

    function mount($id){
        try{
            $this->student = User::find($id);
            $this->name=$this->student->name;
            $this->code=$this->student->code;
            $this->phone=$this->student->phone;
            $this->address=$this->student->address;
            $this->semester=$this->student->semester;
            $this->year_enrolled=$this->student->year_enrolled;
            $this->max_register_hours=$this->student->max_register_hours;
            $this->min_register_hours=$this->student->min_register_hours;
            $this->supervisor_id=$this->student->supervisor_id;
            $this->status=$this->student->status;
            $this->GPA=$this->student->GPA;
        }
        catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }

    public function render()
    {
        return view('livewire.supervisor.show-student-details',['semesters'=>$this->student->semesters])->layout('livewire.layouts.admin');
    }
}

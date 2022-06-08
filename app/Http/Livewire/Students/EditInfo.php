<?php

namespace App\Http\Livewire\Students;

use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditInfo extends Component
{
    public $student;
    public $name;
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


    public function mount(){

        try{
            $this->student = User::findOrFail(Auth::user()->id);
            $this->name=$this->student->name;
            $this->phone=$this->student->phone;
            $this->address=$this->student->address;
            $this->semester=$this->student->semester;
            $this->year_enrolled=$this->student->year_enrolled;
            $this->max_register_hours=$this->student->max_register_hours;
            $this->min_register_hours=$this->student->min_register_hours;
            $this->supervisor_id=$this->student->supervisor_id;
            $this->status=$this->student->status;
            $this->GPA=$this->student->GPA;
            $this->CGPA=$this->student->CGPA;
            $this->email=$this->student->email;
            $this->password=$this->student->password;

        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }
    protected $rules =[
        'email' =>'required|email|unique:users',
        'password' =>'required|min:8'
    ];

    protected $messages =[
        'name.required' => 'يجب ادخال اسم الطالب',
        'email.required' => 'عفوا يجب ادخال بريد الكترونى',
        'email.email' => 'عفوا البريد الالكترونى غير صحيح',
        'email.unique' => 'هذا البريد مسجل من قبل',
        'password.required' => 'من فضلك ادخل كلمه سر ',
        'password.min' => 'عفوا كلمه السر يجب ان تكون 8 ارقام واحرف'
    ];

    public function updated($property){

        $this->validateOnly($property);
    }


    public function store(){
        try{
            User::where('id',$this->student->id)
                ->update([
                'name'=>$this->name,
                'phone'=>$this->phone,
                'address'=>$this->address,
                'semester'=>$this->semester,
                'year_enrolled'=>$this->year_enrolled,
                'max_register_hours'=>$this->max_register_hours,
                'min_register_hours'=>$this->min_register_hours,
                'GPA'=>$this->GPA,
                'CGPA'=>$this->CGPA,
                'supervisor_id'=>$this->supervisor_id,
                'status'=>($this->status ? $this->status : 0),
                'email'=>$this->email,
                'password'=>($this->password == $this->student->password ? $this->student->password : Hash::make($this->password)),
            ]);


            session()->flash('success','تم تعديل الطالب بنجاح ');

        } catch (\Exception $e) {

            // return session()->flash('error',$e->getMessage());
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }

    }



    public function render()
    {
        $supervisors = Supervisor::get();
        return view('livewire.students.edit-info',['student'=>$this->student,'supervisors'=>$supervisors])->layout('livewire.layouts.admin');
    }
}

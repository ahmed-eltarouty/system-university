<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class AddStudents extends Component
{
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
            User::create([
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
                'password'=>Hash::make($this->password),
            ]);

            session()->flash('success','تم اضافة الطالب بنجاح ');

            $this->name='';
            $this->phone='';
            $this->address='';
            $this->semester='';
            $this->year_enrolled='';
            $this->max_register_hours='';
            $this->min_register_hours='';
            $this->supervisor_id='';
            $this->status='';
            $this->GPA='';
            $this->CGPA='';
            $this->email='';
            $this->password='';

        } catch (\Exception $e) {

            // return session()->flash('error',$e->getMessage());
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }

    }

    public function render()
    {
        // $supervisors = Supervisor::find(1)->students;
        $supervisors = Supervisor::get();
        return view('livewire.admin.students.add-students',["supervisors"=>$supervisors])->layout('livewire.layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class AddStudents extends Component
{
    public $name;
    public $code;
    public $phone;
    public $address;
    public $year_enrolled;

    public $supervisor_id;
    public $status;
    public $email;
    public $password;

    protected $rules =[
        'name' =>'required',
        'email' =>'required|email|unique:users',
        'code' =>'unique:users',
        'password' =>'required|min:8'
    ];

    protected $messages =[
        'name.required' => 'يجب ادخال اسم الطالب',
        'email.required' => 'عفوا يجب ادخال بريد الكترونى',
        'email.email' => 'عفوا البريد الالكترونى غير صحيح',
        'email.unique' => 'هذا البريد مسجل من قبل',
        'code.unique' => 'هذا الكود مسجل من قبل',
        'password.required' => 'من فضلك ادخل كلمه سر ',
        'password.min' => 'عفوا كلمه السر يجب ان تكون 8 ارقام واحرف'
    ];

    public function updated($property){

        $this->validateOnly($property);
    }


    public function store(){
        $this->validate();
        try{
            User::create([
                'name'=>$this->name,
                'code'=>$this->code,
                'phone'=>$this->phone,
                'address'=>$this->address,
                'year_enrolled'=>$this->year_enrolled,

                'supervisor_id'=>$this->supervisor_id,
                'status'=>($this->status ? $this->status : 0),
                'email'=>$this->email,
                'password'=>Hash::make($this->password),
            ]);

            session()->flash('success','تم اضافة الطالب بنجاح ');

            $this->name='';
            $this->code='';
            $this->phone='';
            $this->address='';
            $this->year_enrolled='';

            $this->supervisor_id='';
            $this->status='';
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

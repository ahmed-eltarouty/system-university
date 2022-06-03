<?php

namespace App\Http\Livewire\Admin\Supervisor;

use App\Models\Supervisor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddSupervisor extends Component
{

    public $name;
    public $phone;
    public $address;
    public $email;
    public $password;
    public $status;


    protected $rules =[
        'email' =>'required|email|unique:supervisors',
        'password' =>'required|min:8',
        'name' => 'required'
    ];


    protected $messages =[
        'name.required' => 'يجب ادخال اسم المشرف',
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
            Supervisor::create([
                'name'=>$this->name,
                'phone'=>$this->phone,
                'address'=>$this->address,
                'email'=>$this->email,
                'password'=>Hash::make($this->password),
                'status'=>($this->status ? $this->status : 0)
            ]);
            session()->flash('success','تم اضافة المشرف بنجاح');

            $this->name='';
            $this->phone='';
            $this->address='';
            $this->email='';
            $this->password='';
            $this->status='';

        }catch (\Exception $ex){
            session()->flash('error','حدث خطأ ما يرجى إعادة المحاوله ');

        }
    }

    public function render()
    {
        return view('livewire.admin.supervisor.add-supervisor')->layout('livewire.layouts.admin');
    }
}

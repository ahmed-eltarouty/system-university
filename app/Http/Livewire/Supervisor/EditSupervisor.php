<?php

namespace App\Http\Livewire\Supervisor;

use App\Models\Supervisor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditSupervisor extends Component
{
    public $supervisor;
    public $name;
    public $phone;
    public $address;
    public $email;
    public $password;
    public $status;

    public function mount($id){

        try{
            $this->supervisor = Supervisor::find($id);

            $this->name=$this->supervisor->name;
            $this->phone=$this->supervisor->phone;
            $this->address=$this->supervisor->address;
            $this->email=$this->supervisor->email;
            $this->password=$this->supervisor->password;
            $this->status=$this->supervisor->status;

        }catch(\Exception $e){
            return session()->flash('error',$e->getMessage());
        }
    }

    protected $rules =[
        'email' =>'required|email|unique:supervisors',
        'password' =>'required|min:8'
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
            Supervisor::where('id',$this->supervisor->id)->update([
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'email' => $this->email,
                'password' => ($this->password == $this->supervisor->password ? $this->supervisor->password : Hash::make($this->password)),
                'status' => ($this->status ? $this->status : 0),
            ]);

            session()->flash('success','تم تعديل المشرف بنجاح ');

        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }

    public function render()
    {
        return view('livewire.supervisor.edit-supervisor')->layout('livewire.layouts.admin');
    }
}

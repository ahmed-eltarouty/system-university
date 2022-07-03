<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\Semester;
use App\Models\Student_Subject;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditStudent extends Component
{
    public $student;
    public $name;
    public $code;
    public $phone;
    public $address;
    public $semester;
    public $year_enrolled;
    public $total_finished_hours;
    public $supervisor_id;
    public $status;
    public $GPA;
    public $CGPA;
    public $email;
    public $password;

    // this variables for the result points table
    public $editResultSemester;
    public $editResultSubject;
    public $editResultPoints;
    // end of variables for the result points table

    public $noti;
    public $noti_status = 1;

    public function mount($id){

        try{
            $this->student = User::find($id);
            $this->name=$this->student->name;
            $this->code=$this->student->code;
            $this->phone=$this->student->phone;
            $this->address=$this->student->address;
            $this->semester=$this->student->semester;
            $this->year_enrolled=$this->student->year_enrolled;
            $this->total_finished_hours=$this->student->total_finished_hours;
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
        'name' =>'required',
        'email' =>'required|email|unique:users',
        'code' =>'unique:users',
        'password' =>'required|min:8',
        'noti' =>'max:250|nullable',
    ];

    protected $messages =[
        'name.required' => 'يجب ادخال اسم الطالب',
        'email.required' => 'عفوا يجب ادخال بريد الكترونى',
        'email.email' => 'عفوا البريد الالكترونى غير صحيح',
        'email.unique' => 'هذا البريد مسجل من قبل',
        'code.unique' => 'هذا البريد مسجل من قبل',
        'password.required' => 'من فضلك ادخل كلمه سر ',
        'password.min' => 'عفوا كلمه السر يجب ان تكون 8 ارقام واحرف',
        'noti.max' => 'عفوا يجب ان لا يتعدى 250 حرف'
    ];

    public function updated($property){

        $this->validateOnly($property);
    }


    public function store(){
        try{
            User::where('id',$this->student->id)
                ->update([
                'name'=>$this->name,
                'code'=>$this->code,
                'phone'=>$this->phone,
                'address'=>$this->address,
                'semester'=>$this->semester,
                'year_enrolled'=>$this->year_enrolled,
                'total_finished_hours'=>$this->total_finished_hours,
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

    public function declareRuesultVariables($subID){
        // $this->editResultSemester = $sem;
        $this->editResultSubject = $subID;

    }

    public function updateResult($resu=0){
        try{
            $this->editResultPoints = $resu;
            Student_Subject::where('id',$this->editResultSubject['id'])->update([
                'subject_points'=>$resu,
                'total_subject_points'=>$resu * $this->editResultSubject['subject_hours']

            ]);
            $this->editResultPoints = null;
            $this->calcGPA();
            $this->calcCGPA();


        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }

    public function calcGPA(){
        $semesters = Semester::where('user_id',$this->student->id)->with('subjects')->get();
        // dd($semesters->toArray());
        foreach($semesters as $semester){
            $total_subject_points = 0;
            $total_subject_hours = $semester->semester_hours_registered;
            foreach($semester->subjects as $subject){
                $total_subject_points += $subject->total_subject_points;
            }

            $GPA = ($total_subject_hours != 0 && $total_subject_points != 0 ? $total_subject_points / $total_subject_hours : null );
            Semester::find($semester->id)->update([
                'GPA'=>round($GPA,2)
            ]);
        }
    }

    public function calcCGPA(){
        $semesters = Semester::where('user_id',$this->student->id)->with('subjects')->get();
        // dd($semesters->toArray());
        $total_subject_points = 0;
        $total_subject_hours = 0;
        foreach($semesters as $semester){
            if($semester->GPA != null && $semester->GPA != 0){
                $total_subject_hours += $semester->semester_hours_registered;
                foreach($semester->subjects as $subject){
                    $total_subject_points += $subject->total_subject_points;
                }
            }

        $CGPA = ($total_subject_hours != 0 && $total_subject_points != 0 ? $total_subject_points / $total_subject_hours : null );

            $this->student->update([
                'CGPA'=>round($CGPA,2)
            ]);
        }
        // dd([$total_subject_points,$total_subject_hours]);
    }

    public function sendNotification(){
        if($this->noti != null){
            $this->student->notifications()->create([
                'user_id'=>$this->student->id,
                'type'=>1,
                'status'=>$this->noti_status,
                'content'=>$this->noti
            ]);
            $this->noti = null;
            session()->flash('success','تم ارسال الاشعار بنجاح');
        }
    }

    public function render()
    {
        $supervisors = Supervisor::get();
        return view('livewire.admin.students.edit-student',['student'=>$this->student,'supervisors'=>$supervisors])->layout('livewire.layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Semester;
use App\Models\Student_Subject;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CurrentSemesterPoints extends Component
{

    public $semesters;
    public $show =[];
    public $subs=[];

    public $search;
    public $count = 10;

    public $result=[];



    public $inbutsubject=0;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->semesters = Semester::where('semester_status',1)->with('subjects')->get();
        $this->updatedinbutsubject();
        // dd($this->subs);
    }

    public function updatedinbutsubject(){
        // get all subjects of the active semesters put it in an array
        if($this->inbutsubject==0){
            $this->show=[];
            foreach($this->semesters as $semester){
                foreach($semester->subjects as $subject){
                    // dd($subject);
                    if(!in_array($subject->subject_id,$this->subs)){
                        $this->subs[]=$subject->subject_id;
                    }
                }
            }
        }
        else{
            $this->show=[];
            foreach($this->semesters as $semester){
                foreach($semester->subjects as $subject){
                    if ($subject->subject_id == $this->inbutsubject){
                        $this->show[$semester->user_id] = $subject->id;
                    }
                }
            }


        }
    }

    public function declareRuesultVariables($id,$stu){
        try{
            $current_sub =  Student_Subject::where('id',$id)->first();
            $current_sub->subject_points > 0 ?  $this->result[$stu]=null : $this->result[$stu];
            // dd($id,$stu,$current_sub->subject_points > 0 ?  $this->result[$stu]=null : $this->result[$stu]);
            $current_sub->update([
                'subject_points'=>isset($this->result[$stu]) ? $this->result[$stu] : null,
                'total_subject_points'=>isset($this->result[$stu]) ? $current_sub->subject_hours * $this->result[$stu] : null,
            ]);

        }catch(\Exception $e){
            session()->flash('error','حدث خطأ ما');
        }

    }

    public function render()
    {
        $searchSection = '%'. $this->search . '%';
        $students = User::whereIn('id',array_keys($this->show))->where('name','like',$searchSection)->paginate($this->count);

        return view('livewire.admin.current-semester-points',['students' => $students])->layout('livewire.layouts.admin');
    }
}

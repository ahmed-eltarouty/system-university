<?php

namespace App\Http\Livewire\Students;

use App\Models\Semester;
use App\Models\Settings;
use App\Models\Subject;
use App\Models\UserCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AddSemester extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $count=10;
    public $settingss;
    public $user;
    public $semester_id;
    public $current_semester;

    public $setting_hours;

    public $total_can_register;
    public $stop_register;

    public $selected_subjects = [];
    public $studied_subjects = [];

    public $current_subject;




    public function mount(){
        $this->settingss = Settings::first();
        $this->user = Auth::user();

        // check for the semester type and summer or normal
        $this->create_semster();

        // get the current semester subjects to show on the view
        $this->bindSelectedSubjects();


    }


    public function dehydrate(){

        $this->current_semester = Semester::find($this->semester_id);

        $this->user = Auth::user();
        // dd($this->current_semester);
        // get the time avalivable to register
        // $this->total_can_register =   ( $this->current_semester->semester_hours - $this->current_semester->semester_hours_registered > 0) ? $this->current_semester->semester_hours - $this->current_semester->semester_hours_registered : 0;

        // get the current semester subjects to show on the view
        $this->bindSelectedSubjects();

        $this->total_can_register =$this->current_semester->semester_hours - $this->current_semester->semester_hours_registered;
    }

    // create the semester or get the current semester hours
    public function getCurrentSemesterHours(){

        if($this->settingss->semester_register == 1 && $this->settingss->semester_type == 0){
            if($this->user->semester == null || $this->user->CGPA >= 2){
                // dd($this->user);
                $this->setting_hours = $this->settingss->max_hours_CGPA_greater_2;
            }
            elseif($this->user->CGPA < 2 && $this->user->CGPA >= 1){
                $this->setting_hours = $this->settingss->max_hours_CGPA_less_2_greater_1;
            }
            elseif($this->user->CGPA < 1){
                $this->setting_hours = $this->settingss->max_hours_CGPA_less_1;
            }
        }
        elseif($this->settingss->semester_register == 1 && $this->settingss->semester_type == 1){
            $this->setting_hours = $this->settingss->max_hours_summer;
        }
        elseif($this->settingss->semester_register == 0){
            $this->stop_register = 0;
        }
        $this->total_can_register = $this->setting_hours;

    }


    public function bindSelectedSubjects(){
        $this->studied_subjects = []; // reset the array
        // get the current semester subjects id to send it to the array to show on the view
            if($this->current_semester->subjects->count() >= 0){

            $this->selected_subjects = Semester::find($this->semester_id)->subjects()->select('subject_id')->get();

            // get all the subjects that student studied in any semester
            $semesters_subjects=$this->user->semesters()->with('subjects')->get()->toArray();
            foreach($semesters_subjects as $semester_subject){
                foreach($semester_subject['subjects'] as $subject){
                    $this->studied_subjects[]=$subject['subject_id'];
                }
            }
        }
    }

   // semester type 1:summer 0:normal   semester_status 1:active 0:inactive

    public function create_semster(){
        if ($this->user->semesters->count() == 0){
            $this->getCurrentSemesterHours(); // check for the semester type and summer or normal and get the max hours
            $this->current_semester = $this->user->semesters()->create([
                'semester_type' => $this->settingss->semester_type,
                'semester_hours' => $this->total_can_register,
                'semester_status' => 1,
            ]);
            $this->semester_id = $this->current_semester->id;
            $this->user->update([
                'semester' => 1,
            ]);
        }else{
            //get the active semester
            $data=$this->user->semesters()->where('semester_status', 1)->first()->created_at;
            $current_date = Carbon::now();
            //check days between current date and semester created date
            $diff = $current_date->diffInDays($data);
            if($diff > 60){
                // deactive the previous semester
                $this->user->semesters()->where('semester_status', 1)->update([
                'semester_status' => 0,
                ]);
                $this->getCurrentSemesterHours(); // check for the semester type and summer or normal and get the max hours
                // create new semester
                $this->current_semester = $this->user->semesters()->create([
                    'user_id' => $this->user->id,
                    'semester_type' => $this->settingss->semester_type,
                    'semester_hours' => $this->total_can_register,
                    'semester_status' => 1,
                ]);
                $this->semester_id = $this->current_semester->id;
                $this->user->update([
                    'semester' => $this->user->semester + 1,
                    'total_finished_hours' => $this->user->total_registered_hours,
                ]);
            }else{
                $this->current_semester = $this->user->semesters()->where('semester_status', 1)->first();
                $this->semester_id =$this->current_semester->id;
                // $this->semester_id = $this->user->semesters()->where('semester_status', 1)->first()->id;
                $this->total_can_register = $this->current_semester->semester_hours - $this->current_semester->semester_hours_registered;
            }
        }
    }

    //desperated from the add_to_list function  to clear the code
    public function add_after_check($sub){

        if(($this->total_can_register - $this->current_subject->study_hours) >= 0){ //check available hours
            $subject=Subject::find($sub);
            $subject_category =  $subject->category->toArray(); // get the subject local variable
            // dd($subject_category['M_hours']);

            if($this->user->category->contains('id',$subject_category['id'])){ // check if the subject category added to the user category before or not
                $the_category = UserCategory::where('user_id', $this->user->id)->where('category_id', $subject_category['id'])->first(); // get the category of the same subject category to update it
                // dd($the_category->M_hours + $subject->study_hours <= $subject_category['M_hours']);

                if($subject->subject_status == 1 && $the_category->M_hours + $subject->study_hours <= $subject_category['M_hours']){
                    // dd($subject_category['M_hours']);
                    $the_category->update([
                        'M_hours' => $the_category->M_hours + $subject->study_hours,
                    ]);
                }
                elseif($subject->subject_status == 0 && $the_category->E_hours + $subject->study_hours <= $subject_category['E_hours']){
                    $the_category->update([
                        'E_hours' => $the_category->E_hours + $subject->study_hours,
                    ]);
                }
                else{

                    return session()->flash('error','لقد تخطيت الحد الاقصى للساعات المسموح لك في هذه الفئة');
                }

            }else{
                if($subject->subject_status == 1 ){
                    UserCategory::create([
                        'user_id' => $this->user->id,
                        'category_id' => $subject_category['id'],
                        'M_hours' => $subject->study_hours,

                    ]);
                }
                else{
                    UserCategory::create([
                        'user_id' => $this->user->id,
                        'category_id' => $subject_category['id'],
                        'E_hours' => $subject->study_hours,

                    ]);
                }
            }


            Semester::find($this->semester_id)->subjects()->create([  // add the subject to the semester
                'semester_id'=>$this->semester_id,
                'subject_id' => $sub,
                'subject_hours' => $this->current_subject->study_hours,
            ]);
            $this->selected_subjects = $this->current_semester_subjects; // update the selected subjects
            $this->user->update([   // update the user registered  hours
                'total_registered_hours' => $this->user->total_registered_hours + $this->current_subject->study_hours,
            ]);
            // $this->total_can_register =$current_avaliable_hours - $this->current_subject->study_hours; // update the total hours in state
            $this->current_semester->update([ //update semester hours on db
                'semester_hours_registered' =>  $this->current_semester->semester_hours_registered + $this->current_subject->study_hours,
            ]);
            (session()->flash('success','تم اختيار المادة بنجاح '));
        }else{
            // $this->selected_subjects = $this->current_semester_subjects;
            (session()->flash('error','الساعات المتبقية لا تكفى لاضافة هذه المادة '));
        }
    }

    //  add subject to database and retrive from db with livewire click
    public function add_to_list($sub){
        $current_date = Carbon::now();
        //check days between current date and semester created date
        $diff = $current_date->diffInDays($this->current_semester->created_at);
        // check the time of editing the semester
        if($diff >= $this->settingss->period_of_editing_registered_semester){
            $this->bindSelectedSubjects();
            return (session()->flash('error','عفواً لقد انتهت مهلة التعديل يرجى التوجه لشئون الطلبة لتعديل المواد المسجلة '));
        }


        $this->current_subject = Subject::find($sub);
        // $this->current_semester = Semester::find($this->semester_id);
        $this->current_semester_subjects = $this->current_semester->subjects()->select('subject_id')->get();



        // if exist on the current term
        if($this->current_semester->subjects()->where('subject_id', $sub)->exists()){
            // $this->selected_subjects = $this->current_semester_subjects;
            (session()->flash('error','لقد تم اختيار هذه المادة من قبل '));

        }
        // if exist on any previous term
        elseif(in_array($sub, $this->studied_subjects)){
            // $this->selected_subjects = $this->current_semester_subjects;
            (session()->flash('error','لقد قمت بدراسة هذه المادة من قبل '));
        }
        ////////////////////////////////////////// Start Requirements check //////////////////////////////////////////////////////////////
                        // check Gpa and subject1 + subject2 + GPA + Hours are required not null before add it to the list
        elseif($this->current_subject->finished_subject_id_1 != null && $this->current_subject->finished_subject_id_2 != null && $this->current_subject->GPA_Greater_Than != null && $this->current_subject->required_hours != null){
            // check if the student finished the first subject
            if($this->user->GPA >= $this->current_subject->GPA_Greater_Than && in_array($this->current_subject->finished_subject_id_1, $this->studied_subjects) && (in_array($this->current_subject->finished_subject_id_2, $this->studied_subjects)) && $this->user->total_finished_hours >= $this->current_subject->required_hours){
                $this->add_after_check($sub); // add the subject to the list
            }
            else{
                (session()->flash('error',  'عفوا لم تقم بانهاء متطلبات المادة يجب عليك انهاء متطلبات المادة اولاً  '));
            }
        }
             // check the requrements of the subject are not null before add it to the list
        elseif($this->current_subject->finished_subject_id_1 != null && $this->current_subject->finished_subject_id_2 != null && $this->current_subject->required_hours != null){
            // check if the student finished the first subject
            if(in_array($this->current_subject->finished_subject_id_1, $this->studied_subjects) && (in_array($this->current_subject->finished_subject_id_2, $this->studied_subjects)) && ($this->user->total_finished_hours >= $this->current_subject->required_hours)){
                $this->add_after_check($sub); // add the subject to the list

            }
            else{
                (session()->flash('error',  'عفوا لم تقم بانهاء متطلبات المادة يجب عليك انهاء متطلبات المادة اولاً  '));
            }
        }
                        // check Gpa and subject1 + subject2 are required not null before add it to the list
        elseif($this->current_subject->finished_subject_id_1 != null && $this->current_subject->finished_subject_id_2 != null && $this->current_subject->GPA_Greater_Than != null){
            // check if the student finished the first subject
            if($this->user->GPA >= $this->current_subject->GPA_Greater_Than && in_array($this->current_subject->finished_subject_id_1, $this->studied_subjects) && (in_array($this->current_subject->finished_subject_id_2, $this->studied_subjects))){
                $this->add_after_check($sub); // add the subject to the list
            }
            else{
                (session()->flash('error',  'عفوا لم تقم بانهاء متطلبات المادة يجب عليك انهاء متطلبات المادة اولاً  '));
            }
        }
                    // check the requrements of the subject GPA + hours required before add it to the list
        elseif(($this->current_subject->finished_subject_id_1 != null || $this->current_subject->finished_subject_id_2 != null) &&  $this->current_subject->required_hours != null && $this->current_subject->GPA_Greater_Than != null){
            // check if the student finished the first subject
            if((in_array($this->current_subject->finished_subject_id_1, $this->studied_subjects) || (in_array($this->current_subject->finished_subject_id_2, $this->studied_subjects)))  &&  $this->user->total_finished_hours >= $this->current_subject->required_hours && $this->user->GPA >= $this->current_subject->GPA_Greater_Than){
                $this->add_after_check($sub); // add the subject to the list
            }
            else{
                (session()->flash('error',  'عفوا لم تقم بانهاء متطلبات المادة يجب عليك انهاء متطلبات المادة اولاً  '));
            }
        }
            // check the requrements of the subject one is null before add it to the list
        elseif(($this->current_subject->finished_subject_id_1 != null || $this->current_subject->finished_subject_id_2 != null) && $this->current_subject->required_hours != null){
            // check if the student finished the first subject
            if((in_array($this->current_subject->finished_subject_id_1, $this->studied_subjects) || (in_array($this->current_subject->finished_subject_id_2, $this->studied_subjects)))  && ($this->user->total_finished_hours >= $this->current_subject->required_hours) ){
                $this->add_after_check($sub); // add the subject to the list
            }
            else{
                (session()->flash('error',  'عفوا لم تقم بانهاء متطلبات المادة يجب عليك انهاء متطلبات المادة اولاً  '));
            }
        }
                    // check the requrements of the subject one is null and gpa required before add it to the list
        elseif(($this->current_subject->finished_subject_id_1 != null || $this->current_subject->finished_subject_id_2 != null) && $this->current_subject->GPA_Greater_Than != null){
            // check if the student finished the first subject
            if((in_array($this->current_subject->finished_subject_id_1, $this->studied_subjects) || (in_array($this->current_subject->finished_subject_id_2, $this->studied_subjects)))  && ($this->user->GPA >= $this->current_subject->GPA_Greater_Than) ){
                $this->add_after_check($sub); // add the subject to the list
            }
            else{
                (session()->flash('error',  'عفوا لم تقم بانهاء متطلبات المادة يجب عليك انهاء متطلبات المادة اولاً  '));
            }
        }
                // check Hours or subject1 + subject2 are required not null before add it to the list
        elseif($this->current_subject->required_hours != null && $this->current_subject->GPA_Greater_Than != null){
            // check if the student finished the first subject
            if($this->user->total_finished_hours >= $this->current_subject->required_hours && $this->user->GPA >= $this->current_subject->GPA_Greater_Than){
                $this->add_after_check($sub); // add the subject to the list
            }
            else{
                (session()->flash('error',  'عفوا لم تقم بانهاء متطلبات المادة يجب عليك انهاء متطلبات المادة اولاً  '));
            }
        }
                // check Hours and subject1 + subject2 are required not null before add it to the list
        elseif($this->current_subject->finished_subject_id_1 != null && $this->current_subject->finished_subject_id_2 != null){
            // check if the student finished the first subject
            if($this->user->total_finished_hours >= $this->current_subject->required_hours && in_array($this->current_subject->finished_subject_id_1, $this->studied_subjects)){
                $this->add_after_check($sub); // add the subject to the list
            }
            else{
                (session()->flash('error',  'عفوا لم تقم بانهاء متطلبات المادة يجب عليك انهاء متطلبات المادة اولاً  '));
            }
        }
        // check Hours or subject1 + subject2 are required not null before add it to the list
        elseif(($this->current_subject->finished_subject_id_1 != null || $this->current_subject->finished_subject_id_2 != null)){
            // check if the student finished the first subject
            if(($this->user->total_finished_hours >= $this->current_subject->required_hours || in_array($this->current_subject->finished_subject_id_1, $this->studied_subjects))){
                $this->add_after_check($sub); // add the subject to the list
            }
            else{
                (session()->flash('error',  'عفوا لم تقم بانهاء متطلبات المادة يجب عليك انهاء متطلبات المادة اولاً  '));
            }
        }
        // check the required hours not null before add it to the list
        elseif($this->current_subject->required_hours != null){
            // check if the student finished the first subject
            if($this->user->total_finished_hours >= $this->current_subject->required_hours){
                $this->add_after_check($sub); // add the subject to the list
            }
            else{
                (session()->flash('error',  'عفوا لم تقم بانهاء متطلبات المادة يجب عليك انهاء متطلبات المادة اولاً  '));
            }
        }
        // check Gpa not null before add it to the list
        elseif($this->current_subject->GPA_Greater_Than != null){
            // check if the student finished the first subject
            if($this->user->GPA >= $this->current_subject->GPA_Greater_Than){
                $this->add_after_check($sub); // add the subject to the list
            }
            else{
                (session()->flash('error',  'عفوا لم تقم بانهاء متطلبات المادة يجب عليك انهاء متطلبات المادة اولاً  '));
            }
        }

                ////////////////////////////////////////// End Requirements check //////////////////////////////////////////////////////////////
        else{      // add the subject to the list
            $this->add_after_check($sub);

        }
        $this->bindSelectedSubjects();
    }



    public function removeSubject($id){
        $current_date = Carbon::now();
        //check days between current date and semester created date
        $diff = $current_date->diffInDays($this->current_semester->created_at);
        if($diff >= $this->settingss->period_of_editing_registered_semester){
            $this->bindSelectedSubjects();
            return (session()->flash('error','عفواً لقد انتهت مهلة التعديل يرجى التوجه لشئون الطلبة لتعديل المواد المسجلة '));
        }

        $selected_subject = $this->current_semester->subjects()->where('subject_id', $id)->first();
        $subject=Subject::find($id);
        $subject_category =  $subject->category->toArray(); // get the subject local variable

        $the_category = UserCategory::where('user_id', $this->user->id)->where('category_id', $subject_category['id'])->first(); // get the category of the same subject category to update it
        // dd($the_category->M_hours + $subject->study_hours <= $subject_category['M_hours']);
        if($subject->subject_status == 1 ){
            $the_category->update([
                'M_hours' => $the_category->M_hours - $subject->study_hours,
            ]);
        }
        elseif($subject->subject_status == 0 ){
            $the_category->update([
                'E_hours' => $the_category->E_hours - $subject->study_hours,
            ]);
        }
        else{
            return session()->flash('error','حدث خطأ ما يرجى التحقق من المواد المختارة');
        }

        $this->user->update([
            'total_registered_hours' => $this->user->total_registered_hours - $selected_subject->subject_hours,
        ]);
        $this->current_semester->update([ //update semester hours on db
            'semester_hours_registered' =>  $this->current_semester->semester_hours_registered - $selected_subject->subject_hours,
        ]);
        $selected_subject->delete();

        $this->bindSelectedSubjects(); // update the selected subjects

        // update the hours avalable
        $this->total_can_register =$this->current_semester->semester_hours - $this->current_semester->semester_hours_registered;

    }


    public function render()
    {
        if($this->stop_register === 0){
            return view('livewire.components.noregister')->layout('livewire.layouts.admin');
        }
        $searchSection = '%'. $this->search . '%';
        $subjects = Subject::where('name','like',$searchSection)
            ->orWhere('code','like',$searchSection)
            ->paginate($this->count);

        return view('livewire.students.add-semester',['subjects'=>$subjects,'selected_subjects'=>$this->selected_subjects])->layout('livewire.layouts.admin');
    }
}

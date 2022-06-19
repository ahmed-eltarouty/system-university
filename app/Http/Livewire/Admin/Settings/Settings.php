<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Settings as ModelsSettings;
use Livewire\Component;

class Settings extends Component
{

    public $semester_register;
    public $semester_type;
    public $graduate_hours;
    public $min_hours;
    public $max_hours_CGPA_greater_2;
    public $max_hours_CGPA_less_2_greater_1;
    public $max_hours_CGPA_less_1;
    public $emergency_graduate_hours;
    public $max_hours_summer;
    public $min_hours_summer;
    public $period_of_editing_registered_semester;


    public function mount(){

        try{
            $settings=ModelsSettings::first();
            $this->semester_register=$settings->semester_register;
            $this->semester_type=$settings->semester_type;
            $this->graduate_hours=$settings->graduate_hours;
            $this->min_hours=$settings->min_hours;
            $this->max_hours_CGPA_greater_2=$settings->max_hours_CGPA_greater_2;
            $this->max_hours_CGPA_less_2_greater_1=$settings->max_hours_CGPA_less_2_greater_1;
            $this->max_hours_CGPA_less_1=$settings->max_hours_CGPA_less_1;
            $this->emergency_graduate_hours=$settings->emergency_graduate_hours;
            $this->max_hours_summer=$settings->max_hours_summer;
            $this->min_hours_summer=$settings->min_hours_summer;
            $this->period_of_editing_registered_semester=$settings->period_of_editing_registered_semester;

        }catch(\Exception $e){
            return session()->flash('error','حدث خطأ ما او لا توجد بيانات مسجلة');
        }
    }

    protected $rules=[
        'graduate_hours'=>'nullable|numeric',
        'min_hours'=>'nullable|numeric',
        'max_hours_CGPA_greater_2'=>'nullable|numeric',
        'max_hours_CGPA_less_2_greater_1'=>'nullable|numeric',
        'max_hours_CGPA_less_1'=>'nullable|numeric',
        'emergency_graduate_hours'=>'nullable|numeric',
        'max_hours_summer'=>'nullable|numeric',
        'min_hours_summer'=>'nullable|numeric',
        'period_of_editing_registered_semester'=>'nullable|numeric',
    ];

    public function updated($field){
        $this->validateOnly($field);
    }

    public function store(){
        try{
            ModelsSettings::updateOrCreate(
                ['id'=>1],
                [
                    'semester_register'=>$this->semester_register,
                    'semester_type'=>($this->semester_type ? $this->semester_type : 0),
                    'graduate_hours'=>$this->graduate_hours,
                    'min_hours'=>$this->min_hours,
                    'max_hours_CGPA_greater_2'=>$this->max_hours_CGPA_greater_2,
                    'max_hours_CGPA_less_2_greater_1'=>$this->max_hours_CGPA_less_2_greater_1,
                    'max_hours_CGPA_less_1'=>$this->max_hours_CGPA_less_1,
                    'emergency_graduate_hours'=>$this->emergency_graduate_hours,
                    'max_hours_summer'=>$this->max_hours_summer,
                    'min_hours_summer'=>$this->min_hours_summer,
                    'period_of_editing_registered_semester'=>$this->period_of_editing_registered_semester,
                ]
            );

            session()->flash('success', 'تم حفظ الإعدادات بنجاح');

        }catch(\Exception $e){
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }

    public function render()
    {
        return view('livewire.admin.settings.settings')->layout('livewire.layouts.admin');
    }
}

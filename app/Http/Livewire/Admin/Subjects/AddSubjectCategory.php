<?php

namespace App\Http\Livewire\Admin\Subjects;

use App\Models\SubjectCategory;
use Livewire\Component;

class AddSubjectCategory extends Component
{
    public $name;
    public $code;
    public $total_hours;
    public $M_hours;
    public $E_hours;
    public $specialization=1;
    public $status=1;

    protected $rules=[
        'name'=>'required|string|max:191|unique:subject_categories',
        'code'=>'nullable|string|max:191',
        'total_hours'=>'nullable|numeric',
        'M_hours'=>'nullable|numeric',
        'E_hours'=>'nullable|numeric',
        'specialization'=>'nullable|numeric',
        'status'=>'nullable|numeric',
    ];

    protected $messages = [
        'name.required' => 'يجب ادخال اسم التخصص',
        'name.unique' => 'اسم التخصص موجود مسبقاً',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
        $this->total_hours = $this->M_hours + $this->E_hours;
    }

    public function resetInput()
    {
        $this->name = null;
        $this->code = null;
        $this->total_hours = null;
        $this->M_hours = null;
        $this->E_hours = null;
        $this->specialization = 1;
        $this->status = 1;
    }

    public function store()
    {
        try {
            SubjectCategory::create([
                'name' => $this->name,
                'code' => $this->code,
                'M_hours' => $this->M_hours,
                'E_hours' => $this->E_hours,
                'total_hours' => $this->M_hours + $this->E_hours ,
                'specialization' => ($this->specialization ? $this->specialization : 0),
                'status' => ($this->status ? $this->status : 0),
            ]);
            session()->flash('success', 'تم اضافة التخصص بنجاح');
            $this->resetInput();
        } catch (\Exception $ex) {
            return session()->flash('error','عفواً حدث خطأ ما يرجى المحاولة مرة اخرى');
        }
    }

    public function render()
    {
        return view('livewire.admin.subjects.add-subject-category')->layout('livewire.layouts.admin');
    }
}

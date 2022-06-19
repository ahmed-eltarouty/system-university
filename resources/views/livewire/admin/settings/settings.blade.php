<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.settings')}}"> الإعدادات </a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> الإعدادات </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('livewire.components.alerts.success')
                            @include('livewire.components.alerts.errors')
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" wire:submit.prevent='store' enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="las la-user-graduate"></i> ضبط الإعدادات </h4>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1" wire:ignore>
                                                            <input type="checkbox"  value="1" name="semester_register"
                                                                   id="semester_register" wire:model="semester_register"
                                                                   class="" data-color="success" style="height: 2em; width: 2em;"
                                                                   checked/>
                                                            <label for="semester_register"
                                                                   class="card-title ml-1">إتاحة التسجيل </label>

                                                            @error('status')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="semester_type"> نوع الترم الحالى </label>
                                                            <select name="semester_type" wire:model="semester_type" class="form-control">
                                                                <optgroup label="اختر نوع الترم">
                                                                    <option value="0">عادى</option>
                                                                    <option value="1">صيفى</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('semester_type')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="graduate_hours"> عدد الساعات الكلى للتخرج </label>
                                                            <input type="number" value="" id="graduate_hours"
                                                                class="form-control"
                                                                placeholder="عدد الساعات الكلى للحصول على البكالريوس "
                                                                name="graduate_hours" wire:model='graduate_hours'>
                                                            @error('graduate_hours')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الحد الأدنى لساعات التسجيل للترم</label>
                                                            <input type="number" value="" id="min_hours"
                                                                class="form-control"
                                                                placeholder=" الحد الأدنى لساعات التسجيل للترم"
                                                                name="min_hours" wire:model='min_hours'>
                                                            @error('min_hours')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عدد ساعات المتاحة للCGPA أكبر من 2 </label>
                                                            <input type="number" value="" id="max_hours_CGPA_greater_2"
                                                                class="form-control"
                                                                placeholder="عدد ساعات المتاحة للCGPA أكبر من 2 "
                                                                name="max_hours_CGPA_greater_2" wire:model='max_hours_CGPA_greater_2'>
                                                            @error('max_hours_CGPA_greater_2')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عدد الساعات المتاحة للCGPA أكبر من 1 وأقل من 2</label>
                                                            <input type="number" value="" id="max_hours_CGPA_less_2_greater_1"
                                                                class="form-control"
                                                                placeholder="عدد الساعات المتاحة للCGPA أكبر من 1 وأقل من 2"
                                                                name="max_hours_CGPA_less_2_greater_1" wire:model='max_hours_CGPA_less_2_greater_1'>
                                                            @error('max_hours_CGPA_less_2_greater_1')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عدد الساعات المتاحة للCGPA أقل من1</label>
                                                            <input type="number" value="" id="max_hours_CGPA_less_1"
                                                                class="form-control"
                                                                placeholder="عدد الساعات المتاحة للCGPA أقل من1"
                                                                name="max_hours_CGPA_less_1" wire:model='max_hours_CGPA_less_1'>
                                                            @error('max_hours_CGPA_less_1')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عدد الساعات الاضافية لدواعى التخرج</label>
                                                            <input type="number" value="" id="emergency_graduate_hours"
                                                                class="form-control"
                                                                placeholder="عدد الساعات الاضافية لدواعى التخرج"
                                                                name="emergency_graduate_hours" wire:model='emergency_graduate_hours'>
                                                            @error('emergency_graduate_hours')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عدد ساعات الأقصى للترم الصيفى</label>
                                                            <input type="number" value="" id="max_hours_summer"
                                                                class="form-control"
                                                                placeholder=" عدد ساعات الترم الصيفى "
                                                                name="max_hours_summer" wire:model='max_hours_summer'>
                                                            @error('max_hours_summer')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عدد ساعات الأأقل للترم الصيفى</label>
                                                            <input type="number" value="" id="min_hours_summer"
                                                                class="form-control"
                                                                placeholder=" عدد ساعات الترم الصيفى "
                                                                name="min_hours_summer" wire:model='min_hours_summer'>
                                                            @error('min_hours_summer')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">فترة السماح لتعديل ما بعدالتسجيل </label>
                                                            <input type="number" value="" id="period_of_editing_registered_semester"
                                                                class="form-control"
                                                                placeholder="فترة السماح لتعديل ما بعدالتسجيل بالايام"
                                                                name="period_of_editing_registered_semester" wire:model='period_of_editing_registered_semester'>
                                                            @error('period_of_editing_registered_semester')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>

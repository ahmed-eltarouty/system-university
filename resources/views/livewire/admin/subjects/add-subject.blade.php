<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.add-student')}}"> أضافة مادة </a>
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
                                <h4 class="card-title" id="basic-layout-form"> إضافة مادة </h4>
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
                                            <h4 class="form-section"><i class="las la-user-graduate"></i> بيانات  مادة </h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم مادة </label>
                                                        <input type="text" value="" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل اسم المادة  "
                                                               name="name" wire:model='name'>
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> كود المادة </label>
                                                        <input type="text" value="" id="code"
                                                               class="form-control"
                                                               placeholder="ادخل كود المادة  "
                                                               name="code" wire:model='code'>
                                                        @error('code')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> عدد ساعات المادة </label>
                                                        <input type="number" step=0.01 value="" id="hours"
                                                               class="form-control"
                                                               placeholder="عدد ساعات الدراسية للمادة  "
                                                               name="hours" wire:model='hours'>
                                                        @error('hours')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> الدرجة العظمى </label>
                                                        <input type="number" step=0.01 value="" id="max"
                                                               class="form-control"
                                                               placeholder="الدرجة العظمى  "
                                                               name="max" wire:model='max'>
                                                        @error('max')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> الدرجة الصغرى </label>
                                                        <input type="number" step=0.01 value="" id="min"
                                                               class="form-control"
                                                               placeholder="الدرجة الصغرى  "
                                                               name="min" wire:model='min'>
                                                        @error('min')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> عدد الطلاب </label>
                                                        <input type="number" value="" id="students_number"
                                                               class="form-control"
                                                               placeholder="عدد الطلاب المسموح به للتسجيل فى المادة  "
                                                               name="students_number" wire:model='students_number'>
                                                        @error('students_number')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> GPA </label>
                                                        <input type="number" step=0.01 value="" id="GPA"
                                                               class="form-control"
                                                               placeholder="فى حالة تطلب المادة GPA معين "
                                                               name="GPA" wire:model='GPA'>
                                                        @error('GPA')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> ادخل اسم المادةالاولى المشروطه انتهائها قبل اختيار هذه المادة </label>
                                                        <select name="finished_subject1" wire:model="finished_subject1" class="form-control">
                                                            <optgroup label="من فضلك أختر المادة ">
                                                                <option value="">لا يوجد</option>
                                                                @foreach ($subjects as $subject)
                                                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                        @error('finished_subject1')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> ادخل اسم المادة الثانية المشروطه انتهائها قبل اختيار هذه المادة </label>
                                                        <select name="finished_subject2" wire:model="finished_subject2" class="form-control">
                                                            <optgroup label="من فضلك أختر المادة ">
                                                                <option value="">لا يوجد</option>
                                                                @foreach ($subjects as $subject)
                                                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                        @error('finished_subject2')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> عدد الساعات الدراسية المطلوبه </label>
                                                        <input type="number" step=0.01 value="" id="required_hours"
                                                               class="form-control"
                                                               placeholder=" عدد الساعات الدراسية المطلوبه للتسجيل بالمادة  "
                                                               name="required_hours" wire:model='required_hours'>
                                                        @error('required_hours')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group" wire:ignore>
                                                        <label for="projectinput1"> تخصص المادة </label>
                                                        <select name="category_id" wire:model="category_id" class="form-control">
                                                            <optgroup label="من فضلك أختر المادة ">
                                                                <option value="">لا يوجد</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group" wire:ignore>
                                                        <label for="subject_status"> نوع المادة </label>
                                                        <select name="subject_status" wire:model="subject_status" id="subject_status" class="form-control">
                                                            <optgroup label="من فضلك أختر المادة ">
                                                                <option value="1">اجبارى</option>
                                                                <option value="0">اختيارى</option>
                                                            </optgroup>
                                                        </select>
                                                        @error('subject_status')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox"  value="1" name="status"
                                                               id="switcheryColor4" wire:model="status"
                                                               class="" data-color="success" style="height: 2em; width: 2em;"
                                                               checked/>
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">الحالة </label>

                                                        @error('status')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
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

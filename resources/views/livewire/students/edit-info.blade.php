<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">الرئيسية </a></li>
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
                                <h4 class="card-title" id="basic-layout-form"> تعديل البيانات </h4>
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
                                    <form class="form"  wire:submit.prevent='store' enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="las la-user-graduate"></i> بيانات  الطالب </h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم الطالب </label>
                                                        <h3>{{$student->name}}</h3>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> كود الطالب </label>
                                                        <h3>{{$student->code}}</h3>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> سنة الإنضمام </label>
                                                        <h3>{{$student->year_enrolled}}</h3>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> العنوان </label>
                                                        <input type="text"  id="address"
                                                               class="form-control" value="{{$student->address}}"
                                                               placeholder="العنوان  "
                                                               name="address" wire:model='address'>
                                                        @error('address')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم الترم الدراسى </label>
                                                        <h3>{{$student->semester}}</h3>
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> رقم الهاتف </label>
                                                        <input type="text"  id="phone"
                                                               class="form-control" value="{{$student->phone}}"
                                                               placeholder="ادخل رقم الهاتف  "
                                                               name="phone" wire:model='phone'>
                                                        @error('phone')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> عدد الساعات الأقصى </label>
                                                        <h3>{{$student->max_register_hours}}</h3>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> عدد الساعات الأقل </label>
                                                        <h3>{{$student->min_register_hours}}</h3>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> GPA </label>
                                                        <h3>{{$student->GPA}}</h3>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> الإيميل </label>
                                                        <input type="email"  id="email"
                                                               class="form-control" value="{{$student->email}}"
                                                               placeholder="العنوان البريدى  "
                                                               name="email" wire:model='email'>
                                                        @error('email')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> CGPA </label>
                                                        <h3>{{$student->CGPA}}</h3>
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> كلمة السر </label>
                                                        <input type="password" value="" id="password"
                                                               class="form-control"
                                                               placeholder="اتركها فارغة اذا لا تريد تحديثها "
                                                               name="password" wire:model='password'>
                                                        @error('password')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2"> المشرف </label>
                                                        @if($student->supervisor_id)
                                                            <h3>{{$student->supervisor->name}}</h3>
                                                        @else
                                                            <span class="badge badge-danger">لم يتم تحديد المشرف</span>
                                                        @endif
                                                        {{-- <h3>{{\App\Models\Supervisor::find($supervisor_id)->first()->name}}</h3> --}}
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

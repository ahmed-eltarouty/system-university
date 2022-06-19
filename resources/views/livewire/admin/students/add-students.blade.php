    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.add-student')}}"> أضافة طالب </a>
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
                                    <h4 class="card-title" id="basic-layout-form"> إضافة طالب </h4>
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
                                                <h4 class="form-section"><i class="las la-user-graduate"></i> بيانات  الطالب </h4>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم الطالب </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="ادخل اسم الطالب  "
                                                                   name="name" wire:model='name'>
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> كود الطالب </label>
                                                            <input type="text" value="" id="code"
                                                                   class="form-control"
                                                                   placeholder="ادخل كود الطالب  "
                                                                   name="code" wire:model='code'>
                                                            @error('code')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> رقم الهاتف </label>
                                                            <input type="text" value="" id="phone"
                                                                   class="form-control"
                                                                   placeholder="ادخل رقم الهاتف  "
                                                                   name="phone" wire:model='phone'>
                                                            @error('phone')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> العنوان </label>
                                                            <input type="text" value="" id="address"
                                                                   class="form-control"
                                                                   placeholder="العنوان  "
                                                                   name="address" wire:model='address'>
                                                            @error('address')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> رقم الترم الدراسى </label>
                                                            <input type="number" value="" id="semester"
                                                                   class="form-control"
                                                                   placeholder="الترم الدراسى  "
                                                                   name="semester" wire:model='semester'>
                                                            @error('semester')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> سنة الإنضمام </label>
                                                            <input type="text" value="" id="year_enrolled"
                                                                   class="form-control"
                                                                   placeholder="سنة الإنضمام  "
                                                                   name="year_enrolled" wire:model='year_enrolled'>
                                                            @error('year_enrolled')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> عدد الساعات الأقصى </label>
                                                            <input type="text" value="" id="max_register_hours"
                                                                   class="form-control"
                                                                   placeholder="عدد الساعات الأقصى  "
                                                                   name="max_register_hours" wire:model='max_register_hours'>
                                                            @error('max_register_hours')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> عدد الساعات الأقل </label>
                                                            <input type="text" value="" id="min_register_hours"
                                                                   class="form-control"
                                                                   placeholder="عدد الساعات الأقل  "
                                                                   name="min_register_hours" wire:model='min_register_hours'>
                                                            @error('min_register_hours')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> GPA </label>
                                                            <input type="text" value="" id="GPA"
                                                                   class="form-control"
                                                                   placeholder="GPA  "
                                                                   name="GPA" wire:model='GPA'>
                                                            @error('GPA')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> CGPA </label>
                                                            <input type="text" value="" id="CGPA"
                                                                   class="form-control"
                                                                   placeholder="CGPA  "
                                                                   name="CGPA" wire:model='CGPA'>
                                                            @error('CGPA')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الإيميل </label>
                                                            <input type="email" value="" id="email"
                                                                   class="form-control"
                                                                   placeholder="العنوان البريدى  "
                                                                   name="email" wire:model='email'>
                                                            @error('email')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> كلمة السر </label>
                                                            <input type="password" value="" id="password"
                                                                   class="form-control"
                                                                   placeholder="كلمة السر "
                                                                   name="password" wire:model='password'>
                                                            @error('password')
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> المشرف </label>
                                                            <select name="supervisor_id" wire:model="supervisor_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر المشرف ">
                                                                    @foreach ($supervisors as $supervisor)
                                                                        <option value="{{$supervisor->id}}">{{$supervisor->name}}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                            @error('supervisor_id')
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

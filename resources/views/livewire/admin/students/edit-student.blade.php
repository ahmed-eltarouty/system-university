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
                                    <form class="form"  wire:submit.prevent='store' enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="las la-user-graduate"></i> بيانات  الطالب </h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم الطالب </label>
                                                        <input type="text"  id="name" value="{{$student->name}}"
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
                                                        <label for="projectinput1">رقم المستوى الدراسى </label>
                                                        <h3 class="list-group-item">{{$student->semester}}</h3>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> سنة الإنضمام </label>
                                                        <input type="text" id="year_enrolled"
                                                               class="form-control" value="{{$student->year_enrolled}}"
                                                               placeholder="سنة الإنضمام  "
                                                               name="year_enrolled" wire:model='year_enrolled'>
                                                        @error('year_enrolled')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> عدد الساعات المنجزه </label>
                                                        <h3 class="list-group-item">{{$student->total_finished_hours}}</h3>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> GPA </label>
                                                        <h3 class="list-group-item">{{$student->GPA}}</h3>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> CGPA </label>
                                                        <h3 class="list-group-item ">{{$student->CGPA}}</h3>
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
                                                        <select name="supervisor_id" wire:model="supervisor_id"  class="select2 form-control">
                                                            <optgroup label="من فضلك أختر المشرف ">
                                                                @foreach ($supervisors as $supervisor)

                                                                    <option value="{{$supervisor->id}}"  {{ ( $supervisor->id == $student->supervisor_id ) ? 'selected' : '' }}>{{$supervisor->name}}</option>
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
                                                               {{($student->status ==1) ? 'checked' : ''}}
                                                               />
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">مفعل </label>

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
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="las la-user-graduate"></i>إرسال اشعار للطالب </h4>
                                        <hr class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2"> ادخل الاشعار </label>
                                                    <input type="text"  id="noti" value="{{$noti}}"
                                                            class="form-control"
                                                            placeholder="ادخل نص الاشعار "
                                                            name="noti" wire:model='noti'>
                                                    @error('noti')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="projectinput2"> نوع الاشعار </label>
                                                    <select name="noti_status" wire:model="noti_status"  class="form-control">
                                                        <optgroup label="نوع الاشعار ">
                                                            <option value="1">تحذير</option>
                                                            <option value="0">اشعار</option>
                                                        </optgroup>
                                                    </select>
                                                    @error('noti_status')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-actions mt-2">
                                                <button type="button" class="btn btn-primary" wire:click='sendNotification'>
                                                    <i class="la la-check-square-o"></i> ارسال
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
            <!-- // Start last Semesters section -->

            <div class="card-content collapse show bg-white">
                <div class="card-body card-dashboard table-responsive">

                        @if($student->semesters->count() > 0 && \App\Models\Semester::where('user_id',$student->id)->with('subjects')->get()->count() > 0)
                            @foreach(\App\Models\Semester::where('user_id',$student->id)->with('subjects')->orderBy('id','desc')->get() as $semester)
                                <div class="d-flex">
                                    <h3 class="mx-5 my-2 "> تاريخ تسجيل الترم : {{$semester->created_at->format('Y-m-d')}}</h3>
                                    <h3 class="mx-5 my-2"> GPA : {{$semester->GPA ? $semester->GPA : 'لم يتم احتسابه بعد'}}</h3>
                                </div>
                                <table class="table display nowrap {{$semester->semester_status ? 'table-light' : ''}} table-striped table-hover table-bordered mb-5" id="studentstable">
                                    <thead>
                                    <tr>
                                        <th> المادة</th>
                                        <th> الساعات</th>
                                        <th>النقاط</th>
                                        <th>مجموع النقاط</th>
                                        <th>الاجرائات</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($semester->subjects as $subject)
                                        {{-- {{dd($subject)}} --}}
                                            <tr>
                                                <td>{{\App\Models\Subject::find($subject->subject_id)->name}}</td>
                                                <td>{{$subject -> subject_hours}}</td>
                                                <td>{{$subject -> subject_points}}</td>
                                                <td>{{$subject -> total_subject_points}}</td>
                                                <td>
                                                    <div class="btn-group" role="group"  aria-label="Basic example">
                                                        <button type="button" wire:click="declareRuesultVariables({{ $subject }})" class="btn btn-outline-info btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#exampleModal">تعديل</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                        @endif



                    <div class="justify-content-center d-flex">
                        {{-- ============================================================================ --}}

                        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ادخل قيمة النقاط</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true close-btn">×</span>
                                        </button>
                                    </div>
                                    <div class="mx-5 my-2">
                                        <label for="inputPoints">النقاط</label>
                                        <input type="number" step=0.01 wire:model="editResultPoints" class="form-control" id="inputPoints" placeholder="ادخل قيمة النقاط">
                                    </div>
                                    <div class="modal-body text-center">
                                        <p>تأكيد الحفظ ؟</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger close-btn" data-dismiss="modal">اغلاق</button>
                                        <button type="button" wire:click.prevent="updateResult({{$editResultPoints}})" class="btn btn-info close-modal" data-dismiss="modal">نعم , قم بالحفظ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ============================================================================ --}}

                    </div>
                </div>
            </div>


            <!-- // End last Semesters section -->

        </div>
    </div>
</div>

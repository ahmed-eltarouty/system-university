<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية </a></li>

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
                                <h4 class="card-title" id="basic-layout-form"> بيانات الطالب </h4>
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
                                                        <h4>{{$student->name}}</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> رقم الهاتف </label>
                                                        <h4>{{$student->phone}}</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> العنوان </label>
                                                        <h4>{{$student->address}}</h4>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم الترم الدراسى </label>
                                                        <h4>{{$student->semester}}</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> سنة الإنضمام </label>
                                                        <h4>{{$student->year_enrolled}}</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> GPA </label>
                                                        <h4>{{$student->GPA}}</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> CGPA </label>
                                                        <h4>{{$student->CGPA}}</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> الإيميل </label>
                                                        <h4>{{$student->email}}</h4>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
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

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($semester->subjects as $subject)
                                            <tr>
                                                <td>{{\App\Models\Subject::find($subject->subject_id)->name}}</td>
                                                <td>{{$subject -> subject_hours}}</td>
                                                <td>{{$subject -> subject_points}}</td>
                                                <td>{{$subject -> total_subject_points}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                        @endif
                </div>
            </div>


            <!-- // End last Semesters section -->

        </div>
    </div>
</div>

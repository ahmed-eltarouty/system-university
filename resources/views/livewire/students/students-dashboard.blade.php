
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-body">
        <div id="crypto-stats-3" class="row">
          <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
              <div class="card-content">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-2">
                      <h1><i class="las la-user-graduate font-large-2"></i></h1>
                    </div>
                    <div class="col-5 pl-2">
                      <h4>رقم الترم الحالى</h4>
                    </div>
                    @php
                        $user = Auth::user();
                    @endphp
                    <div class="col-5 text-right">
                      <h3 class="text-info text-bold-600">
                        @if(isset($user->semesters))
                          {{$user->semesters->count()}}
                        @endif
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <canvas id="btc-chartjs" class="height-75"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
              <div class="card-content">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-2">
                      <h1><i class="las la-chalkboard-teacher font-large-2"></i></h1>
                    </div>
                    <div class="col-5 pl-2">
                      <h4>عدد المواد المسجلة</h4>
                    </div>
                    <div class="col-5 text-right">
                        <h3 class="text-info text-bold-600">
                            @if($user->semesters()->with('subjects')->get()->count() > 0)
                                {{$user->semesters()->with('subjects')->get()[0]->subjects->count()}}
                            @endif
                        </h3>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <canvas id="eth-chartjs" class="height-75"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
              <div class="card-content">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-2">
                      <h1><i class="las la-school font-large-2"></i></i></h1>
                    </div>
                    <div class="col-5 pl-2">
                      <h4>الساعات المسجلة</h4>
                      <h6 class="text-muted">المتبقى للتخرج</h6>
                    </div>
                    <div class="col-5 text-right">
                      <h4 class="text-info text-bold-600">{{$user->total_registered_hours}}</h4>
                      <h6 class="danger">{{\App\Models\Settings::first()->graduate_hours - $user->total_registered_hours}} <i class="las la-spinner"></i></h6>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <canvas id="xrp-chartjs" class="height-75"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12 col-xl-4">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> التخصصات التى تم تسجيلها</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

              </div>
              <div class="card-content">
                <div class="table-responsive mt-1">
                  <table class="table table-xs">
                    <thead>
                      <tr>
                        <th>التخصص</th>
                        <th>M</th>
                        <th>E</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach(DB::table('user_categories')->where('user_id',$user->id)->get() as $category)

                          <tr>
                            <td>{{\App\Models\SubjectCategory::find($category->category_id)->name}}</td>
                            <td>{{$category->M_hours}}</td>
                            <td>{{$category->E_hours}}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


          <div class="col-12 col-xl-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">الإعدادات</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <ul class="nav nav-tabs nav-underline no-hover-bg">
                    <li class="nav-item">
                      <a class="nav-link active text-left" id="base-limit" data-toggle="tab" aria-controls="limit"
                      href="#limit" aria-expanded="true">البيانات</a>
                    </li>
                  </ul>
                  <div class="tab-content px-1 pt-1">
                    <div role="tabpanel" class="tab-pane active" id="limit" aria-expanded="true" aria-labelledby="base-limit">
                      <div class="row">
                        <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4 pr-2 p-0">
                          <div class="row my-2">
                            <div class="col-4">

                              <h5 class="text-bold-600 mb-0 ">الاسم</h5>
                            </div>
                            <div class="col-8 text-left">
                              <p class="text-muted mb-0 text-right"> {{$user->name}}</p>
                            </div>
                          </div>
                          <form class="form form-horizontal">
                            <div class="form-body">
                              <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="btc-limit-buy-price">رقم الهاتف</label>
                                <div class="col-md-8">
                                    <h4 class="text-right">{{$user->phone}}</h4>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="btc-limit-buy-amount">العنوان </label>
                                <div class="col-md-8">
                                    <h4 class="text-right">{{$user->address}}</h4>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="btc-limit-buy-total">سنة الإنضمام </label>
                                <div class="col-md-8">
                                    <h4 class="text-right">{{$user->year_enrolled}}</h4>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="btc-limit-buy-total">اسم المشرف  </label>
                                <div class="col-md-8">
                                    <h4 class="text-right">
                                      @if($user->supervisor_id == null)
                                        <span class="badge badge-danger">لم يتم تحديد المشرف</span>
                                      @else
                                        {{\App\Models\Supervisor::find($user->supervisor_id)->first()->name}}
                                      @endif
                                    </h4>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="btc-limit-buy-total">كود الطالب </label>
                                <div class="col-md-8">
                                    <h4 class="text-right">{{$user->code}}</h4>
                                </div>
                              </div>

                            </div>
                          </form>
                        </div>
                        <div class="col-12 col-xl-6 pl-2 p-0">
                          <div class="row my-2">
                            <div class="col-4">
                              <h5 class="text-bold-600 mb-0">الإيميل</h5>
                            </div>
                            <div class="col-8 text-left">
                              <p class="text-muted mb-0">{{$user->email}}</p>

                            </div>
                          </div>
                          <form class="form form-horizontal">
                            <div class="form-body">
                              <div class="form-group row">
                                <label class="col-md-8 col-form-label" for="btc-price">اجمالى عدد الساعات المسجلة</label>
                                <div class="col-md-4">
                                    <h4 >{{$user->total_registered_hours}}</h4>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-8 col-form-label" for="btc-limit-sell-amount">اجمالى عدد الساعات التى تم دراستها</label>
                                <div class="col-md-4">
                                    <h4 >{{$user->total_finished_hours}}</h4>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-8 col-form-label" for="btc-limit-sell-total">GPA</label>
                                <div class="col-md-4">
                                    <h >{{$user->GPA}}</h>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-8 col-form-label" for="btc-limit-sell-total">CGPA</label>
                                <div class="col-md-4">
                                    <h class="text-right">{{$user->CGPA}}</h>
                                </div>
                              </div>
                              <div class="form-actions pb-0">

                                <a href="{{route('user.edit')}}" class="btn round btn-danger btn-block btn-glow"> تعديل البيانات</a>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-content collapse show bg-white">
            <div class="card-body card-dashboard table-responsive">

                    @if($user->semesters->count() > 0 && \App\Models\Semester::where('user_id',$user->id)->with('subjects')->get()->count() > 0)
                        @foreach(\App\Models\Semester::where('user_id',$user->id)->with('subjects')->orderBy('id','desc')->get() as $semester)
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

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($semester->subjects as $subject)
                                    {{-- {{dd($subject)}} --}}
                                        <tr>
                                            <td>{{isset(\App\Models\Subject::find($subject->subject_id)->name) ? (\App\Models\Subject::find($subject->subject_id)->name) : "" }}</td>
                                            <td>{{isset($subject -> subject_hours) ? ($subject -> subject_hours) : ""}}</td>
                                            <td>{{isset($subject -> subject_points) ? ($subject -> subject_points) : ""}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    @endif
            </div>
        </div>

      </div>
    </div>
  </div>

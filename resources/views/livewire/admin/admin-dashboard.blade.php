
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
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
                      <h4>عدد الطلاب</h4>
                      <h6 class="text-muted">المسجلين</h6>
                    </div>
                    <div class="col-5 text-right">
                      <h4>{{\App\Models\User::all()->count()}}</h4>
                      <h6 class="danger">{{\App\Models\User::where('status',0)->get()->count()}} <i class="las la-times-circle font-large-1"></i></h6>
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
                      <h4>عدد المشرفين</h4>
                      <h6 class="text-muted">المسجلين</h6>
                    </div>
                    <div class="col-5 text-right">
                      <h4>{{\App\Models\Supervisor::all()->count()}}</h4>
                      <h6 class="danger">{{\App\Models\Supervisor::where('status',0)->get()->count()}} <i class="las la-times-circle font-large-1"></i></h6>
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
                      <h4>المواد</h4>
                      <h6 class="text-muted">المسجلة</h6>
                    </div>
                    <div class="col-5 text-right">
                      <h4>{{\App\Models\Subject::all()->count()}}</h4>
                      <h6 class="danger">{{\App\Models\Subject::where('status',0)->get()->count()}} <i class="las la-times-circle font-large-1"></i></h6>
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
                <h4 class="card-title">التخصصات</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <div class="btn-group">
                    <a href="{{route('admin.show-subject-category')}}" class="btn round btn-sm btn-outline-info">عرض الجميع</a>
                  </div>
                </div>
              </div>
              <div class="card-content">
                <div class="table-responsive mt-1">
                  <table class="table table-xs">
                    <thead>
                      <tr>
                        <th>التخصص</th>
                        <th>الكود</th>
                        <th>الحاله</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\SubjectCategory::all() as $subject)
                          <tr>
                            <td>{{$subject->name}}</td>
                            <td>{{$subject->code}}</td>
                            <td>
                              @if($subject->status == 1)
                                <span class="badge badge-success">مفعل</span>
                              @else
                                <span class="badge badge-danger">غير مفعل</span>
                              @endif
                            </td>
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
                      href="#limit" aria-expanded="true">التسجيل</a>
                    </li>
                  </ul>
                  @php
                    $settings=\App\Models\Settings::first();
                  @endphp
                  <div class="tab-content px-1 pt-1">
                    <div role="tabpanel" class="tab-pane active" id="limit" aria-expanded="true" aria-labelledby="base-limit">
                      <div class="row">
                        <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4 pr-2 p-0">
                          <div class="row my-2">
                            <div class="col-4">

                              <h5 class="text-bold-600 mb-0">@if($settings->semester_register)<span class="text-success">تسجيل ترم جديد مفتوح</span> @else <span class="text-danger">تسجيل ترم جديد مغلق</span> @endif</h5>
                            </div>
                            <div class="col-8 text-left">
                              <p class="text-muted mb-0">@if($settings->semester_type)<span class="text-danger">ترم صيفى</span> @else <span class="text-success">ترم عادى</span> @endif</p>
                            </div>
                          </div>
                          <form class="form form-horizontal">
                            <div class="form-body">
                              <div class="form-group row">
                                <label class="col-md-9 col-form-label" for="btc-limit-buy-price">عدد الساعات للCGPA أكبر من 2 والجدد</label>
                                <div class="col-md-3">
                                    <h4  class="text-info">{{$settings->max_hours_CGPA_greater_2}}</h4>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-9 col-form-label" for="btc-limit-buy-amount">عدد الساعات للCGPA أكبر من 1 و أقل من 2 </label>
                                <div class="col-md-3">
                                    <h4  class="text-info">{{$settings->max_hours_CGPA_less_2_greater_1}}</h4>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-9 col-form-label" for="btc-limit-buy-total">عدد ساعات الCGPA أقل من 1</label>
                                <div class="col-md-3">
                                    <h4  class="text-info">{{$settings->max_hours_CGPA_less_1}}</h4>
                                </div>
                              </div>
                              <div class="form-actions pb-0">

                                <a href="{{route('admin.settings')}}" class="btn round btn-success btn-block btn-glow">تعديل الإعدادات </a>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="col-12 col-xl-6 pl-2 p-0">
                          <div class="row my-2">
                            <div class="col-4">
                              <h5 class="text-bold-600 mb-0">@if(!$settings->semester_register)<span class="text-success">تسجيل ترم جديد مفتوح</span> @else <span class="text-danger">تسجيل ترم جديد مغلق</span> @endif</h5>
                            </div>
                            <div class="col-8 text-left">
                              <p class="text-muted mb-0">@if(!$settings->semester_type)<span class="text-danger">ترم صيفى</span> @else <span class="text-success">ترم عادى</span> @endif</p>

                            </div>
                          </div>
                          <form class="form form-horizontal">
                            <div class="form-body">
                              <div class="form-group row">
                                <label class="col-md-9 col-form-label" for="btc-price">عدد ساعات الترم الصيفى</label>
                                <div class="col-md-3">
                                    <h4  class="text-info">{{$settings->max_hours_summer}}</h4>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-9 col-form-label" for="btc-limit-sell-amount">فترة التعديل بعد تسجيل المواد</label>
                                <div class="col-md-3">
                                    <h4  class="text-info">{{$settings->period_of_editing_registered_semester}}</h4>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-9 col-form-label" for="btc-limit-sell-total">عدد الساعات للتخرج</label>
                                <div class="col-md-3">
                                    <h4 class="text-info">{{$settings->graduate_hours}}</h4>
                                </div>
                              </div>
                              <div class="form-actions pb-0">

                                <a href="{{route('admin.settings')}}" class="btn round btn-danger btn-block btn-glow"> تعديل الإعدادات</a>
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

      </div>
    </div>
  </div>

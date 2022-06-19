<div class="app-content content">
    <div class="content-wrapper">
        @if($user->total_finished_hours >= 62 && $user->specialization_id == null)
            <div id="crypto-stats-3" class="row">

                    <h2 class="btn btn-lg btn-block btn-outline-danger mb-2 col-12 text-center">عفوا يجب اختيار تخصص اولا</h2>
                    <div class="col-12 text-center">
                        @include('livewire.components.alerts.errors')
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="projectinput2"> التخصص </label>
                            <select name="specialization_cat_id" wire:model="specialization_cat_id" class="form-control">
                                <optgroup label="من فضلك أختر التخصص ">
                                    <option value="">اختر التخصص</option>
                                    @foreach ($spec_cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @error('specialization_cat_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary my-1 mx-1" wire:click='saveSpecializtion()'>حفظ</button>

            </div>
        @else

            <div id="crypto-stats-3" class="row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">المواد التى تم تسجليها</h3>
                </div>
                    <div class="row">
                        <div class="card">
                            <div class="continer">
                                <div class="row">
                                    <div class="col mx-5 pt-5">
                                        <h3>{{$total_can_register > 0 ? 'عدد الساعات المتاحة لك :': 'عدد الساعات المطلوبه :'}}
                                            <span class="{{$total_can_register > 0 ? 'text-success':'text-danger'}}"> {{$total_can_register}}</span>
                                        </h3>
                                    </div>
                                    <div class="col mx-5 pt-5">
                                        <h3>
                                            @if($pass_minimum_hours)
                                                <span class='text-success'>تم تخطى الحد الادنى لتسجيل الساعات {{$settingss->semester_type == 0 ? $settingss->min_hours : $settingss->min_hours_summer}}</span>
                                            @else
                                                <span class="text-danger">لم يتم تخطى الحد الادنى لتسجيل الساعات {{$settingss->semester_type == 0 ? $settingss->min_hours : $settingss->min_hours_summer}}</span>
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            @include('livewire.components.alerts.success')
                            @include('livewire.components.alerts.errors')
                            <style>
                                nav svg{
                                    max-height:20px ;
                                }
                            </style>

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard table-responsive">
                                    <table class="table display nowrap table-striped table-bordered " id="subjectsTable22">
                                        <thead>
                                        <tr>
                                            <th> اسم المادة</th>
                                            <th>الكود</th>
                                            <th>الساعات</th>
                                            <th> العظمى</th>
                                            <th> الصغرى</th>
                                            <th>التخصص</th>
                                            <th>النوع</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @php
                                                print("<pre>".print_r($subjects,true)."</pre>");
                                            @endphp --}}
                                        @if(count($selected_subjects) > 0)
                                            @foreach ($selected_subjects as $selected_subject)
                                                    @php
                                                        $subject=\App\Models\Subject::find($selected_subject);
                                                    @endphp
                                                    @if(count($subject))
                                                        <tr>
                                                            <td>{{$subject[0] -> name}}</td>
                                                            <td>{{$subject[0] -> code}}</td>
                                                            <td>{{$subject[0] -> study_hours}}</td>
                                                            <td>{{$subject[0] -> max_degree}}</td>
                                                            <td>{{$subject[0] -> min_degree}}</td>
                                                            <td>{{$subject[0] -> category_id ? (\App\Models\SubjectCategory::find($subject[0]->category_id)->name) : ""}}</td>
                                                            <td>{{$subject[0]-> subject_status == 1 ? 'إجبارى' : 'إختيارى'}}</td>
                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                    {{-- <button type="button" wire:click="add_to_list({{ $subject[0]->id }})" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#exampleModal">اضافة</button> --}}

                                                                    <button type="button" wire:click="removeSubject({{ $subject[0]->id }})" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#exampleModal">حذف</button>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">جميع المواد </h4>
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

                                <div class="continer">
                                    <div class="row">
                                        <div class="col-12 mx-5 pt-5">
                                            <h3>{{$total_can_register > 0 ? 'عدد الساعات المتاحة لك :': 'عدد الساعات المطلوبه :'}}
                                                <span class="{{$total_can_register > 0 ? 'text-success':'text-danger'}}"> {{$total_can_register}}</span>
                                            </h3>
                                        </div>
                                        <div class="col-6 col-sm-4 ml-5 mr-3 mr-sm-0">
                                            <div class="form-group">
                                                <label for="projectinput1"> البحث </label>
                                                <input type="text" class="form-control" placeholder="ابحث" wire:model="search">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @include('livewire.components.alerts.success')
                                @include('livewire.components.alerts.errors')
                                <style>
                                    nav svg{
                                        max-height:20px ;
                                    }
                                </style>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard table-responsive">
                                        <table class="table display nowrap table-striped table-bordered " id="subjectsTable">
                                            <thead>
                                            <tr>
                                                <th> اسم المادة</th>
                                                <th>الكود</th>
                                                <th>الساعات</th>
                                                <th> العظمى</th>
                                                <th> الصغرى</th>
                                                <th>العدد الكلى</th>
                                                <th>GPA مطلوب</th>
                                                <th>مادة مشروطه بها1</th>
                                                <th>مادة مشروطه بها2</th>
                                                <th>ساعات مطلوبه</th>
                                                <th>التخصص</th>
                                                <th>النوع</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @php
                                                    print("<pre>".print_r($subjects,true)."</pre>");
                                                @endphp --}}
                                                @isset($specialization_subjects)
                                                @foreach($specialization_subjects as $specialization_subject)
                                                @foreach ($specialization_subject->subjects as $subject)

                                                    @if($subject->status == 1 && str_contains($subject->name ,$this->search))
                                                        <tr>
                                                            <td>{{$subject -> name}}</td>
                                                            <td>{{$subject -> code}}</td>
                                                            <td>{{$subject -> study_hours}}</td>
                                                            <td>{{$subject -> max_degree}}</td>
                                                            <td>{{$subject -> min_degree}}</td>
                                                            <td>{{$subject -> total_students_can_register}}</td>
                                                            <td class="{{Auth::user()->GPA < $subject -> GPA_Greater_Than ? 'text-danger' : ''}}">{{$subject -> GPA_Greater_Than}}</td>
                                                            <td>{{$subject -> finished_subject_id_1 ? (\App\Models\Subject::find($subject->finished_subject_id_1)->name) : ""}}</td>
                                                            <td>{{$subject -> finished_subject_id_2 ? (\App\Models\Subject::find($subject->finished_subject_id_2)->name) : ""}}</td>
                                                            <td class="{{Auth::user()->total_registered_hours < $subject -> required_hours ? 'text-danger' : ''}}">{{$subject -> required_hours}}</td>
                                                            <td>{{$subject -> category_id ? (\App\Models\SubjectCategory::find($subject->category_id)->name) : ""}}</td>
                                                            <td>{{$subject -> subject_status == 1 ? 'إجبارى' : 'إختيارى'}}</td>
                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                    <button type="button" wire:click="add_to_list({{ $subject->id }})" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#exampleModal">إضافة</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @endforeach
                                            @endisset

                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endif
    </div>
</div>

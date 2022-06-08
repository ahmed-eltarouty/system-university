<div class="app-content content">
    <div class="content-wrapper">
        <div id="crypto-stats-3" class="row">

            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">المواد التى تم تسجليها</h3>
            </div>
                <div class="row">
                    <div class="card">
                        <div class="continer">
                            <div class="row">
                                <div class="col-12 mx-5 pt-5">
                                    <h3>{{$total_can_register > 0 ? 'عدد الساعات المتاحة لك :': 'عدد الساعات المطلوبه :'}}
                                        <span class="{{$total_can_register > 0 ? 'text-success':'text-danger'}}"> {{$total_can_register}}</span>
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
                                    <div class="ml-5 col-2 col-md-1">
                                        <div class="form-group">
                                            <label for="projectinput2"> العدد </label>
                                            <select name="count" wire:model="count" class="select2 form-control">
                                                <optgroup label="اختر العدد ">
                                                        <option value="10">10</option>
                                                        <option value="20">20</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                </optgroup>
                                            </select>
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
                                            <th>الحالة</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @php
                                                print("<pre>".print_r($subjects,true)."</pre>");
                                            @endphp --}}
                                            @isset($subjects)
                                            @foreach($subjects as $subject)
                                                @if($subject->status == 1)
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
                                                        <td>{{$subject -> status ? 'مفعل':'غير مفعل'}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <button type="button" wire:click="add_to_list({{ $subject->id }})" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#exampleModal">إضافة</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endisset

                                        </tbody>
                                    </table>


                                    <div class="justify-content-center d-flex">
                                        {{-- ============================================================================ --}}

                                        {{-- <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">تأكيد عملية الحذف</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true close-btn">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>هل انت متأكد انك تريد الحذف ؟</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">اغلاق</button>
                                                        <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">نعم , قم بالحذف</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- ============================================================================ --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

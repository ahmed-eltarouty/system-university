<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> المواد </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> المواد
                            </li>
                        </ol>
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
                                    <div class="col-6 col-sm-4 ml-5 mr-3 mr-sm-0">
                                        <div class="form-group">
                                            <label for="projectinput1"> البحث </label>
                                            <input type="text" class="form-control" placeholder="ابحث" wire:model="search">
                                        </div>
                                    </div>
                                    <div class="ml-5 col-2 col-md-1">
                                        <div class="form-group">
                                            <label for="projectinput2"> العدد </label>
                                            <select name="count" wire:model="count" class="form-control">
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
                                                <tr>
                                                    <td>{{$subject -> name}}</td>
                                                    <td>{{$subject -> code}}</td>
                                                    <td>{{$subject -> study_hours}}</td>
                                                    <td>{{$subject -> max_degree}}</td>
                                                    <td>{{$subject -> min_degree}}</td>
                                                    <td>{{$subject -> total_students_can_register}}</td>
                                                    <td>{{$subject -> GPA_Greater_Than}}</td>
                                                    <td>{{$subject -> finished_subject_id_1 ? (\App\Models\Subject::find($subject->finished_subject_id_1)->name) : ""}}</td>
                                                    <td>{{$subject -> finished_subject_id_2 ? (\App\Models\Subject::find($subject->finished_subject_id_2)->name) : ""}}</td>
                                                    <td>{{$subject -> required_hours}}</td>
                                                    <td>{{$subject -> category_id ? (\App\Models\SubjectCategory::find($subject->category_id)->name) : ""}}</td>
                                                    <td>{{$subject -> subject_status == 1 ? 'إجبارى' : 'إختيارى'}}</td>
                                                    <td>{{$subject -> status ? 'مفعل':'غير مفعل'}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{route('admin.edit-subject',$subject->id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>

                                                            <button type="button" wire:click="deleteId({{ $subject->id }})" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#exampleModal">حذف</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset

                                        </tbody>
                                    </table>
                                    {{$subjects->links()}}
                                    <div class="justify-content-center d-flex">
                                        {{-- ============================================================================ --}}

                                        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        </div>
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

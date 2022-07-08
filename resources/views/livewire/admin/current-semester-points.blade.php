
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
                                    <div class="mx-5 col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2"> اختر المادة </label>
                                            <select name="count" wire:model.lazy="inbutsubject" class="form-control">
                                                <optgroup label="اختر المادة ">
                                                    <option value="0">اختر المادة</option>
                                                    @foreach ($subs as $sub)
                                                        <option value="{{$sub}}">{{isset(\App\Models\Subject::find($sub)->name) ? (\App\Models\Subject::find($sub)->name) : "تم حذف المادة"}}</option>
                                                    @endforeach
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
                                    <table
                                        class="table display nowrap table-striped table-bordered" id="studentstable">
                                        <thead>
                                        <tr>
                                            <th> الاسم</th>
                                            <th> الكود</th>
                                            <th> النتيجة</th>
                                            <th>تطبيق</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($students)
                                            @foreach($students as $student)
                                                <tr>
                                                    <td>{{$student -> name}}</td>
                                                    <td>{{$student -> code}}</td>


                                                        @php
                                                            $valu= \App\Models\Student_Subject::find($show[$student -> id])->subject_points;
                                                        @endphp

                                                        <td>

                                                                <input type="number" step=0.01 class="form-control"  placeholder="ادخل قيمة النقاط"  min="0" max="4"  required  @if($valu == null) wire:model="result.{{$student->id}}" wire:key="{{ $loop->index}}" @else value="{{$valu}}" disabled='true' @endif >

                                                        </td>

                                                    <td>
                                                        <div class="btn-group" role="group"  aria-label="Basic example">
                                                            <button type="button" wire:click="declareRuesultVariables({{ $show[$student->id] }} , {{$student->id}} )" class="btn btn-outline-info btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#exampleModal">تعديل</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset

                                        </tbody>
                                    </table>
                                    {{$students->links()}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

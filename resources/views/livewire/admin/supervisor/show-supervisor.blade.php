<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> المرشدين </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> المرشدين
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
                                <h4 class="card-title">جميع المرشدين </h4>
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

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <table  class="table display nowrap table-striped table-bordered " id='supervisorsTable'>

                                                <thead>
                                                <tr>
                                                    <th> الاسم</th>
                                                    <th>رقم الهاتف</th>
                                                    <th>العنوان البريدى</th>
                                                    <th>الحالة</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @isset($supervisors)
                                                    @foreach($supervisors as $supervisor)
                                                        <tr>
                                                            <td>{{$supervisor -> name}}</td>
                                                            <td>{{$supervisor -> phone}}</td>
                                                            <td>{{$supervisor -> email}}</td>
                                                            <td>{{$supervisor -> status ? 'مفعل':'غير مفعل'}}</td>
                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                    <a href="{{route('admin.edit-supervisor',$supervisor->id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>

                                                                    <button type="button" wire:click="supervisorId({{ $supervisor->id }})" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#exampleModal">حذف</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endisset

                                                </tbody>
                                            </table>
                                            {{$supervisors->links()}}
                                        </div>
                                    </div>
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

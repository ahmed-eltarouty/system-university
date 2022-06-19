<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.add-student')}}"> أضافة تخصص </a>
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
                                <h4 class="card-title" id="basic-layout-form"> إضافة تخصص </h4>
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
                                            <h4 class="form-section"><i class="las la-user-graduate"></i> بيانات  التخصص </h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم التخصص </label>
                                                        <input type="text" value="" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل اسم التخصص  "
                                                               name="name" wire:model='name'>
                                                        @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> كود التخصص </label>
                                                        <input type="text" value="" id="phone"
                                                               class="form-control"
                                                               placeholder="ادخل كود التخصص  "
                                                               name="code" wire:model='code'>
                                                        @error('code')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> عدد الساعات الكلى للتخصص </label>
                                                        <input type="number" step=0.01 value="" id="hours"
                                                               class="form-control"
                                                               placeholder="عدد ساعات الكلى التخصص  "
                                                               name="total_hours" wire:model='total_hours'>
                                                        @error('total_hours')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> عدد الساعات الإلزامية للتخصص </label>
                                                        <input type="number" step=0.01 value="" id="hours"
                                                               class="form-control"
                                                               placeholder="عدد ساعات الإلزامية للتخصص  "
                                                               name="M_hours" wire:model='M_hours'>
                                                        @error('M_hours')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> عدد الساعات الإختيارية للتخصص </label>
                                                        <input type="number" step=0.01 value="" id="hours"
                                                               class="form-control"
                                                               placeholder="عدد ساعات الإختيارية للتخصص  "
                                                               name="E_hours" wire:model='E_hours'>
                                                        @error('E_hours')
                                                        <span class="text-danger">{{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group" wire:ignore>
                                                        <label for="specialization"> نوع التخصص </label>
                                                        <select name="specialization" wire:model="specialization" id="specialization" class="form-control">
                                                            <optgroup label="من فضلك أختر التخصص ">
                                                                <option value="1">تخصصى</option>
                                                                <option value="0">أساسى</option>
                                                            </optgroup>
                                                        </select>
                                                        @error('specialization')
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

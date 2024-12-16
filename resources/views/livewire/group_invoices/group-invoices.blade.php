<div >

    @if ($InvoiceSaved)
        <div class="alert alert-info">{{trans('Dashboard/invoices.data saved successfully')}}</div>
    @endif

    @if ($InvoiceUpdated)
        <div class="alert alert-info">{{trans('Dashboard/invoices.data updated successfully')}}</div>
    @endif

    @if($show_table)
        @include('livewire.group_invoices.Table')
    @else
        <form wire:submit.prevent="store" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col">
                    <label>{{trans('Dashboard/invoices.patient_name')}}</label>
                    <select wire:model="patient_id" class="form-control" required>
                        <option value=""  >-- {{trans('Dashboard/invoices.choose from list')}}--</option>
                        @foreach($Patients as $Patient)
                            <option value="{{$Patient->id}}">{{$Patient->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col">
                    <label>{{trans('Dashboard/invoices.doctor')}}</label>
                    <select wire:model="doctor_id"  wire:change="get_section" class="form-control"  id="exampleFormControlSelect1" required>
                        <option value="" >-- {{trans('Dashboard/invoices.choose from list')}}--</option>
                        @foreach($Doctors as $Doctor)
                            <option value="{{$Doctor->id}}">{{$Doctor->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col">
                    <label>{{trans('Dashboard/invoices.section')}}</label>
                    <input wire:model="section_id" type="text" class="form-control" readonly >
                </div>

                <div class="col">
                    <label>{{trans('Dashboard/invoices.invoice_type')}}</label>
                    <select wire:model="type" class="form-control" {{$updateMode == true ? 'disabled':''}}>
                        <option value="" >-- {{trans('Dashboard/invoices.choose from list')}}--</option>
                        <option value="1">{{trans('Dashboard/invoices.cash')}}</option>
                        <option value="2">{{trans('Dashboard/invoices.dept')}}</option>
                    </select>
                </div>


            </div><br>

            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0"></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('Dashboard/invoices.service_name')}}</th>
                               
                                        <th>{{trans('Dashboard/invoices.tax value')}}</th>
                                        <th>{{trans('Dashboard/invoices.total')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <select wire:model="Group_id" class="form-control" wire:change="get_price" id="exampleFormControlSelect1">
                                                <option value="">-- {{trans('Dashboard/invoices.choose from list')}}--</option>
                                                @foreach($Groups as $Group)
                                                    <option value="{{$Group->id}}">{{$Group->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    
                                        <td><input type="text" class="form-control" value="{{$tax_value}}" readonly  ></td>
                                        <td><input type="text" class="form-control" readonly value="{{$subtotal + $tax_value }}"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!-- bd -->
                        </div><!-- bd -->
                    </div><!-- bd -->
                </div>
            </div>
            <input class="btn btn-outline-success" type="submit" value="{{trans('Dashboard/invoices.confirm')}}">
        </form>
    @endif

</div>

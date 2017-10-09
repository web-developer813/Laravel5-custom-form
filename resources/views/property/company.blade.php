<div class="col-md-12 margin-bottom-50" id="propertyContacts">
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-20">
                <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom-20">
                    <span class="font-weight-900">Property Management Companies</span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-right margin-bottom-20">
                    <a href="javascript:void(0)" class="btn btn-default"  onclick="onClickPropertyAssignManagementCompany()">Assign Management Company</a>
                    <a href="javascript:void(0)" class="btn btn-default"  onclick="onClickPropertyAddManagementCompany()">Add Management Company</a>
                    <a href="javascript:void(0)" class="btn btn-default"  onclick="onClickPropertyEditManagementCompany()">Edit Management Company</a>
                </div>
            </div>
            <!-- add and edit form div start-->
            <div class="row">
                <div class="col-md-12 margin-bottom-30" id="addEditPropertyCompanyDiv" style="display: none">
                    <div class="alert alert-danger" id="errorAddEditPropertyCompanytMessage">
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="propertyAboveCompanyStoreForm">
                            {!! Form::open(array('route' =>array('property.company.store'), 'method' =>'post', 'id' =>'propertyCompanyStoreForm')) !!}
                                <div class="form-group form-group-change">
                                    {!! Form::text('management_company', old('management_company') , ['class' => 'input-text', 'required' => 'required', 'id' =>'management_company']) !!}
                                    {!! Form::label('management_company', 'Management Company', ['class' =>'label-helper']) !!}
                                </div>
                                <div class="form-group form-group-change">
                                    {!! Form::text('management_company_street', old('management_company_street') , ['class' => 'input-text', 'id' =>'management_company_street']) !!}
                                    {!! Form::label('management_company_street', 'Street Address', ['class' =>'label-helper']) !!}
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                                            {!! Form::text('management_company_city', old('management_company_city') , ['class' => 'input-text', 'id' =>'management_company_city']) !!}
                                            {!! Form::label('management_company_city', 'City', ['class' =>'label-helper label-helper-change']) !!}
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group-change">
                                            {!! Form::text('management_company_state', old('management_company_state') , ['class' => 'input-text', 'id' =>'management_company_state']) !!}
                                            {!! Form::label('management_company_state', 'State', ['class' =>'label-helper label-helper-change']) !!}
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group-change">
                                            {!! Form::text('management_company_zip', old('management_company_zip') , ['class' => 'input-text', 'id' =>'management_company_zip']) !!}
                                            {!! Form::label('management_company_zip', 'Zip', ['class' =>'label-helper label-helper-change']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::hidden('property_id', $property->id, array('id'=>'property_company_id')) !!}
                                @if(isset($property_company))
                                    {!! Form::hidden('property_company_id', $property_company->id , array('id'=>'property_company_edit_id')) !!}
                                @else
                                    {!! Form::hidden('property_company_id', null , array('id'=>'property_company_edit_id')) !!}
                                @endif

                                <div class="form-group text-right">
                                    <a href="javascript:void(0)" class="btn btn-default" onclick="onClickPropertyCompanySave()">Company Save/Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-default" onclick="onClickPropertyCompanyCancel()">Cancel</a>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- add and edit form div end-->
            <div class="row margin-bottom-40">
                <div class="col-md-12">
                    <table class="table table-striped" id="property-company-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Company Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zip</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($property_companies as $key_property_company => $value_property_company)
                            <tr id="property_phone_tr-{{$key_property_company}}">
                                <td><input type="radio" name="property_company_radio" value="{{$value_property_company->id}}" @if(isset($property_company) && $property_company->id == $key_property_company+1) checked @elseif($key_property_company == 0) checked @endif></td>
                                <td>{{$value_property_company->management_company}}</td>
                                <td>{{$value_property_company->management_company_street}}</td>
                                <td>{{$value_property_company->management_company_city}}</td>
                                <td>{{$value_property_company->management_company_state}}</td>
                                <td>{{$value_property_company->management_company_zip}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 margin-bottom-30" id="addEditPropertyCompanyShowDiv" style="display: none">
                </div>
            </div>
        </div>
    </div>
</div>
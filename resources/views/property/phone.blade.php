<div class="col-md-12 margin-bottom-50" id="propertyPhoneNumbers">
    <div class="row">
        <div class="col-md-12 margin-bottom-30">
            <div class="row margin-bottom-20">
                <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-20">
                    <span class="font-weight-900">Property Phone Numbers</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right margin-bottom-20">
                    <a href="javascript:void(0)" class="btn btn-default" onclick="onClickAddPhone()">Add Phone</a>
                    <a href="javascript:void(0)" class="btn btn-default" onclick="onClickEditPhone()">Edit Phone</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 margin-bottom-30" id="addEditPhoneDiv" style="display: none">
                    <div class="alert alert-danger" id="errorAddEditPhoneMessage">
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="propertyAbovePhoneStoreForm">
                            {!! Form::open(array('route' =>array('property.phone.store'), 'method' =>'post', 'id' =>'propertyPhoneStoreForm')) !!}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                                        @if(isset($property_phone))
                                            {!! Form::select('phone_type_id', $property_phone_types, old('phone_type_id', $property_phone->phone_type_id), ['class' => 'input-text input-text-select', 'id' =>'phone_type_id']) !!}
                                        @else
                                            {!! Form::select('phone_type_id', $property_phone_types, old('phone_type_id'), ['class' => 'input-text input-text-select', 'id' =>'phone_type_id']) !!}
                                        @endif
                                        {!! Form::label('phone_type_id', 'Phone Type', ['class' =>'label-helper label-helper-change']) !!}
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                                        @if(isset($property_phone))
                                            {!! Form::text('area_code', old('area_code',$property_phone->area_code) , ['class' => 'input-text', 'id' =>'area_code']) !!}
                                        @else
                                            {!! Form::text('area_code', old('area_code') , ['class' => 'input-text', 'id' =>'area_code']) !!}
                                        @endif
                                        {!! Form::label('area_code', 'Area Code', ['class' =>'label-helper label-helper-change']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                                        @if(isset($property_phone))
                                            {!! Form::text('phone_number', old('phone_number',$property_phone->phone_number) , ['class' => 'input-text', 'id' =>'phone_number']) !!}
                                        @else
                                            {!! Form::text('phone_number', old('phone_number') , ['class' => 'input-text', 'id' =>'phone_number']) !!}
                                        @endif
                                        {!! Form::label('phone_number', 'Phone Number', ['class' =>'label-helper label-helper-change']) !!}
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                                        @if(isset($property_phone))
                                            {!! Form::text('phone_ext', old('phone_ext',$property_phone->phone_ext) , ['class' => 'input-text', 'id' =>'phone_ext']) !!}
                                        @else
                                            {!! Form::text('phone_ext', old('phone_ext') , ['class' => 'input-text', 'id' =>'phone_ext']) !!}
                                        @endif
                                        {!! Form::label('phone_ext', 'Phone Ext', ['class' =>'label-helper label-helper-change']) !!}
                                    </div>
                                </div>
                            </div>
                            {!! Form::hidden('property_id', $property->id, array('id'=>'phone_property_id')) !!}
                            @if(isset($property_phone))
                                {!! Form::hidden('property_phone_id', $property_phone->id , array('id'=>'phone_property_edit_id')) !!}
                            @else
                                {!! Form::hidden('property_phone_id', null , array('id'=>'phone_property_edit_id')) !!}
                            @endif


                            <div class="form-group text-right">
                                <a href="javascript:void(0)" class="btn btn-default" onclick="onClickPhoneNumberSave()">Phone Number Save/Edit</a>
                                <a href="javascript:void(0)" class="btn btn-default" onclick="onClickPhoneNumberCancel()">Cancel</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="property-phone-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Phone Type</th>
                            <th>Area Code</th>
                            <th>Phone Number</th>
                            <th>Ext</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($property_phones as $key_property_phone => $value_property_phone)
                                <tr id="property_phone_tr-{{$key_property_phone}}">
                                    <td><input type="radio" name="phone_type_radio" value="{{$value_property_phone->id}}" @if(isset($property_phone) && $property_phone->id == $key_property_phone+1) checked @elseif($key_property_phone == 0) checked @endif></td>
                                    <td>{{$value_property_phone->property_phone_type->name}}</td>
                                    <td>{{ $value_property_phone->area_code }}</td>
                                    <td>{{ $value_property_phone->phone_number }} </td>
                                    <td>{{ $value_property_phone->phone_ext }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

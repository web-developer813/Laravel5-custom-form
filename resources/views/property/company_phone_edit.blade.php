{!! Form::open(array('route' =>array('property.company.phone.store'), 'method' =>'post', 'id' =>'propertyCompanyPhoneStoreForm')) !!}
<div class="form-group">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            @if(isset($property_company_phone))
                {!! Form::select('phone_type_id', $property_phone_types, old('phone_type_id', $property_company_phone->phone_type_id), ['class' => 'input-text input-text-select', 'id' =>'company_phone_type_id']) !!}
            @else
                {!! Form::select('phone_type_id', $property_phone_types, old('phone_type_id'), ['class' => 'input-text input-text-select', 'id' =>'company_phone_type_id']) !!}
            @endif
            {!! Form::label('company_phone_type_id', 'Phone Type', ['class' =>'label-helper label-helper-change']) !!}
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            @if(isset($property_company_phone))
                {!! Form::text('area_code', old('area_code',$property_company_phone->area_code) , ['class' => 'input-text', 'id' =>'company_area_code']) !!}
            @else
                {!! Form::text('area_code', old('area_code') , ['class' => 'input-text', 'id' =>'company_area_code']) !!}
            @endif
            {!! Form::label('company_area_code', 'Area Code', ['class' =>'label-helper label-helper-change']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            @if(isset($property_company_phone))
                {!! Form::text('phone_number', old('phone_number',$property_company_phone->phone_number) , ['class' => 'input-text', 'id' =>'company_phone_number']) !!}
            @else
                {!! Form::text('phone_number', old('phone_number') , ['class' => 'input-text', 'id' =>'company_phone_number']) !!}
            @endif
            {!! Form::label('company_phone_number', 'Phone Number', ['class' =>'label-helper label-helper-change']) !!}
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            @if(isset($property_company_phone))
                {!! Form::text('phone_ext', old('phone_ext',$property_company_phone->phone_ext) , ['class' => 'input-text', 'id' =>'company_phone_ext']) !!}
            @else
                {!! Form::text('phone_ext', old('phone_ext') , ['class' => 'input-text', 'id' =>'company_phone_ext']) !!}
            @endif
            {!! Form::label('company_phone_ext', 'Phone Ext', ['class' =>'label-helper label-helper-change']) !!}
        </div>
    </div>
</div>
{!! Form::hidden('property_id', $property->id, array('id'=>'company_phone_property_id')) !!}
    @if(isset($property_management_company))
        {!! Form::hidden('property_company_id',$property_management_company->id, array('id'=>'property_assign_company_id')) !!}
    @else
        {!! Form::hidden('property_company_id',null, array('id'=>'property_assign_company_id')) !!}
    @endif

@if(isset($property_company_phone))
    {!! Form::hidden('property_company_phone_id', $property_company_phone->id , array('id'=>'company_phone_property_edit_id')) !!}
@else
    {!! Form::hidden('property_company_phone_id', null , array('id'=>'company_phone_property_edit_id')) !!}
@endif


<div class="form-group text-right">
    <a href="javascript:void(0)" class="btn btn-default" onclick="onClickCompanyPhoneNumberSave()">Phone Number Save/Edit</a>
    <a href="javascript:void(0)" class="btn btn-default" onclick="onClickCompanyPhoneNumberCancel()">Cancel</a>
</div>
{!! Form::close() !!}
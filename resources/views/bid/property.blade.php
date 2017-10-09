<div class="form-group form-group-change">
    {!! Form::text('property_name', old('property_name') , ['class' => 'input-text', 'required' => 'required', 'id' =>'property_name']) !!}
    {!! Form::label('property_name', 'Property Name', ['class' =>'label-helper']) !!}
</div>
<div class="form-group form-group-change">
    {!! Form::text('property_street', old('property_street') , ['class' => 'input-text', 'id' =>'property_street']) !!}
    {!! Form::label('property_street', 'Street Address', ['class' =>'label-helper']) !!}
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            {!! Form::text('property_city', old('property_city') , ['class' => 'input-text', 'id' =>'property_city']) !!}
            {!! Form::label('property_city', 'City', ['class' =>'label-helper label-helper-change']) !!}
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 form-group-change">
            {!! Form::text('property_state', old('property_state') , ['class' => 'input-text', 'id' =>'property_state']) !!}
            {!! Form::label('property_state', 'State', ['class' =>'label-helper label-helper-change']) !!}
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 form-group-change">
            {!! Form::text('property_zip', old('property_zip') , ['class' => 'input-text', 'id' =>'property_zip']) !!}
            {!! Form::label('property_zip', 'Zip', ['class' =>'label-helper label-helper-change']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            {!! Form::text('property_phone', old('property_phone') , ['class' => 'input-text', 'id' =>'property_phone']) !!}
            {!! Form::label('property_phone', 'Property Phone', ['class' =>'label-helper label-helper-change']) !!}
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            {!! Form::text('property_fax', old('property_fax') , ['class' => 'input-text', 'id' =>'property_fax']) !!}
            {!! Form::label('property_fax', 'Property Fax', ['class' =>'label-helper label-helper-change']) !!}
        </div>
    </div>
</div>
<div class="form-group form-group-change">
    {!! Form::text('contact', old('contact') , ['class' => 'input-text', 'required' => 'required', 'id' =>'contact']) !!}
    {!! Form::label('contact', 'Contact', ['class' =>'label-helper']) !!}
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            {!! Form::text('contact_phone', old('contact_phone') , ['class' => 'input-text', 'id' =>'contact_phone']) !!}
            {!! Form::label('contact_phone', 'Contact Phone', ['class' =>'label-helper label-helper-change']) !!}
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            {!! Form::text('contact_fax', old('contact_fax') , ['class' => 'input-text', 'id' =>'contact_fax']) !!}
            {!! Form::label('contact_fax', 'Contact Fax', ['class' =>'label-helper label-helper-change']) !!}
        </div>
    </div>
</div>
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
<div class="form-group">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            {!! Form::text('management_company_phone', old('management_company_phone') , ['class' => 'input-text', 'id' =>'management_company_phone']) !!}
            {!! Form::label('management_company_phone', 'Management Phone', ['class' =>'label-helper label-helper-change']) !!}
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            {!! Form::text('management_company_fax', old('management_company_fax') , ['class' => 'input-text', 'id' =>'management_company_fax']) !!}
            {!! Form::label('management_company_fax', 'Management Fax', ['class' =>'label-helper label-helper-change']) !!}
        </div>
    </div>
</div>
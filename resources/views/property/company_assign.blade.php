<div class="form-group form-group-change">
    @if(isset($property_company))
        {!! Form::text('management_company', old('management_company',$property_company->management_company) , ['class' => 'input-text', 'required' => 'required', 'id' =>'management_company']) !!}
    @else
        {!! Form::text('management_company', old('management_company') , ['class' => 'input-text', 'required' => 'required', 'id' =>'management_company']) !!}
    @endif
    {!! Form::label('management_company', 'Management Company', ['class' =>'label-helper']) !!}
</div>
<div class="form-group form-group-change">
    @if(isset($property_company))
        {!! Form::text('management_company_street', old('management_company_street',$property_company->management_company_street) , ['class' => 'input-text', 'id' =>'management_company_street']) !!}
    @else
        {!! Form::text('management_company_street', old('management_company_street') , ['class' => 'input-text', 'id' =>'management_company_street']) !!}
    @endif
    {!! Form::label('management_company_street', 'Street Address', ['class' =>'label-helper']) !!}
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            @if(isset($property_company))
                {!! Form::text('management_company_city', old('management_company_city',$property_company->management_company_city) , ['class' => 'input-text', 'id' =>'management_company_city']) !!}
            @else
                {!! Form::text('management_company_city', old('management_company_city') , ['class' => 'input-text', 'id' =>'management_company_city']) !!}
            @endif
            {!! Form::label('management_company_city', 'City', ['class' =>'label-helper label-helper-change']) !!}
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 form-group-change">
            @if(isset($property_company))
                {!! Form::text('management_company_state', old('management_company_state',$property_company->management_company_state) , ['class' => 'input-text', 'id' =>'management_company_state']) !!}
            @else
                {!! Form::text('management_company_state', old('management_company_state') , ['class' => 'input-text', 'id' =>'management_company_state']) !!}
            @endif
            {!! Form::label('management_company_state', 'State', ['class' =>'label-helper label-helper-change']) !!}
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 form-group-change">
            @if(isset($property_company))
                {!! Form::text('management_company_zip', old('management_company_zip',$property_company->management_company_zip) , ['class' => 'input-text', 'id' =>'management_company_zip']) !!}
            @else
                {!! Form::text('management_company_zip', old('management_company_zip') , ['class' => 'input-text', 'id' =>'management_company_zip']) !!}
            @endif
            {!! Form::label('management_company_zip', 'Zip', ['class' =>'label-helper label-helper-change']) !!}

        </div>
    </div>
</div>
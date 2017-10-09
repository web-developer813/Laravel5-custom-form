@extends('main')
@section('content')
    <div class="row margin-bottom-50">
        <h1 style="text-align: center">Edit Property</h1>
    </div>
    {!! Form::open(array('route' =>array('prototypes.update',$property->id), 'method' =>'put')) !!}
    <div class="row margin-bottom-50">
        <!-- Left Section  Start-->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                {!! Form::text('requestor_name', old('requestor_name', $property->requestor_name) , ['class' => 'form-control', 'required' => 'required','placeholder'=>"Requestor Name"]) !!}
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('requestor_phone', old('requestor_phone', $property->requestor_phone) , ['class' => 'form-control', 'required' => 'required','placeholder'=>"Requestor Phone"]) !!}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('requestor_fax', old('requestor_fax', $property->requestor_fax) , ['class' => 'form-control','placeholder'=>"Requestor Fax"]) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::text('scope', old('scope', $property->scope) , ['class' => 'form-control', 'required' => 'required','placeholder'=>"Scope"]) !!}
            </div>
            <div class="form-group">
                {!! Form::textarea('details', old('details', $property->details), ['class' => 'form-control','placeholder'=>"Details"])!!}
            </div>
            <div class="form-group">
                {!! Form::textarea('comment', old('comment'), ['class' => 'form-control','placeholder'=>"Comment"])!!}
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        {!! Form::select('source_id', $sources, old('source_id', $property->source_id), ['class' => 'form-control']) !!}
                        @if ($errors->has('source_id'))
                            <span class="help-block">
                              <strong>{{ $errors->first('source_id') }}</strong>
                          </span>
                        @endif
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        {!! Form::select('bid_statuses_id', $bidStatus, old('bid_statuses_id', $property->bid_statuses_id), ['class' => 'form-control']) !!}
                        @if ($errors->has('bid_statuses_id'))
                            <span class="help-block">
                              <strong>{{ $errors->first('bid_statuses_id') }}</strong>
                          </span>
                        @endif
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <select class="form-control" name="estimator_id">
                            <option value="">Select Estimator</option>
                            @foreach($estimator_users as $key => $estimator_user)
                                <option value="{{$estimator_user->user_id}}" @if($estimator_user->id == $property->estimator_id) selected @endif> {{$estimator_user->users()->first()->first_name ." ". $estimator_user->users()->first()->last_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('estimator_id'))
                            <span class="help-block">
                              <strong>{{ $errors->first('estimator_id') }}</strong>
                          </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class=" form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Assignment Date</label>
                    <div class="col-sm-8">
                       <p class="padding-top-7">{{$property->assign_date}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Assigned By</label>
                    <div class="col-sm-8">
                        <p class="padding-top-7">{{$property->assignBy->first_name." ".$property->assignBy->last_name}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Assigned To</label>
                    <div class="col-sm-8">
                        <p class="padding-top-7">{{$property->estimator->first_name." ". $property->estimator->last_name}}</p>
                    </div>
                </div>
            </div>
            <div class=" form-horizontal">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">Created By</label>
                            <div class="col-sm-8">
                                <p class="padding-top-7">{{$property->assignBy->first_name." ".$property->assignBy->last_name}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">Created  Date</label>
                            <div class="col-sm-8">
                                <p class="padding-top-7">{{substr($property->created_at,0,10)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">Edited By</label>
                            <div class="col-sm-8">
                                <p class="padding-top-7">{{$property->editor->first_name." ".$property->editor->last_name}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">Edit  Date</label>
                            <div class="col-sm-8">
                                <p class="padding-top-7">{{substr($property->updated_at,0,10)}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Edit">
                <a href="{{URL::route('prototypes')}}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
        <!-- Left Section End-->
        <!-- Right Section  Start-->
        <div class="col-md-6 col-sm-12 col-xs-12 content-tab">
            <div class="form-group form-group-change">
                {!! Form::text('property_name', old('property_name',$property->property_name) , ['class' => 'input-text', 'required' => 'required', 'id' =>'property_name']) !!}
                {!! Form::label('property_name', 'Property Name', ['class' =>'label-helper']) !!}
            </div>
            <div class="form-group form-group-change">
                {!! Form::text('property_street', old('property_street',$property->property_street) , ['class' => 'input-text', 'id' =>'property_street']) !!}
                {!! Form::label('property_street', 'Street Address', ['class' =>'label-helper']) !!}
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        {!! Form::text('property_city', old('property_city',$property->property_city) , ['class' => 'input-text', 'id' =>'property_city']) !!}
                        {!! Form::label('property_city', 'City', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 form-group-change">
                        {!! Form::text('property_state', old('property_state',$property->property_state) , ['class' => 'input-text', 'id' =>'property_state']) !!}
                        {!! Form::label('property_state', 'State', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 form-group-change">
                        {!! Form::text('property_zip', old('property_zip',$property->property_zip) , ['class' => 'input-text', 'id' =>'property_zip']) !!}
                        {!! Form::label('property_zip', 'Zip', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        {!! Form::text('property_phone', old('property_phone',$property->property_phone) , ['class' => 'input-text', 'id' =>'property_phone']) !!}
                        {!! Form::label('property_phone', 'Property Phone', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        {!! Form::text('property_fax', old('property_fax' ,$property->property_fax) , ['class' => 'input-text', 'id' =>'property_fax']) !!}
                        {!! Form::label('property_fax', 'Property Fax', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group form-group-change">
                {!! Form::text('contact', old('contact',$property->contact) , ['class' => 'input-text', 'required' => 'required', 'id' =>'contact']) !!}
                {!! Form::label('contact', 'Contact', ['class' =>'label-helper']) !!}
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        {!! Form::text('contact_phone', old('contact_phone',$property->contact_phone) , ['class' => 'input-text', 'id' =>'contact_phone']) !!}
                        {!! Form::label('contact_phone', 'Contact Phone', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        {!! Form::text('contact_fax', old('contact_fax',$property->property_fax) , ['class' => 'input-text', 'id' =>'contact_fax']) !!}
                        {!! Form::label('contact_fax', 'Contact Fax', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group form-group-change">
                {!! Form::text('management_company', old('management_company',$property->management_company) , ['class' => 'input-text', 'required' => 'required', 'id' =>'management_company']) !!}
                {!! Form::label('management_company', 'Management Company', ['class' =>'label-helper']) !!}
            </div>
            <div class="form-group form-group-change">
                {!! Form::text('management_company_street', old('management_company_street',$property->management_company_street) , ['class' => 'input-text', 'id' =>'management_company_street']) !!}
                {!! Form::label('management_company_street', 'Street Address', ['class' =>'label-helper']) !!}
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        {!! Form::text('management_company_city', old('management_company_city',$property->management_company_city) , ['class' => 'input-text', 'id' =>'management_company_city']) !!}
                        {!! Form::label('management_company_city', 'City', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 form-group-change">
                        {!! Form::text('management_company_state', old('management_company_state',$property->management_company_state) , ['class' => 'input-text', 'id' =>'management_company_state']) !!}
                        {!! Form::label('management_company_state', 'State', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 form-group-change">
                        {!! Form::text('management_company_zip', old('management_company_zip',$property->management_company_zip) , ['class' => 'input-text', 'id' =>'management_company_zip']) !!}
                        {!! Form::label('management_company_zip', 'Zip', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        {!! Form::text('management_company_phone', old('management_company_phone',$property->management_company_phone) , ['class' => 'input-text', 'id' =>'management_company_phone']) !!}
                        {!! Form::label('management_company_phone', 'Management Phone', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        {!! Form::text('management_company_fax', old('management_company_fax',$property->management_company_fax) , ['class' => 'input-text', 'id' =>'management_company_fax']) !!}
                        {!! Form::label('management_company_fax', 'Management Fax', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                </div>
            </div>
        </div>

    {!! Form::hidden('assign_id', 1) !!}
    {!! Form::hidden('editor_id',1) !!}
    {!! Form::hidden('assign_date', date("Y-m-d")) !!}
    <!-- Right Section End-->
    </div>
    {!! Form::close() !!}
@endsection
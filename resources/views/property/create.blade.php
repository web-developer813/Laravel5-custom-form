    <div class="row margin-bottom-50">
        <!-- Right Section  Start-->
        <div class="col-md-12 col-sm-12 col-xs-12 content-tab margin-bottom-40" id="newPropertyDiv">
            <div class="alert alert-success" id="successAddPropertyMessage">
            </div>
            <div class="alert alert-danger" id="errorAddPropertyMessage">
            </div>
            {!! Form::open(array('route' =>array('property.store'), 'method' =>'post', 'id' =>'propertyAddNewForm')) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        @if(isset($property))
                            {!! Form::text('property_name', old('property_name',$property->property_name) , ['class' => 'input-text', 'id' =>'new_property_name']) !!}
                        @else
                            {!! Form::text('property_name', old('property_name') , ['class' => 'input-text', 'id' =>'new_property_name']) !!}
                        @endif
                        {!! Form::label('new_property_name', 'Property Name', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        @if(isset($property))
                            {!! Form::select('property_type_id', $property_types, old('property_type_id',$property->property_type_id), ['class' => 'input-text input-text-select', 'id' =>'new_property_type']) !!}
                        @else
                            {!! Form::select('property_type_id', $property_types, old('property_type_id'), ['class' => 'input-text input-text-select', 'id' =>'new_property_type']) !!}
                        @endif
                        {!! Form::label('new_property_type', 'Property Type', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group form-group-change">
                @if(isset($property))
                    {!! Form::text('property_street', old('property_street',$property->property_street) , ['class' => 'input-text', 'id' =>'new_property_street']) !!}
                @else
                    {!! Form::text('property_street', old('property_street') , ['class' => 'input-text', 'id' =>'new_property_street']) !!}
                @endif
                {!! Form::label('new_property_street', 'Street Address', ['class' =>'label-helper']) !!}
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        @if(isset($property))
                            {!! Form::text('property_city', old('property_city',$property->property_city) , ['class' => 'input-text', 'id' =>'new_property_city']) !!}
                        @else
                            {!! Form::text('property_city', old('property_city') , ['class' => 'input-text', 'id' =>'new_property_city']) !!}
                        @endif
                        {!! Form::label('new_property_city', 'City', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 form-group-change">
                        @if(isset($property))
                            {!! Form::text('property_state', old('property_state',$property->property_state) , ['class' => 'input-text', 'id' =>'new_property_state']) !!}
                        @else
                            {!! Form::text('property_state', old('property_state') , ['class' => 'input-text', 'id' =>'new_property_state']) !!}
                        @endif
                        {!! Form::label('new_property_state', 'State', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 form-group-change">
                        @if(isset($property))
                            {!! Form::text('property_zip', old('property_zip',$property->zip) , ['class' => 'input-text', 'id' =>'new_property_zip']) !!}
                        @else
                            {!! Form::text('property_zip', old('property_zip') , ['class' => 'input-text', 'id' =>'new_property_zip']) !!}
                        @endif
                        {!! Form::label('new_property_zip', 'Zip', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        @if(isset($property))
                            {!! Form::text('property_country', old('property_country',$property->property_country) , ['class' => 'input-text', 'id' =>'new_property_phone']) !!}
                        @else
                            {!! Form::text('property_country', old('property_country') , ['class' => 'input-text', 'id' =>'new_property_phone']) !!}
                        @endif
                        {!! Form::label('new_property_phone', 'Country', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
                        @if(isset($property))
                            {!! Form::select('mail_to_type_id', $mail_to_types, old('mail_to_type_id',$property->mail_to_type_id), ['class' => 'input-text input-text-select', 'id' =>'new_property_type_id']) !!}
                        @else
                            {!! Form::select('mail_to_type_id', $mail_to_types, old('mail_to_type_id'), ['class' => 'input-text input-text-select', 'id' =>'new_property_type_id']) !!}
                        @endif
                        {!! Form::label('new_property_type_id', 'Mail To Type', ['class' =>'label-helper label-helper-change']) !!}
                    </div>
                </div>
            </div>
            @if(isset($property))
                {!! Form::hidden('property_id', $property->id, array('id'=>'property_id')) !!}
            @else
                {!! Form::hidden('property_id', null, array('id'=>'property_id')) !!}
            @endif
            {!! Form::close() !!}
        </div>
        <div class="col-md-12 border-bottom-2-soild margin-bottom-30 " id="phoneImportDiv" style="display: none"></div>
        <div class="col-md-12 border-bottom-2-soild margin-bottom-30" id="contactImportDiv" style="display: none"></div>
        <div class="col-md-12 border-bottom-2-soild margin-bottom-30" id="commentImportDiv" style="display: none"></div>
        <div class="col-md-12 border-bottom-2-soild margin-bottom-30" id="companyImportDiv" style="display: none"></div>
        <div class="col-md-12 border-bottom-2-soild margin-bottom-30" id="companyPhoneImportDiv" style="display: none"></div>
        <div class="col-md-12 border-bottom-2-soild margin-bottom-30" id="companyContactImportDiv" style="display: none"></div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group text-right">
                <a href="javascript:void(0)" class="btn btn-default" onclick = "onAddNewProperty()" id="onAddNewProperty">@if(isset($property)) Edit @else Save @endif</a>
                <a href="javascript:void(0)" class="btn btn-default" onclick = "onAssignProperty()">Cancel</a>
            </div>
        </div>
    </div>
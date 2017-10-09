
{!! Form::open(array('route' =>array('property.contact.store'), 'method' =>'post', 'id' =>'propertyContactStoreForm')) !!}
<div class="form-group">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            @if(isset($property_contact))
                {!! Form::select('contact_type_id', $contact_types, old('contact_type_id', $property_contact->contact_type_id), ['class' => 'input-text input-text-select','required'=>'required', 'id' =>'contact_type_id']) !!}
            @else
                {!! Form::select('contact_type_id', $contact_types, old('contact_type_id'), ['class' => 'input-text input-text-select', 'required'=>'required', 'id' =>'contact_type_id']) !!}
            @endif
            {!! Form::label('contact_type_id', 'Contact Type', ['class' =>'label-helper label-helper-change']) !!}
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            @if(isset($property_contact))
                {!! Form::text('first_name', old('first_name',$property_contact->first_name) , ['class' => 'input-text','required'=>'required', 'id' =>'contact_first_name']) !!}
            @else
                {!! Form::text('first_name', old('first_name') , ['class' => 'input-text','required'=>'required', 'id' =>'contact_first_name']) !!}
            @endif
            {!! Form::label('contact_first_name', 'First Name', ['class' =>'label-helper label-helper-change']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            @if(isset($property_contact))
                {!! Form::text('last_name', old('last_name',$property_contact->last_name) , ['class' => 'input-text','required'=>'required', 'id' =>'contact_last_name']) !!}
            @else
                {!! Form::text('last_name', old('last_name') , ['class' => 'input-text','required'=>'required', 'id' =>'contact_last_name']) !!}
            @endif
            {!! Form::label('contact_last_name', 'Last Name', ['class' =>'label-helper label-helper-change']) !!}
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 form-group-change">
            @if(isset($property_contact))
                {!! Form::text('email', old('email',$property_contact->email) , ['class' => 'input-text','required'=>'required', 'id' =>'contact_email']) !!}
            @else
                {!! Form::text('email', old('email') , ['class' => 'input-text','required'=>'required', 'id' =>'contact_email']) !!}
            @endif
            {!! Form::label('contact_email', 'Email', ['class' =>'label-helper label-helper-change']) !!}
        </div>
    </div>
</div>
{!! Form::hidden('property_id', $property->id, array('id'=>'phone_contact_id')) !!}
@if(isset($property_contact))
    {!! Form::hidden('property_contact_id', $property_contact->id , array('id'=>'property_contact_edit_id')) !!}
@else
    {!! Form::hidden('property_contact_id', null , array('id'=>'property_contact_edit_id')) !!}
@endif


<div class="form-group text-right">
    <a href="javascript:void(0)" class="btn btn-default" onclick="onClickPropertyContactSave()">Contact Save/Edit</a>
    <a href="javascript:void(0)" class="btn btn-default" onclick="onClickPropertyContactCancel()">Cancel</a>
</div>
{!! Form::close() !!}
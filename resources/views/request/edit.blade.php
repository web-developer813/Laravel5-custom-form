@extends('main')
@section('content')
    <div class="row margin-bottom-50">
        <h1 style="text-align: center">Edit Request</h1>
    </div>
    <div class="row margin-bottom-20">
        <div class="col-md-12">
            <div class="form-group text-right">
                <a href="javascript:void(0)" class="btn btn-primary text-right" onclick="onAssignProperty()">Assign Property</a>
            </div>
        </div>
    </div>

    <div class="row margin-bottom-50">
        <!-- Left Section  Start-->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-md-12 margin-bottom-50">
                    {!! Form::open(array('route' =>array('request.store'), 'method' =>'post')) !!}
                    <div class="form-group">
                        {!! Form::text('requestor_name', old('requestor_name',$requestModel->requestor_name) , ['class' => 'form-control', 'required' => 'required','placeholder'=>"Requestor Name"]) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('requestor_phone', old('requestor_phone',$requestModel->requestor_phone) , ['class' => 'form-control', 'required' => 'required','placeholder'=>"Requestor Phone"]) !!}
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('requestor_fax', old('requestor_fax',$requestModel->requestor_fax) , ['class' => 'form-control','placeholder'=>"Requestor Fax"]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::text('scope', old('scope',$requestModel->scope) , ['class' => 'form-control', 'required' => 'required','placeholder'=>"Scope"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('details', old('details',$requestModel->details), ['class' => 'form-control','placeholder'=>"Details",'rows'=>'5'])!!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                {!! Form::select('source_id', $sources, old('source_id',$requestModel->source_id), ['class' => 'form-control']) !!}
                                @if ($errors->has('source_id'))
                                    <span class="help-block">
                                  <strong>{{ $errors->first('source_id') }}</strong>
                              </span>
                                @endif
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                {!! Form::select('bid_statuses_id', $bidStatus, old('bid_statuses_id',$requestModel->bid_statuses_id), ['class' => 'form-control']) !!}
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
                                        <option value="{{$estimator_user->user_id}}" @if($estimator_user->user_id == $requestModel->estimator_id) selected @endif> {{$estimator_user->users()->first()->first_name ." ". $estimator_user->users()->first()->last_name }}</option>
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
                    {!! Form::hidden('editor_id',1) !!}
                    @if(isset($requestModel))
                        {!! Form::hidden('request_id', $requestModel->id, ['id' =>'request_id']) !!}
                    @endif
                    @if(isset($property))
                        {!! Form::hidden('property_id',$property->id,['id' =>'assigned_property_id']) !!}
                    @else
                        {!! Form::hidden('property_id',0,['id' =>'assigned_property_id']) !!}
                    @endif
                    @if(isset($property_phone))
                        {!! Form::hidden('property_phone_id',$property_phone->id,['id' =>'assigned_property_phone_id']) !!}
                    @else
                        {!! Form::hidden('property_phone_id',0,['id' =>'assigned_property_phone_id']) !!}
                    @endif
                    @if(isset($property_contact))
                        {!! Form::hidden('property_contact_id',$property_contact->id,['id' =>'assigned_property_contact_id']) !!}
                    @else
                        {!! Form::hidden('property_contact_id',0,['id' =>'assigned_property_contact_id']) !!}
                    @endif
                    @if(isset($property_contact_phone))
                        {!! Form::hidden('property_contact_phone_id',$property_contact_phone->id,['id' =>'assigned_property_contact_phone_id']) !!}
                    @else
                        {!! Form::hidden('property_contact_phone_id',0,['id' =>'assigned_property_contact_phone_id']) !!}
                    @endif
                    @if(isset($property_management_company))
                        {!! Form::hidden('property_company_id',$property_management_company->id,['id' =>'assigned_property_company_id']) !!}
                    @else
                        {!! Form::hidden('property_company_id',0,['id' =>'assigned_property_company_id']) !!}
                    @endif
                    @if(isset($property_management_company_phone))
                        {!! Form::hidden('property_company_phone_id',$property_management_company_phone->id,['id' =>'assigned_property_company_phone_id']) !!}
                    @else
                        {!! Form::hidden('property_company_phone_id',0,['id' =>'assigned_property_company_phone_id']) !!}
                    @endif
                    @if(isset($property_management_company_contact))
                        {!! Form::hidden('property_company_contact_id',$property_management_company_contact->id,['id' =>'assigned_property_company_contact_id']) !!}
                    @else
                        {!! Form::hidden('property_company_contact_id',0,['id' =>'assigned_property_company_contact_id']) !!}
                    @endif
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save/Edit">
                        <a href="{{URL::route('request')}}" class="btn btn-danger">Cancel</a>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-12" id="requestEditDiv">
                    @include('request.comment')
                </div>
            </div>

        </div>
        <!-- Left Section End-->
        <!-- Right Section  Start-->
        <div class="col-md-6 col-sm-12 col-xs-12 content-tab">
            <div class="row">
                <div class="col-md-12 margin-bottom-50">
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
                </div>
                <div class="col-md-12 margin-bottom-50">
                    @include('request.file')
                </div>
            </div>
        </div>
        <!-- Right Section End-->
    </div>



    <!-- Assign property -->

    <div class="modal fade" id="assignPropertyModal" role="dialog">
        <div class="modal-dialog  modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Assign Property</h4>
                </div>
                <div class="modal-body" id="assignPropertyModalBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="requestCommentModal" role="dialog">
        <div class="modal-dialog  modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="requestCommentModalTitle">Add Comment</h4>
                </div>
                <div class="modal-body" id="requestCommentModalBody">
                    <div class="row">
                        <div class="col-md-12 margin-bottom-30" id="addEditRequestCommentDiv">
                            <div class="alert alert-danger" id="errorAddEditRequestCommentMessage">
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="requestAboveCommentStoreForm">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="requestFileModal" role="dialog">
        <div class="modal-dialog  modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="requestFileModalTitle">Add Comment</h4>
                </div>
                <div class="modal-body" id="requestFileModalBody">
                    <div class="row">
                        <div class="col-md-12 margin-bottom-30" id="addEditRequestFileDiv">
                            <div class="alert alert-danger" id="errorAddEditRequestFileMessage">
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="requestAboveFileStoreForm">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('property.common')
    <script type="text/javascript">
        $( document ).ready(function() {
            $("#request-comment-table").DataTable();
            $("#request-file-table").DataTable();
        });
        
        function onClickRequestAddComment(){
            $.ajax({
                url: '{{ route('requests.comment.edit') }}',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'request_id' : $("#request_id").val()
                },
                success: function (data) {
                    if (data.result == "success") {
                        $("#requestCommentModalTitle").html("Add Comment");
                        $("#requestAboveCommentStoreForm").empty();
                        $("#requestAboveCommentStoreForm").append(data.comment_list);
                        $("#requestCommentModal").modal('show');
                    }
                }
            });
        }
        function onClickPropertyCommentSave() {
            $("#requestCommentStoreForm").ajaxForm({
                success:function(data){
                    if(data.result == "success"){
                        $("#requestCommonTableBody").empty();
                        $("#requestCommonTableBody").append(data.comment_list);
                        $("#request-comment-table").DataTable();
                        $("#requestCommentModal").modal('hide');
                    }else{
                        $("#errorAddEditRequestCommentMessage").html(data.message);
                        $("#errorAddEditRequestCommentMessage").show();
                    }
                }
            }).submit();
        }
        function  onClickPropertyCommentCancel() {
            $("#requestCommentModal").modal('hide');
        }
        function onClickRequestEditComment(){
            var request_comment = $('input[name=request_comment_radio]:checked').val();
            if(request_comment == "" ){
                alert("Please select comment");
                return;
            }else{
                $.ajax({
                    url: '{{ route('requests.comment.edit') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'request_comment':request_comment,
                        'request_id' : $("#request_id").val()
                    },
                    success: function (data) {
                        if (data.result == "success") {
                            $("#requestCommentModalTitle").html("Add Comment");
                            $("#requestAboveCommentStoreForm").empty();
                            $("#requestAboveCommentStoreForm").append(data.comment_list);
                            $("#requestCommentModal").modal('show');
                        }
                    }
                });
            }
        }
        
        function onClickRequestAddFile() {
            
        }
    </script>
@endsection
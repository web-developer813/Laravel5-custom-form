@extends('main')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            var date_input=$('input[name="date"]'); //our date input has the name "date"
            date_input.datepicker();
        })
    </script>
@endsection

@section('content')
    <div class="row margin-bottom-50">
        <h1 style="text-align: center">Create Bid</h1>
    </div>
    <div class="row margin-bottom-50">
        <!-- Left Section  Start-->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="row margin-bottom-40">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    {!! Form::select('bid_type', $bidTypes, old('bid_type'), ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
                </div>
                <div class="col-ms-4 col-sm-4 col-xs-12">
                    <a href="javascript:void(0)" class="btn btn-primary">View Bid Form</a>
                </div>
            </div>
            <div class="row margin-bottom-40">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    {!! Form::select('bid_template', $bidTemplates, old('bid_template'), ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <span>Archive Bid </span><input type="radio" name="archive_bid" value="1">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a href="javascript:void(0)" class="btn btn-primary">Approve Bid</a>
                </div>
            </div>
            <div class="row margin-bottom-50">
                <div class="col-md-12 text-right">
                    <span>Approved By:Full Name Last Name</span> <br>
                    <span>Approved Date:Date/Time Stamp</span>
                </div>
            </div>
            @include('bid.line')
            @include('bid.contact')
            @include('bid.file')
            @include('bid.comment')
            @include('bid.notification')
        </div>
        <!-- Left Section  End-->
        <!-- Right Section  Start-->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="row margin-bottom-50">
                <div class="col-md-12 text-right">
                    <a href="javascript:void(0)" class="btn btn-primary">Create Job</a>
                </div>
            </div>
            <div class="row margin-bottom-50">
                <div class="col-md-12">
                    <div class="form-group form-group-change">
                        {!! Form::text('scope', old('scope') , ['class' => 'input-text',  'id' =>'bid_scope']) !!}
                        {!! Form::label('bid_scope', 'Scope', ['class' =>'label-helper']) !!}
                    </div>
                    <div class="form-group form-group-change">
                        {!! Form::text('details', old('details') , ['class' => 'input-text',  'id' =>'bid_details']) !!}
                        {!! Form::label('bid_details', 'Details', ['class' =>'label-helper']) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group-change">
                                {!! Form::text('source', old('source') , ['class' => 'input-text', 'id' =>'bid_source']) !!}
                                {!! Form::label('bid_source', 'Source', ['class' =>'label-helper label-helper-change']) !!}
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group-change">
                                {!! Form::text('status', old('status') , ['class' => 'input-text', 'id' =>'bid_status']) !!}
                                {!! Form::label('bid_status', 'Status', ['class' =>'label-helper label-helper-change']) !!}
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group-change">
                                {!! Form::text('estimator', old('estimator') , ['class' => 'input-text', 'id' =>'bid_estimator']) !!}
                                {!! Form::label('bid_estimator', 'Estimator', ['class' =>'label-helper label-helper-change']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom-30">
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <a href="javascript:void(0)" class="btn btn-primary text-right" onclick="onAssignProperty()">Assign Property</a>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom-50">
                <div class="col-md-12">
                    @include('bid.property')
                </div>
            </div>

            <div class="row margin-bottom-30">
                <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                    <span>Created By:Full Name Last Name</span> <br>
                    <span>Created Date:Date/Time Stamp</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                    <span>Edited By:Full Name Last Name</span> <br>
                    <span>Edited Date:Date/Time Stamp</span>
                </div>
            </div>
        </div>
        <!-- Right Section  End-->
    </div>
@endsection
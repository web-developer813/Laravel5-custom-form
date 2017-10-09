@extends('main')
@section('content')
    <div class="row margin-bottom-50">
        <h1 style="text-align: center">Requests</h1>
    </div>
    <div class="alert alert-success alert-dismissibl fade in" id="success_alert_div" style="display: none;">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <p id="success_alert_p_content">

        </p>
    </div>
    <div class="row">
        <div class="col-sm-12 text-right margin-bottom-30">
            <a href="{{URL::route('request.create')}}" class="btn btn-primary">Create</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Requestor Name</th>
                                <th>Requestor Phone</th>
                                <th>Assign By</th>
                                <th>Assign To</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requests as $key =>$value_request)
                                <tr id="tr-{{$value_request->id}}">
                                    <td>{{$value_request->id}}</td>
                                    <td>{{$value_request->requestor_name}}</td>
                                    <td>{{$value_request->requestor_phone}}</td>
                                    <td>{{$value_request->assignBy->first_name." ".$value_request->assignBy->last_name}}</td>
                                    <td>{{$value_request->estimator->first_name." ".$value_request->estimator->last_name}}</td>
                                    <td>
                                        <a href="{{ URL::route('request.edit', $value_request->id)  }}" class="btn btn-sm btn-info">
                                            Edit
                                        </a>
                                        {!! Form::open(['route' => ['request.destroy', $value_request->id],'method' => 'DELETE', 'style'=>'display:inline-block'] ) !!}
                                        {!! Form::hidden('id', $value_request->id) !!}
                                        {!! Form::button('Delete', ['class' => 'btn btn-sm btn-danger','onClick' => "onDeleteConfirm(this)" ]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">{{ $requests->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
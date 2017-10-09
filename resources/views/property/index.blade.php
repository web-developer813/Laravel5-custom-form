@extends('main')
@section('content')
    <div class="row margin-bottom-50">
        <h1 style="text-align: center">Properties</h1>
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
            <a href="{{URL::route('prototypes.create')}}" class="btn btn-primary">Create</a>
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
                                <th>Requestor Name</th>
                                <th>Assign By</th>
                                <th>Assign To</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($prototypes as $key =>$prototype)
                                    <tr id="tr-{{$prototype->id}}">
                                        <td>{{$prototype->id}}</td>
                                        <td>{{$prototype->property_name}}</td>
                                        <td>{{$prototype->requestor_name}}</td>
                                        <td>{{$prototype->assignBy->first_name." ".$prototype->assignBy->last_name}}</td>
                                        <td>{{$prototype->estimator->first_name." ".$prototype->estimator->last_name}}</td>
                                        <td>
                                            <a href="{{ URL::route('prototypes.edit', $prototype->id)  }}" class="btn btn-sm btn-info">
                                                Edit
                                            </a>
                                            {!! Form::open(['route' => ['prototypes.destroy', $prototype->id],'method' => 'DELETE', 'style'=>'display:inline-block'] ) !!}
                                            {!! Form::hidden('id', $prototype->id) !!}
                                            {!! Form::button('Delete', ['class' => 'btn btn-sm btn-danger','onClick' => "onDeleteConfirm(this)" ]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">{{ $prototypes->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
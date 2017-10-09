<div class="col-md-12 margin-bottom-50" id="propertyContacts">
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-20">
                <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-20">
                    <span class="font-weight-900">Property Comments</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right margin-bottom-20">
                    <a href="javascript:void(0)" class="btn btn-default"  onclick="onClickPropertyAddComment()">Add Comment</a>
                    <a href="javascript:void(0)" class="btn btn-default"  onclick="onClickPropertyEditComment()">Edit Comment</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 margin-bottom-30" id="addEditPropertyCommentDiv" style="display: none">
                    <div class="alert alert-danger" id="errorAddEditPropertyCommentMessage">
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="propertyAboveCommentStoreForm">
                            {!! Form::open(array('route' =>array('property.comment.store'), 'method' =>'post', 'id' =>'propertyCommentStoreForm')) !!}
                            <div class="form-group ">
                                <div class="row margin-bottom-30">
                                    <div class="col-md-12 form-group-change">
                                        @if(isset($property_comment))
                                            {{--{!! Form::textarea('details', old('details'), ['class' => 'form-control','placeholder'=>"Details",'rows'=>'5'])!!}--}}
                                            {!! Form::textarea('comment', old('property_comment',$property_comment->comment) , ['class' => 'input-text input-text-select','required'=>'required', 'id' =>'property_comment','rows'=>'5']) !!}
                                        @else
                                            {!! Form::textarea('comment', old('property_comment') , ['class' => 'input-text input-text-select','required'=>'required', 'id' =>'property_comment','rows'=>'5']) !!}
                                        @endif
                                        {!! Form::label('property_comment', 'Comment', ['class' =>'label-helper label-helper-change']) !!}
                                    </div>
                                </div>
                                {!! Form::hidden('property_id', $property->id, array('id'=>'property_comment_id')) !!}
                                @if(isset($property_comment))
                                    {!! Form::hidden('property_comment_id', $property_comment->id , array('id'=>'property_comment_edit_id')) !!}
                                @else
                                    {!! Form::hidden('property_comment_id', null , array('id'=>'property_comment_edit_id')) !!}
                                @endif
                                {!! Form::hidden('creator_id', 1) !!}

                                <div class="form-group text-right">
                                    <a href="javascript:void(0)" class="btn btn-default" onclick="onClickPropertyCommentSave()">Comment Save/Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-default" onclick="onClickPropertyCommentCancel()">Cancel</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="property-comment-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Comment</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($property_comments as $key_property_comment => $value_property_comment)
                            <tr id="property_phone_tr-{{$key_property_comment}}">
                                <td><input type="radio" name="property_comment_radio" value="{{$value_property_comment->id}}" @if(isset($property_comment) && $property_comment->id == $key_property_comment+1) checked @elseif($key_property_comment == 0) checked @endif></td>
                                <td>{{$value_property_comment->comment}}</td>
                                <td>{{ $value_property_comment->creator->first_name. " ".$value_property_comment->creator->last_name }}</td>
                                <td>{{ substr($value_property_comment->created_at,0,10) }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
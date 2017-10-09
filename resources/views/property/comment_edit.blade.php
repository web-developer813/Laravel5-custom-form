{!! Form::open(array('route' =>array('property.comment.store'), 'method' =>'post', 'id' =>'propertyCommentStoreForm')) !!}
<div class="form-group ">
    <div class="row margin-bottom-30" >
        <div class="col-md-12 form-group-change">
            @if(isset($property_comment))
                {{--{!! Form::textarea('details', old('details'), ['class' => 'form-control','placeholder'=>"Details",'rows'=>'5'])!!}--}}
                {!! Form::textarea('comment', old('property_comment',$property_comment->comment) , ['class' => 'input-text input-text-select ','required'=>'required', 'id' =>'property_comment','rows'=>'5']) !!}
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
{!! Form::close() !!}
{!! Form::open(array('route' =>array('requests.comment.store'), 'method' =>'post', 'id' =>'requestCommentStoreForm')) !!}
<div class="form-group ">
    <div class="row margin-bottom-30">
        <div class="col-md-12 form-group-change">
            @if(isset($request_comment))
                {!! Form::textarea('comment', old('comment',$request_comment->comment) , ['class' => 'input-text input-text-select','required'=>'required', 'id' =>'request_comment','rows'=>'5']) !!}
            @else
                {!! Form::textarea('comment', old('comment') , ['class' => 'input-text input-text-select','required'=>'required', 'id' =>'request_comment','rows'=>'5']) !!}
            @endif
            {!! Form::label('request_comment', 'Comment', ['class' =>'label-helper label-helper-change']) !!}
        </div>
    </div>
    {!! Form::hidden('request_id', $requestModel->id, array('id'=>'request_comment_id')) !!}
    @if(isset($request_comment))
        {!! Form::hidden('request_comment_id', $request_comment->id , array('id'=>'request_comment_edit_id')) !!}
    @else
        {!! Form::hidden('request_comment_id', null , array('id'=>'request_comment_edit_id')) !!}
    @endif
    {!! Form::hidden('creator_id', 1) !!}

    <div class="form-group text-right">
        <a href="javascript:void(0)" class="btn btn-default" onclick="onClickPropertyCommentSave()">Comment Save/Edit</a>
        <a href="javascript:void(0)" class="btn btn-default" onclick="onClickPropertyCommentCancel()">Cancel</a>
    </div>
</div>
{!! Form::close() !!}
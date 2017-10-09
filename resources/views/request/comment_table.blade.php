@foreach($request_comments as $key_request_comment => $value_request_comment)
    <tr id="property_phone_tr-{{$key_request_comment}}">
        <td><input type="radio" name="request_comment_radio" value="{{$value_request_comment->id}}" @if(isset($request_comment) && $request_comment->id == $key_request_comment+1) checked @elseif($key_request_comment == 0) checked @endif></td>
        <td>{{$value_request_comment->comment}}</td>
        <td>{{ $value_request_comment->creator->first_name. " ".$value_request_comment->creator->last_name }}</td>
        <td>{{ substr($value_request_comment->created_at,0,10) }} </td>
    </tr>
@endforeach
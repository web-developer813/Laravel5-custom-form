@foreach($properties as $key_property => $value_property)
<tr id="property_tr-{{$key_property}}">
    <td><input type="radio" name="property_radio" value="{{$value_property->id}}" @if(isset($property) && $property->id == $key_property+1) checked @elseif($key_property == 0) checked @endif></td>
    <td>{{$value_property->property_name}}</td>
    <td>{{$value_property->property_street}}</td>
    <td>{{$value_property->property_city}}</td>
    <td>{{$value_property->property_state}}</td>
    <td>{{$value_property->property_zip}}</td>
</tr>
@endforeach
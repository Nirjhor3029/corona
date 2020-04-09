
<option value="{{null}}" hidden>Select {{$data_name}}</option>

@foreach ($datas as $data)
    <option value="{{$data->id}}">{{$data->name}}</option>
@endforeach
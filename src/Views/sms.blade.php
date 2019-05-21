<a href="{{url("sms-admin")}}">show sms</a>
<h1>Sms Contact</h1>
@if(session("message"))
    {{session("message")}}
@elseif(isset($errors))
    @foreach($errors->sms->all() as $message)
        {{$message}}<br>
    @endforeach
@endif
<form action="@if(session("sms")){{url("sms/update")}}/{{session("sms")->id}}@else{{url("sms/create")}}@endif" method="post">
    {{csrf_field()}}
    <input type="text" name="name" placeholder="Enter Your Name"
           value="@if(session("sms")){{session("sms")->name}}@endif">
    <br>
    <input type="text" name="family" placeholder="Enter Your Family"
           value="@if(session("sms")){{session("sms")->family}}@endif">
    <br>
    <input type="text" name="tell" placeholder="Enter Your Tell"
           value="@if(session("sms")){{session("sms")->tell}}@endif">
    <br>
    <input type="submit" name="send" value="send">
</form>
<table border="1">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>family</th>
        <th>tell</th>
        <th>create_at</th>
        <th>edit</th>
        <th>delete</th>
    </tr>
@if(isset($listSms))
    @foreach($listSms as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->family}}</td>
            <td>{{$value->tell}}</td>
            <td>{{$value->created_at}}</td>
            <td><a href="{{url("sms/edit")}}/{{$value->id}}">edit</a></td>
            <td><a href="{{url("sms/delete")}}/{{$value->id}}">delete</a></td>
        </tr>
    @endforeach
@endif
</table>
<h2>Send Sms</h2>
<hr>
@if(session("messageSend"))
    {{session("messageSend")}}
@endif
<form action="{{url("sms/send")}}" method="post">
    {{csrf_field()}}
    <textarea name="message" id="" cols="30" rows="10" placeholder="Enter Message"></textarea>
    <br><br>
    <select name="tell[]" id="" multiple>
        @if(isset($listSms))
            @foreach($listSms as $value)
                <option value="{{$value->tell}}">{{$value->tell}}</option>
            @endforeach
        @endif
    </select>
    <input type="submit" name="send" value="send">
</form>
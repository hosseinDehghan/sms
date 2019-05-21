<h1>Contact Us</h1>
@if(session("message"))
    {{session("message")}}
@elseif(isset($errors))
    @foreach($errors->contactus->all() as $message)
        {{$message}}<br>
    @endforeach
@endif
<form action="{{url("contactus")}}" method="post">
    {{csrf_field()}}
    <input type="text" name="name" placeholder="Enter Your Name">
    <br>
    <input type="text" name="family" placeholder="Enter Your Family">
    <br>
    <input type="text" name="email" placeholder="Enter Your Email">
    <br>
    <textarea name="message" id="" cols="30"
              rows="10" placeholder="Enter Your Message"></textarea>
    <br>
    <input type="submit" name="send" value="send">
</form>
<form action="{{url('valtest')}}" method="POST" enctype='multipart/form-data'>
    @csrf
   
    <br>
    <input type="text" placeholder="Email" name='email'/> <span style="color: red">@error('email'){{$message}} @enderror</span>
   <br>
    <input type="password" placeholder="Password" name='password'/><br>
    <button type="submit">Submit</button>
    
</form>
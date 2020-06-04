@extends('layout')
@section('content')

<h2> Login New User </h2>
<div>
<div class = "col-sm-8">
<form method= "POST" action="login">
@csrf

     <div class="form-group">
    <label> Email</label>
    <input type="text" name="email" class="form-control"  placeholder="Enter Email">
     </div>

     <div class="form-group">
    <label> Password</label>
    <input type="password" name="password" class="form-control"  placeholder="Enter Password">
     </div>

  <button type="submit" class="btn btn-primary">Login</button>

</form>
</div>
</div>
@stop
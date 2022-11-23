@extends('layouts.login')

@section('content')

<form action="/userUpdate" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="text" name="upName" value="{{Auth::user()->username}}">
  <input type="text" name="upMail" value="{{Auth::user()->mail}}">
  <input type="password" name="upPass" value="">
  <input type="password" name="upPass_confirmation" value="">
  <input type="text" name="upBio" value="{{Auth::user()->bio}}">
  <input type="file" name="upFile" value="">
  <input type="submit" value="更新">

</form>

@endsection

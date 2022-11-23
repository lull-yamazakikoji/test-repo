@extends('layouts.login')

@section('content')
<form action="/userSearch">
  <input type="text" name="searchWord">
  <input type="image" src="{{asset('images/post.png')}}">
</form>
<p>検索ワード:@if(!empty($searchWord))
  {{$searchWord}}
@endif</p>
@foreach($users as $user)
{{$user->username}}
@if(Auth::user()->isFollowing($user->id))
<a href="/unfollow/{{$user->id}}">フォロー解除</a>
@else
<a href="/follow/{{$user->id}}">フォローする</a>
@endif
@endforeach

@endsection

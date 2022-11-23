@extends('layouts.login')

@section('content')
@foreach($users as $user)
{{$user->username}}
@endforeach

@foreach($posts as $post)
{{$post->post}}
@endforeach
@endsection

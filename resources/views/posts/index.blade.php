@extends('layouts.login')

@section('content')
<form action="/postCreate" method="POST">
  @csrf
  <input type="text" name="newPost" placeholder="投稿内容を入力してください">
  <input type="image" src="{{ asset('images/post.png')}}">
</form>

@foreach($posts as $post)
{{$post->user->username}}
{{$post->post}}
<a class="js-modal-open" href="" post="{{$post->post}}" post_id="{{$post->id}}"><img src="{{asset('images/edit.png')}}" alt=""></a>
<a href="/postDelete/{{$post->id}}"><img src="{{ asset('images/trash.png')}}" alt=""></a>
@endforeach

 <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/postEdit" method="POST">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>

@endsection

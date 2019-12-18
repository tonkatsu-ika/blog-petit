@extends('layouts/app')
@section('content')

<div class="blogs">

  @foreach($blogs as $blog)
  <div class="blog">
    <div class="blog__blog-info">
      <div class="blog__blog-info__title">
        タイトル：{{ $blog->title }}
      </div>
      <div class="blog__blog-info__user-name">
        ユーザ名：{{ Auth::user()->name }}
      </div>
      <a href="/blog/{{ $blog->id }}">詳細を表示する</a>

    </div>
    <img class="blog__image" src="{{ $blog->image_url }}">
  </div>
  @endforeach

</div>

@endsection

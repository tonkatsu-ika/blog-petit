@extends('layouts/app')
@section('content')

<div class="blogs">

  @foreach($blogs as $blog)
  <div class="blog">
    <div class="blog__blog-info">
      <div class="blog__blog-info__title">
        {{ $blog->title }}
      </div>
      <a href="/blog/{{ $blog->id }}/edit">{{ $blog->id }}</a>

    </div>
    <img class="blog__image" src="{{ $blog->image_url }}">
  </div>
  @endforeach

    <a href="blog/create">
      <button type="button" class="btn btn-default">新規投稿</button>
    </a>

</div>

@endsection

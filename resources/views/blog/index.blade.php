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
        ユーザ名：{{ $blog->user->name }}
      </div>
      <a href="/blog/{{ $blog->id }}">詳細を表示する</a>

    </div>
    <img class="blog__image" src="{{ Storage::url($blog->image_url) }}">
  </div>
  @endforeach

</div>

<div class="pagination"> 
  <div class="pagination__container">
    {{ $blogs->links() }}
  </div>
</div>


@endsection

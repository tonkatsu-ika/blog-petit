@extends('layouts/app');
@section('content');

<div class="blog-show">
  <div class="blog-container">
    <h2 class="blog-container__title">
      タイトル：{{ $blog->title }}
    </h2>
    <div class="blog-container__image">
      <img src="{{ $blog->image_url }}">
    </div>
    <div class="blog-container__author">
      投稿者：{{ $blog->user_id }}
    </div>
    <div class="blog-container__article">
      記事：{{ $blog->article }}
    </div>
  </div>
  <div class="action-container">
    <a class="action-container__edit" href="/blog/{{ $blog->id }}/edit">
      編集する
    </a>
    <div class="action-container__destroy">
      <form action="/blog/{{ $blog->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="action-container__destroy__btn">
          削除する
        </button>
      </form>
    </div>
  </div>
</div>

@endsection

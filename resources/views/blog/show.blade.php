@extends('layouts/app');
@section('content');

<div class="blog-show">
  <div class="blog-container">
    <h2 class="blog-container__title">
      タイトル：{{ $blog->title }}
    </h2>
    @if ($blog->image_url)
    <div class="blog-container__image">
      <img src="{{ Storage::url($blog->image_url) }}">
    </div>
    @endif
    <div class="blog-container__author">
      投稿者：{{ $blog->user->name }}
    </div>
    <div class="blog-container__article">
      記事：{{ $blog->article }}
    </div>
  </div>
  @if (Auth::check())
  @if (Auth::user()->id == $blog->user->id)
  <div class="action-container">
    <a class="btn btn-primary action-container__edit" href="/blog/{{ $blog->id }}/edit">
      編集する
    </a>
    <div class="action-container__destroy">
      <form action="/blog/{{ $blog->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger action-container__destroy__btn">
          削除する
        </button>
      </form>
    </div>
  </div>
  @endif
  @endif
</div>

@endsection

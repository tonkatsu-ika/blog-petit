@extends('layouts/app')
@section('content')

<div class="container ops-main">
  <div class="row">
    <div class="col-md-6">
      <h2>編集画面</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-1">
      <form action="/blog/{{ $blog->id }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="title">ブログのタイトル</label>
          <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
        </div>
        <div class="form-group">
          <label for="article">記事の内容</label>
          <textarea class="form-control" name="article" rows="5">{{ $blog->article }}</textarea>
        </div>
        <button type="submit" class="btn btn-default">更新</button>
        <a href="/blog">一覧画面へ戻る</a>
      </form>
    </div>
  </div>
</div>

@endsection

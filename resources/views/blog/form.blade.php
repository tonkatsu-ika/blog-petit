<div class="container ops-main">
  <div class="row">
    <div class="col-md-6">
      @if($target == 'store')
      <h2>投稿画面</h2>
      @else
      <h2>編集画面</h2>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-1">
      @include('blog/message')
      @if($target == 'store')
      <form action="/blog" method="post">
      @elseif($target == 'update')
      <form action="/blog/{{ $blog->id }}" method="post">
        <input type="hidden" name="_method" value="PUT">
      @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="title">ブログのタイトル</label>
          <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
        </div>
        <div class="form-group">
          <label for="article">記事の内容</label>
          <textarea class="form-control" name="article" rows="5">{{ $blog->article }}</textarea>
        </div>
        @if($target == 'store')
        <button type="submit" class="btn btn-default">新規投稿</button>
        @else
        <button type="submit" class="btn btn-default">更新</button>
        @endif
      </form>
    </div>
    @if($target == 'update')
    <div class="col-md-8 col-md-offset-1">
      <form action="/blog/{{ $blog->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-default">削除</button>
      </form>
    </div>
  @endif
  </div>
  <div class="row">
    <a href="/">一覧画面へ戻る</a>
  </div>
</div>

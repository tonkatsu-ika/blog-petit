<div class="form-container container ops-main">
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
    <div class="col-md-10 col-md-offset-1">
      @include('blog/message')
      @if($target == 'store')
      <form action="{{ action('BlogController@store') }}" method="post" enctype="multipart/form-data">
      @elseif($target == 'update')
      <form action="{{ action('BlogController@update', $blog->id) }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
      @endif
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="title">ブログのタイトル</label>
          <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
        </div>
        <div class="form-group">
          <label for="article">記事の内容</label>
          <textarea class="form-control" name="article" rows="5">{{ $blog->article }}</textarea>
        </div>
        <!-- 画像 -->
        @isset ($blog->image_url)
        <div class="form-container__image-preview">
          <img src="{{ asset('storage/' . $blog->image_url) }}"> 
        </div>
        @endisset

        <label for="image_url">画像ファイルのアップロード（1枚）</label>
        <input type="file" class="form-control form-container__image-uploader" name="image_url">
        @if($target == 'store')
        <button type="submit" class="btn btn-primary">新規投稿</button>
        @else
        <button type="submit" class="btn btn-primary">更新</button>
        @endif
      </form>
    </div>
  </div>
  <div class="row form-container__home-button">
    <a href="/" class="btn btn-outline-primary form-container__home-button__btn">HOME</a>
  </div>
</div>

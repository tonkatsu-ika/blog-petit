@extends('layouts/app')
@section('content')

<div class="container ops-main">
  <div class="row">
    <div class="col-md-12">
      <h3 class="ops-title">投稿一覧</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-11 col-md-offset-1">
      <table class="table text-center">
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">タイトル</th>
          <th class="text-left">記事</th>
        </tr>
        @foreach($blogs as $blog)
        <tr>
          <td>
            <a href="/blog/{{ $blog->id }}/edit">{{ $blog->id }}</a>
          <td>{{ $blog->title }}</td>
          <td class="text-left">{{ $blog->article }}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>

@endsection

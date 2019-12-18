@extends('layouts/app');
@section('content');

<div class="blog-show">
  <div class="blog-container">
    <h2 class="blog-container__title">{{ $blog->title }}</h2>
  </div>
</div>

@endsection

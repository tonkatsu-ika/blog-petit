<header class="stickey-top text-muted">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Blog Petit</h1>
      </div>
    </div>
    @auth
    <div class="col-md-12 text-center">
      {{ Auth::user()->name }}でログイン中
    </div>
    @endauth
    <div class="row">
      @include('layouts.navbar')
    </div>
  </div>
</header>

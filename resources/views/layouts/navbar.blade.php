<nav class="navbar">
  <div class="navbar-left">
    <a class="navbar-left__item" href="/">HOME</a>
    @if (Auth::check())
    <a class="navbar-left__item" href="/blog/create">新規投稿</a>
    @endif
  </div>
  <!-- Authentication links -->
  @guest
  <div class="navbar-right">
    <a class="navbar-right__item" href="{{ route('login') }}">
      {{ __('ログイン') }}
    </a>
    @if (Route::has('register'))
      <a class="navbar-right__item" href="{{ route('register') }}">
        {{ __('ユーザ登録') }}
      </a>
    @endif
   @else
   <form id="logout-form" class="navbar-right__item" action="{{ route('logout') }}" method="POST">
     @csrf
     <button type="submit" class="navbar-right__item__btn">
       ログアウト
     </button>
   </form>
  </div>
  @endguest
</nav>


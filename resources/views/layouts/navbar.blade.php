<nav class="navbar shadow-sm">
  <div class="container">
    <div class="row">

      <div class="col-sm-4 text-center">
        <a class="list-group-item list-group-item-action" href="/">HOME</a>
      </div>

      <!-- Authentication links -->
      @guest
        <div class="col-sm-4 text-center">
          <a class="list-group-item list-group-item-action" href="{{ route('login') }}">
            {{ __('ログイン') }}
          </a>
        </div>
      
          @if (Route::has('register'))
          <div class="col-sm-4 text-center">
            <a class="list-group-item list-group-item-action" href="{{ route('register') }}">
              {{ __('ユーザ登録') }}
            </a>
          </div>
          @endif

       @else

          <div class="col-sm-4 text-center">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="list-group-item list-group-item-action text-center">
                ログアウト
              </button>
            </form>
          </div>

       @endguest

    </div>
  </div>
</nav>


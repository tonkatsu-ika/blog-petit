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
            <a class="list-group-item list-group-item-action" href="{{ route('logout') }}">
              ログアウト
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
       @endguest

    </div>
  </div>
</nav>


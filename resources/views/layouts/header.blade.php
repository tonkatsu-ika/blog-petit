<header class="header">
  <div class="header-container">
    <div class="header-container__title-container">
      <h1 class="header-container__title-container__title">Blog Petit</h1>
    </div>

    @auth
    <div class="header-container__user-name">
      {{ Auth::user()->name }}でログイン中
    </div>
    @endauth

  </div>

</header>

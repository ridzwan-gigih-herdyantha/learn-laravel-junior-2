
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark"   >
    <div class="container">
      <a class="navbar-brand" href="/">Ridzwan Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : '' }} " href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "posts") ? 'active' : '' }} " href="/posts">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "category") ? 'active' : '' }} " href="/categories">Categories</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
        @if (Route::has('login'))
          @auth
            <li class="nav-item">
              <a class="nav-link {{ ($active === "posts") ? 'active' : 'dashboard' }}" href="{{ url('/dashboard') }}">Dashboard</a>
            </li>
              {{-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a> --}}
          @else
            <li class="nav-item">
              <a class="nav-link {{ ($active === "posts") ? 'active' : 'login' }}" href="{{ route('login') }}">Log in</a>
            </li>
              {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a> --}}

              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link {{ ($active === "posts") ? 'active' : 'register' }}" href="{{ route('register') }}">Register</a>
                </li>
                  {{-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a> --}}
              @endif
          @endauth
        @endif
        </ul>
      </div>
    </div>
  </nav>
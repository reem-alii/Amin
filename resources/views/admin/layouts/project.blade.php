<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<body>
    <div id="app">
       
                    @guest()
                        @if (Route::has('login'))
                             <a class="nav-link" href="{{ route('login') }}"></a>
                            @endif

                            @if (Route::has('register'))
                             <a class="nav-link" href="{{ route('register') }}"></a>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('admin')->user->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    @endguest
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

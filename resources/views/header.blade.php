@if(Auth::check())
<div>
    <li class="nav-item">
        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
    </li>
</div>
<div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <button onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        Logout
    </button>
</div>

@endif
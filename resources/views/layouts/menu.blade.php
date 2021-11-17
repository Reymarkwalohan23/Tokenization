<li class="nav-item">
    <a href="{{ route('applicationforms.index') }}"
       class="nav-link {{ Request::is('applicationforms*') ? 'active' : '' }}">
        <p>Applicationforms</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <p>Logs</p>
    </a>
</li>



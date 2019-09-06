<nav class="col-sm-3 hidden-xs-down bg-faded sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('exchanges') ? 'active' : '' }}" href="/exchanges">Exchanges</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('posts') ? 'active' : '' }}" href="/posts">Posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('cryptos') ? 'active' : '' }}" href="/cryptos">Cryptos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('fiats') ? 'active' : '' }}" href="/fiats">Fiats</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('payments') ? 'active' : '' }}" href="/payments">Payments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('countries') ? 'active' : '' }}" href="/countries">Countries</a>
        </li>
    </ul>


</nav>
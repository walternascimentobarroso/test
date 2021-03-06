<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Validator</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : ''}}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('validator*') ? 'active' : ''}}" href="/validator">Validator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('email*') ? 'active' : ''}}" href="/email">Emails</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('blacklist*') ? 'active' : ''}}" href="/blacklist">BlackList</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('rule*') ? 'active' : ''}}" href="/rule">Rules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('type*') ? 'active' : ''}}" href="/type">Types</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br />

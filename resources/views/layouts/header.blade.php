<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <a class="{{ request()->is('user') ? 'active' : '' }}" href="user">User</a>
    </div>
</nav>

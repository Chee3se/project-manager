<nav>
    <div class="navbar-container">
        <div class="navbar-left">
            <p class="index-p">Project Manager</p>
        </div>
        <div class="navbar-center">
            <a class="<?= $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ?>" href="/">Home</a>
            <a class="<?= $_SERVER['REQUEST_URI'] == '/tasks' ? 'active' : '' ?>" href="/tasks">Tasks</a>
        </div>
        <div class="navbar-right">
            <a class="<?= $_SERVER['REQUEST_URI'] == '/login' ? 'active' : '' ?>" href="/login">Login</a>
        </div>
    </div>
</nav>
<main>
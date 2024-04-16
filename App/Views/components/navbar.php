<nav>
    <div class="navbar-container">
        <div class="navbar-left">
            <p class="index-p">Project Manager</p>
        </div>
        <div class="navbar-center">
            <a class="<?= $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ?>" href="/">Home</a>
            <a class="<?= $_SERVER['REQUEST_URI'] == '/tasks' ? 'active' : '' ?>" href="/tasks">Tasks</a>
        </div>
        <?php if ($_SESSION['user'] ?? false) : ?>
            <div class="navbar-right-session">
                <a class="navbar-image" href="/profile">
                    <img src="/images/default_user.png" />
                </a>
                <div class="navbar-image-button">
                    <div>
                        <a href="/logout">Logout</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
        <div class="navbar-right">
            <div class="navbar-button">
                <a href="/login">Login</a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</nav>
<main>
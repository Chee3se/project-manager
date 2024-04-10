<nav>
    <a class=<?php if ($_SERVER['REQUEST_URI'] == "/") {echo "active";} else {echo "none";}?> href="/">Home</a>
    <a class=<?php if ($_SERVER['REQUEST_URI'] == "/tasks") {echo "active";} else {echo "none";}?> href="/tasks">My Tasks</a>
    <a class="login <?php if ($_SERVER['REQUEST_URI'] == "/login") {echo "active";} else {echo "none";}?>" href="/login">Login</a>
</nav>
<main>
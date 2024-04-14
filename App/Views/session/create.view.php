<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
<?php extract(returned_errors()); ?>
    <h1 class="special-h1 normal-h1"><span>Login</span></h1>
    <form action="/login" method="post">
        <div class="form-field">
            <label for="username">Username</label>
            <input placeholder="Joe" type="text" name="username" id="username" required value="<?= old('username') ?>">
        </div>
        <?php if (isset($errors['username'])): ?>
            <p class="form-error" hidden=""></p>
        <?php endif; ?>
        <div class="form-field">
            <label for="password">Password</label>
            <input placeholder="********" type="password" name="password" id="password" required value="<?= old('password') ?>">
        </div>
        <?= error('username') ?>
        <div class="yellow-stylish-button form-button">
            <div>
                <button>Login</button>
            </div>
        </div>
        <div class="login-register-div">
            <a class="login-register" href="/register">Register</a>
            <a class="login-forgot" href="/forgot">Forgot Password</a>
        </div>
    </form>
<?php component('footer'); ?>

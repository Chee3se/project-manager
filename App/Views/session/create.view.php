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
        <?php if (isset($errors['username'])): ?>
            <p class="form-error"><?= $errors['username'][0] ?></p>
        <?php endif; ?>
        <div class="yellow-stylish-button form-button">
            <div>
                <button>Login</button>
            </div>
        </div>
    </form>
    <h2 class="">Don't have an account? </h2>
    <div class="yellow-stylish-button"><div><a href="/register">Register</a></div></div>
<?php component('footer'); ?>

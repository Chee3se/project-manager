<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
    <h1 class="special-h1 normal-h1"><span>Register</span></h1>
    <form action="/register" method="post">
        <div class="form-field">
            <label for="username">Username</label>
            <input placeholder="Joe" type="text" name="username" id="username" required value="<?= $_GET['username'] ?? $username ?? '' ?>">
        </div>
        <div class="form-field">
            <label for="email">Email</label>
            <input placeholder="example@gmail.com" type="text" name="email" id="email" required value="<?= $_GET['email'] ?? $email ?? '' ?>">
        </div>
        <?php if (isset($errors['username'])): ?>
            <p class="form-error"><?= $errors['username'][0] ?></p>
        <?php endif; ?>
        <div class="form-field">
            <label for="password">Password</label>
            <input placeholder="********" type="password" name="password" id="password" required value="<?= $_GET['password'] ?? $password ?? '' ?>">
        </div>
        <?php if (isset($errors['password'])): ?>
            <p class="form-error"><?= $errors['password'][0] ?></p>
        <?php endif; ?>
        <div class="form-field">
            <label for="confirm_password">Confirm Password</label>
            <input placeholder="********" type="password" name="confirm_password" id="confirm_password" required value="<?= $_GET['confirm_password'] ?? $confirm_password ?? '' ?>">
        </div>
        <div class="form-button-container">
            <div class="form-button">
                <button>Register</button>
            </div>
        </div>
    </form>
<?php component('footer'); ?>
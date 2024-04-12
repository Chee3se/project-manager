<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
<?php if (extract(errors())) { $data = extract($data); }?>
    <h1 class="special-h1 normal-h1"><span>Login</span></h1>
    <form action="/login" method="post">
        <div class="form-field">
            <label for="username">Username</label>
            <input placeholder="Joe" type="text" name="username" id="username" required value="<?= $_GET['username'] ?? $username ?? '' ?>">
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
        <div class="form-button-container">
            <div class="form-button">
                <button>Login</button>
            </div>
        </div>
    </form>
<?php component('footer'); ?>

<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>

<h1 class="special-h1 normal-h1"><span>Profile</span></h1>
<div class="container">
    <div class="row">
        <div>
            <h2><?= $user->username; ?></h2>
            <p><?= $user->email; ?></p>
        </div>
    </div>
</div>

<?php component('footer'); ?>

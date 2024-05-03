<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
<?php extract(returned_errors()); ?>
<?php if(!$users){$users = [];} ?>
<h1 class="special-h1 normal-h1"><span>Add members to project </span></h1>
<form  method="POST">
    <div class="form-field">
        <h2>Users</h2>
        <?php foreach ($users as $user) : ?>
        <?php if($user['id'] != $_SESSION['id']){?>



        <div>
            <input type="checkbox" value="<?=$user['id']?>" name="id" >
            <label for="id"><?= $user['username'] ?></label>
        </div>

        <?php } ?>
        <?php endforeach; ?>
    </div>

    <div class="yellow-stylish-button form-button">
        <div>
            <button>add members</button>
        </div>
    </div>
</form>
<?php component('footer'); ?>

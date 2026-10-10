<?= view('templates/header', ['title' => $title]) ?>

<h1>New User</h1>

<?php foreach ($errors as $error): ?>
    <p><?= esc($error) ?></p>
<?php endforeach; ?>

<form action="<?= site_url('users/create') ?>" method="post">
    <?= csrf_field() ?>

    <label for="username">Username</label>
    <input
        id="username"
        name="username"
        value="<?= esc(old('username')) ?>"
        maxlength="50"
        required
    >

    <label for="full_name">Full Name</label>
    <input
        id="full_name"
        name="full_name"
        value="<?= esc(old('full_name')) ?>"
        maxlength="100"
        required
    >

    <button type="submit">Save User</button>
</form>

<?= view('templates/footer') ?>
<?= view('templates/header', ['title' => $title]) ?>

<h1>Login</h1>

<?php if (! empty($error)): ?>
    <p><?= esc($error) ?></p>
<?php endif; ?>

<form action="<?= site_url('login') ?>" method="post">
    <?= csrf_field() ?>

    <label for="username">Username</label>
    <input id="username" name="username" value="<?= esc(old('username')) ?>" required>

    <label for="password">Password</label>
    <input id="password" name="password" type="password" required>

    <button type="submit">Login</button>
</form>

<?= view('templates/footer') ?>
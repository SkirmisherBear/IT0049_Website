<?= view('templates/header', ['title' => $title]) ?>

<h1>Edit User</h1>

<?php foreach ($errors as $error): ?>
    <p><?= esc($error) ?></p>
<?php endforeach; ?>

<form
    action="<?= site_url('users/update/' . $user['id']) ?>"
    method="post"
    enctype="multipart/form-data"
>
    <?= csrf_field() ?>

    <label for="username">Username</label>
    <input
        id="username"
        name="username"
        value="<?= esc(old('username', $user['username'])) ?>"
        maxlength="50"
        required
    >

    <label for="full_name">Full Name</label>
    <input
        id="full_name"
        name="full_name"
        value="<?= esc(old('full_name', $user['full_name'])) ?>"
        maxlength="100"
        required
    >

    <p>Current avatar:</p>
    <?php if (! empty($users['avatar'])): ?>
        <img
            src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
            alt="User avatar"
            width="100"
        >
    <?php else: ?>
        <img
            src="<?= base_url('images/avatar-placeholder.svg') ?>"
            alt="No avatar uploaded"
            width="100"
        >
    <?php endif; ?>

    <label for="avatar">Choose a new avatar (JPG or PNG, up to 2MB)</label>
    <input
        id="avatar"
        type="file"
        name="avatar"
        accept=".jpg,.jpeg,.png,image/jpeg,image/png"
    >

    <button type="submit">Update User</button>
</form>

<?= view('templates/footer') ?>
<?= view('templates/header', ['title' => $title]) ?>

<h1>New Customer</h1>

<?php foreach ($errors as $error): ?>
    <p><?= esc($error) ?></p>
<?php endforeach; ?>

<form action="<?= site_url('customers/create') ?>" method="post">
    <?= csrf_field() ?>

    <label for="full_name">Full Name</label>
    <input
        id="full_name"
        name="full_name"
        value="<?= esc(old('full_name')) ?>"
        required
    >

    <label for="email">Email</label>
    <input
        id="email"
        name="email"
        type="email"
        value="<?= esc(old('email')) ?>"
        required
    >

    <label for="phone">Phone</label>
    <input
        id="phone"
        name="phone"
        value="<?= esc(old('phone')) ?>"
    >

    <button type="submit">Save Customer</button>
</form>

<?= view('templates/footer') ?>
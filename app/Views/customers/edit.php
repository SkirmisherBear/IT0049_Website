<?= view('templates/header', ['title' => $title]) ?>

<h1>Edit Customer</h1>

<?php foreach ($errors as $error): ?>
    <p><?= esc($error) ?></p>
<?php endforeach; ?>

<form action="<?= site_url('customers/update/' . $customer['id']) ?>" method="post">
    <?= csrf_field() ?>

    <label for="full_name">Full Name</label>
    <input id="full_name" name="full_name"
           value="<?= esc(old('full_name', $customer['full_name'])) ?>" required>

    <label for="email">Email</label>
    <input id="email" name="email" type="email"
           value="<?= esc(old('email', $customer['email'])) ?>" required>

    <label for="phone">Phone</label>
    <input id="phone" name="phone"
           value="<?= esc(old('phone', $customer['phone'])) ?>">

    <button type="submit">Update Customer</button>
</form>

<?= view('templates/footer') ?> 
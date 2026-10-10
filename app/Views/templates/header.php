<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title) ?> | Basic POS</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<header>
    <div class="container">
        <h2>Basic POS System</h2>

        <nav>
            <a href="<?= site_url('/') ?>">Home</a>
            <a href="<?= site_url('about') ?>">About</a>
            <a href="<?= site_url('customers') ?>">Customers</a>
            <a href="<?= site_url('users') ?>">Users</a>
        </nav>
    </div>
</header>
<form action="<?= site_url('logout') ?>" method="post">
    <?= csrf_field() ?>
    <button type="submit">Logout</button>
</form>
<main class="container"></main>
<?= view('templates/header', ['title' => $title]) ?>

<section class="hero">
    <h1>Welcome to the Basic POS System</h1>

    <p>
        This website manages temporary customer and user account records.
    </p>

    <a class="button" href="<?= site_url('customers') ?>">
        View Customers
    </a>
</section>

<?= view('templates/footer') ?>
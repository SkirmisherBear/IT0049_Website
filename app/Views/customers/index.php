<?= view('templates/header', ['title' => $title]) ?>

<h1>Customer Accounts</h1>
<a href="<?= site_url('customers/new') ?>">Add Customer</a>

<table>
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone']) ?></td>
                <td><a href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= view('templates/footer') ?>
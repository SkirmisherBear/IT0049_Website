<?= view('templates/header', ['title' => $title]) ?>

<h1>User Accounts</h1>
<a href="<?= site_url('users/new') ?>">Add User</a>
<table>
    <thead>
        <tr>
            <th>Avatar</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($users as $user): ?>
            <?php
            $avatarSrc = ! empty($user['avatar'])
    ? base_url('uploads/avatars/' . $user['avatar'])
    : base_url('images/avatar-placeholder.svg');
            ?>
            <tr>
                <td>
                    <img src="<?= esc($avatarSrc) ?>" alt="User avatar" width="50" height="50">
                </td>
                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['full_name']) ?></td>
                <td><?= esc($user['created_at']) ?></td>
                <td>
                    <a href="<?= site_url('users/edit/' . $user['id']) ?>">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= view('templates/footer') ?>
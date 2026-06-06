<?php
include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$auth = Auth::check();

$table = new UsersTable(new MySQL);
$users = $table->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand">
        <div class="container">
            <a href="#" class="navbar-brand">Admin</a>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">
                        <?= $auth->name ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="_actions/logout.php">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th></th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                    <td>
                        <div class="d-flex justify-content-between align-items-center">
                            <?php if ($user->role_id == 3): ?>
                                <span class="badge bg-success">
                                    <?= $user->role ?>
                                </span>
                            <?php elseif ($user->role_id == 2): ?>
                                <span class="badge bg-primary">
                                    <?= $user->role ?>
                                </span>
                            <?php else: ?>
                                <span class="badge bg-secondary">
                                    <?= $user->role ?>
                                </span>
                            <?php endif ?>

                            <?php if ($auth->role_id == 3): ?>
                                <div class="btn-group dropdown">
                                    <a href="#" class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown"></a>
                                    <div class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                        <a href="_actions/role.php?id=<?= $user->id ?>&role=1" class="dropdown-item">User</a>
                                        <a href="_actions/role.php?id=<?= $user->id ?>&role=2" class="dropdown-item">Manager</a>
                                        <a href="_actions/role.php?id=<?= $user->id ?>&role=3" class="dropdown-item">Admin</a>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <?php if ($auth->role_id == 3): ?>
                                <a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                            <?php endif ?>
                            <?php if ($auth->role_id >= 2): ?>
                                <?php if ($user->suspended): ?>
                                    <a href="_actions/unsuspend.php?id=<?= $user->id ?>" style="color: grey">
                                        <i class="fa-solid fa-lock"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-warning">
                                        Ban
                                    </a>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>
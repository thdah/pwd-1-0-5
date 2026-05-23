<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role</title>
</head>
<body>
    <h3>Role List</h3>
    <?php
        $db = new PDO('mysql:host=localhost;dbname=project', 'root', 'root');
        $result = $db->query('SELECT * FROM roles');
        $roles = $result->fetchAll();
    ?>
    <ul>
        <?php foreach($roles as $role) : ?>
            <li>
                <a href="del.php?id=<?= $role['id'] ?>">Delete</a>
                <a href="edit.php?id=<?= $role['id'] ?>">Edit</a>
                <?= $role['name'] ?>
                (<?= $role['value'] ?>)
            </li>
        <?php endforeach ?>
    </ul>
    <a href="new.php">Add New</a>
</body>
</html>
<?php
require_once "../../templates/top.php";
$customer = $pdo->query("SELECT a.*,b.name as card_name FROM customer a INNER JOIN card b ON a.card_id=b.id")->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Customer
    </div>
    <div class="card-body d-flex justify-content-end">
        <a href="add.php" class="btn btn-primary">Add Customer</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Card</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customer as $cust) : ?>
                    <tr>
                        <td><?= $cust["name"]; ?></td>
                        <td><?= $cust["gender"]; ?></td>
                        <td><?= $cust["phone"]; ?></td>
                        <td><?= $cust["email"]; ?></td>
                        <td><?= $cust["address"]; ?></td>
                        <td><?= $cust["card_name"]; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $cust['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $cust['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</main>

<?php require_once "../../templates/bottom.php" ?>
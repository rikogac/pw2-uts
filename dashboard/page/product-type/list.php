<?php
require_once "../../templates/top.php";
$product_type = $pdo->query("SELECT * FROM product_type")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Product Type
    </div>
    <div class="card-body d-flex justify-content-end">
        <a href="add.php" class="btn btn-primary">Add Product Type</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($product_type as $p) : ?>
                    <tr>
                        <td><?= $p["id"]; ?></td>
                        <td><?= $p["name"]; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $p['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $p['id']; ?>" class="btn btn-danger">Delete</a>
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
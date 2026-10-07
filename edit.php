<?php 
require 'db.php';

$id = $_GET['id'];
$sql = 'SELECT * FROM people WHERE id=id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['name']) && isset ($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = 'INSERT INTO people(name, email) VALUES(:name, :email)';
    $statement = $connection->prepare($sql);

    if ($statement->execute([':name' => $name, ':email' => $email])) {
       $message = 'data inserted succefully';
    }
    
}

?>


<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update person</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="<?= $person->name; ?>" type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="<?= $person->email; ?>"  type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Create a person</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>
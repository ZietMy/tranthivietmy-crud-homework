<?php require_once('partial/header.php'); ?>
<?php require_once('database/database.php');
db();
$result=[];
$id=$_GET['id'];
// print($id);
$result=selectOnestudent($id);

print_r($result);
?>

    <div class="container p-4">
        <form action="update_model.php" method="post">
        <div class="form-group">
                <input type="hidden" class="form-control" placeholder="" name="id" value="<?php echo $result['id']?>">
            </div>
            <div class="form-group">       
                <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $result['name']?>">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Age" name="age" value="<?php echo $result['age']?>">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $result['email']?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Image URL" name="image_url" value="<?php echo $result['profile']?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </div>
        </form>
    </div>
<?php require_once('partial/footer.php'); ?>
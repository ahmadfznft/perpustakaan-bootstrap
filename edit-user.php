<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <?php 
    include "navbar.php"; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE UserID = $id";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
    }

    $sql_role = "SELECT * FROM role";
    $stmt = mysqli_query($conn, $sql_role);
    ?>

    <div class="container mt-5">
        <div class="card shadow-lg mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h2 class="card-title text-center">Edit User</h2>
                <form action="proses-user.php" method="post">
                    <div class="mb-3">
                        <label for="namalengkap" class="form-label">Nama User</label>
                        <input type="text" name="namalengkap" value="<?= $user['NamaLengkap'] ?>" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" value="<?= $user['Username'] ?>" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" value="<?= $user['Password'] ?>" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="<?= $user['Email'] ?>" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" value="<?= $user['Alamat'] ?>" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="roleID" class="form-label">Role</label>
                        <select name="roleID" class="form-select" required>
                            <option value="">--Pilih--</option>
                            <?php while ($role = mysqli_fetch_assoc($stmt)) : ?>
                                <option value="<?= $role['RoleID'] ?>" <?= ($role['RoleID'] == $user['RoleID']) ? 'selected' : '' ?>><?= $role['NamaRole'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    
                    <input type="hidden" name="id" value="<?= $user['UserID'] ?>">
                    
                    <button type="submit" name="update" class="btn btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>

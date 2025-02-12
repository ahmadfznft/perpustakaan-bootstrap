<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Role</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">

    <?php
    include "navbar.php";
    
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM `role` WHERE RoleID=$id");

    while ($role_data = mysqli_fetch_array($result)) {
        $nama_role = $role_data['NamaRole'];
        $id_role = $role_data['RoleID'];
    }
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Edit Role</h1>
                        <form method="post" action="proses-role.php">
                            <input type="hidden" name="RoleID" value="<?= $id_role ?>">

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Role</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $nama_role ?>" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="ubah" class="btn btn-warning">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
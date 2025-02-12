<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    include "navbar.php";

    $sql = "SELECT * FROM role";
    $stmt = mysqli_query($conn, $sql);
    ?>

    <div class="container mt-5">
        <div class="card shadow-lg mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h2 class="card-title text-center">Tambah User</h2>
                <form action="proses-user.php" method="post">
                    <div class="mb-3">
                        <label for="namalengkap" class="form-label">Nama User</label>
                        <input type="text" name="namalengkap" class="form-control" placeholder="Masukkan Nama User" required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                    </div>

                    <div class="mb-3">
                        <label for="roleID" class="form-label">Role</label>
                        <select name="roleID" class="form-select" required>
                            <option value="" disabled selected>--Pilih--</option>
                            <?php foreach ($stmt as $kat) : ?>
                                <option value="<?= $kat['RoleID'] ?>"><?= $kat['NamaRole'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
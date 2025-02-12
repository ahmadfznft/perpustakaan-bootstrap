<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Role</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <?php
    include "navbar.php";
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Tambah Role</h1>
                        <form method="post" action="proses-role.php">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Role</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Role" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="simpan" class="btn btn-warning">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
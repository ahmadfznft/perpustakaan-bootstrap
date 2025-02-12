<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <title>Bootstrap Login Form</title>
    <style>
        .container-custom {
            max-width: 500px;
        }

        .svg-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <section>
        <div class="container container-custom mt-5 pt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <svg class="svg-center my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                            <form action="ceklogin.php" method="POST">
                                <input type="text" name="username" id="username" class="form-control my-4 py-2" placeholder="Username" required />
                                <input type="password" name="pass" id="password" class="form-control my-4 py-2" placeholder="Password" required />
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <div class="text-center mt-3">
                                    <span>Don't have an account yet? <a href="register.php" class="nav-link d-inline p-0">Register Here!</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
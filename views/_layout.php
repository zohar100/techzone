<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/app.css">
    <title>CRUD Products</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/products">TechZone</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: space-between;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_SERVER['PATH_INFO'] === '/products') echo 'active'; ?>" aria-current="page" href="/products">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_SERVER['PATH_INFO'] === '/products/create') echo 'active'; ?>" href="/products/create">Create Product</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 d-md-none d-sm-none d-lg-flex" style="display: flex;">
                    <input class="form-control" type="text" placeholder="Search for products" value="<?php echo $search ?? '' ?>" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-left: 5px;">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">

        <?php echo $content; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
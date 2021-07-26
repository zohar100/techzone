<form class="d-md-block d-sm-block d-lg-none">
    <div class="input-group mb-3 mt-3">
        <input type="text" class="form-control" placeholder="Search for products" name="search" value="<?php echo $search ?>">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</form>
<div class="row row-cols-3">
    <?php foreach ($products as $product) : ?>
        <div class="card col m-2" style="width: 18rem;">
            <?php if ($product['image']) : ?>
                <img src="<?php echo $product['image'] ?>" class="card-img-top" alt="...">
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $product['title'] ?></h5>
                <p class="card-text"><?php echo $product['description'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $product['create_date'] ?></li>
                <li class="list-group-item">5.6 inches</li>
                <li class="list-group-item"><?php echo $product['price'] . '$' ?></li>
            </ul>
            <div class="card-body">
                <form method="post" action="/products/delete" style="display: inline;">
                    <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="/products/update?id=<?php echo $product['id'] ?>" class="btn btn-info">Edit</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
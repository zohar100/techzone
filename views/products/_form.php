<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error) { ?>
            <div>
                <?php echo $error; ?>;
            </div>
        <?php } ?>
    </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">

    <?php if ($product['image']) : ?>
        <img src="/<?php echo $product['image']; ?>" class="update-image">
    <?php endif; ?>
    <div class="mb-3">
        <label class="form-label">Image</label><br>
        <input type="file" name="image">
    </div>
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $product['title']; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea type="text" name="description" class="form-control"><?php echo $product['description']; ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" step=".01" name="price" class="form-control" value="<?php echo $product['price']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/posts/update" method="post" class="p-3 shadow">
    <?= csrf_field() ?>
    <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">

    <div class="mb-3">
        <label for="post_title" class="form-label">Post title</label>
        <input type="input" name="post_title" class="form-control" value="<?= $post['post_title'] ?>">
        <br>
    </div>

    <div class="mb-3">
        <label for="post_body" class="form-label">Body</label>
        <textarea name="post_body" cols="45" rows="4" class="form-control" ><?= $post['post_body'] ?></textarea>
        <br>
    </div>

    <input type="submit" name="submit" value="Create post" class="btn btn-primary">
</form>
<a href="/posts/new">Create new post</a>

<?php if ($posts !== []): ?>

    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="col-sm-4 p-2">
                <div class="shadow p-2">
                    <h3><?= esc($post['post_title']) ?></h3>

                    <div class="main">
                        <?= esc($post['post_body']) ?>
                    </div>
                    <div class="p-2 d-inline">
                        <a href="/posts/<?= esc($post['post_slug'], 'url') ?>" class="btn btn-info">View</a>
                    </div>
                    <form action="POST" class="p-2 d-inline">
                        <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                        <button class="btn btn-primary">Edit</button>
                    </form>

                    <form action="DELETE" class="p-2 d-inline">
                        <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>

        <?php endforeach ?>
    </div>

<?php else: ?>

    <h3>No Posts</h3>

    <p>Unable to find any posts for you.</p>

<?php endif ?>
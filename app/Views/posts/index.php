<a href="/posts/new">Create new post</a>
<a href="/logout">Logout</a>

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
                    <div class="p-2 d-inline">
                        <a href="/posts/edit/<?= esc($post['post_id'], 'url') ?>" class="btn btn-info">Edit</a>
                    </div>

                    <form action="/posts/delete/<?= $post['post_id'] ?>" method="post" class="p-2 d-inline">
                        <?= csrf_field() ?>
                        <button class="btn btn-danger" value="delete">Delete</button>
                    </form>
                </div>
            </div>

        <?php endforeach ?>
    </div>

<?php else: ?>

    <h3>No Posts</h3>

    <p>Unable to find any posts for you.</p>

<?php endif ?>
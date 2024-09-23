<a href="/posts/new">Create new post</a>

<?php if ($posts !== []): ?>

    <?php foreach ($posts as $post): ?>

        <h3><?= esc($post['post_title']) ?></h3>

        <div class="main">
            <?= esc($post['post_body']) ?>
        </div>
        <p><a href="/post/<?= esc($post['post_slug'], 'url') ?>">View post</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Posts</h3>

    <p>Unable to find any posts for you.</p>

<?php endif ?>
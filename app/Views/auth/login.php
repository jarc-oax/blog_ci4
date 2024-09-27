<div class="columns is-mobile is-centered">
    <div class="column is-narrow">
        <form class="box p-3 shadow" action="login" method="post">
            <?= csrf_field() ?>
            <div class="field">
                <label class="form-label">Email</label>
                <input class="form-control" type="text" name="email" placeholder="Email" value="<?= old('email') ?>">
            </div>

            <div class="field">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" value="<?= old('password') ?>">
            </div>

            <div class="p-4">
                <button class="btn btn-primary is-link">Sign in</button>
            </div>

            <?php if(session()->getFlashdata('msg')):?>
            <div class="notification is-danger">
                <?= session()->getFlashdata('msg') ?>
            </div>
            <?php endif;?>

        </form>

    </div>
</div>

<div class="login-logo">
    <?php
    if (!empty($settings->logo)) {
        ?>
        <a href="<?= base_url() ?>admin/login">
            <img style="" width="100" src="<?= base_url() ?>uploads/images/<?= $settings->logo ?>"
                 alt="<?= $settings->logo_alt_text ?>">
        </a>

        <?php
    }
    ?>
</div>
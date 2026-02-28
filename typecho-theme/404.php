<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<main id="main-content" class="app-layout">
    <div class="not-found">
        <h1>404</h1>
        <p><?php _e("Oops — the page you're looking for does not exist."); ?></p>
        <a href="<?php $this->options->siteUrl(); ?>" class="link-button">
            <?php echo iconArrowLeft(); ?>
            Go Back Home
        </a>
    </div>
</main>

<?php $this->need('footer.php'); ?>

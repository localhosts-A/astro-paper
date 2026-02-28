<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<main id="main-content" class="app-layout" style="padding-bottom:3rem;">

    <div class="page-header">
        <h1><?php $this->title(); ?></h1>
    </div>

    <article class="post-content">
        <?php $this->content(); ?>
    </article>

    <!-- Comments -->
    <?php if ($this->allow('comment')): ?>
    <section class="comments-section">
        <h2><?php _e('Comments'); ?></h2>
        <?php $this->listComments(); ?>
        <?php $this->need('comments.php'); ?>
    </section>
    <?php endif; ?>

</main>
<!-- /main -->

<?php $this->need('footer.php'); ?>

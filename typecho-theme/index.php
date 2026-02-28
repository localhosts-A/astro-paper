<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<main id="main-content" class="app-layout">

    <?php if ($this->is('index')): ?>
    <!-- ===== Homepage Hero ===== -->
    <section id="hero">
        <h1><?php $this->options->title(); ?></h1>
        <p><?php
            echo !empty($this->options->heroText)
                ? htmlspecialchars($this->options->heroText)
                : htmlspecialchars($this->options->description);
        ?></p>
    </section>

    <section id="recent-posts" style="padding-top:3rem;padding-bottom:1.5rem;">
        <h2 class="section-heading">Recent Posts</h2>

    <?php else: ?>
    <!-- ===== Archive / Category / Tag Page Header ===== -->
    <div class="page-header">
        <h1><?php $this->archiveTitle(array(
            'category' => _t('Category: %s'),
            'tag'      => _t('Tag: %s'),
            'search'   => _t('Search: %s'),
            'author'   => _t('Author: %s'),
            'date'     => _t('Archive: %s'),
        )); ?></h1>
    </div>
    <?php endif; ?>

    <!-- ===== Post List ===== -->
    <?php if ($this->have()): ?>
    <ul class="post-list">
        <?php while ($this->next()): ?>
        <li class="post-item">
            <a href="<?php $this->permalink(); ?>" class="post-title-link">
                <h3><?php $this->title(); ?></h3>
            </a>
            <div class="post-date">
                <?php echo iconCalendar(); ?>
                <time datetime="<?php $this->date('c'); ?>">
                    <?php $this->date('j M, Y'); ?>
                </time>
            </div>
            <p class="post-excerpt"><?php $this->excerpt(160, '...'); ?></p>
        </li>
        <?php endwhile; ?>
    </ul>
    <?php else: ?>
    <p style="margin-top:2rem;opacity:0.7;"><?php _e('No posts found.'); ?></p>
    <?php endif; ?>

    <?php if ($this->is('index')): ?>
    </section>
    <?php endif; ?>

    <!-- ===== Pagination ===== -->
    <?php if ($this->_currentPage > 1 || $this->have()): ?>
    <nav class="pagination" role="navigation" aria-label="Pagination">
        <?php if ($this->hasPrev()): ?>
        <a href="<?php $this->pageLink('prev'); ?>" class="prev" aria-label="Previous Page">
            <?php echo iconArrowLeft(); ?>
            Prev
        </a>
        <?php else: ?>
        <span class="disabled" aria-hidden="true">
            <?php echo iconArrowLeft(); ?>
            Prev
        </span>
        <?php endif; ?>

        <span class="current"><?php echo $this->_currentPage; ?></span>

        <?php if ($this->hasNext()): ?>
        <a href="<?php $this->pageLink('next'); ?>" class="next" aria-label="Next Page">
            Next
            <?php echo iconArrowRight(); ?>
        </a>
        <?php else: ?>
        <span class="disabled" aria-hidden="true">
            Next
            <?php echo iconArrowRight(); ?>
        </span>
        <?php endif; ?>
    </nav>
    <?php endif; ?>

</main>
<!-- /main -->

<?php $this->need('footer.php'); ?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<main id="main-content" class="app-layout" style="padding-bottom:3rem;">

    <div class="page-header">
        <h1><?php _e('Search Results'); ?></h1>
        <?php if ($this->parameter->keywords): ?>
        <p style="margin-top:0.5rem;font-style:italic;">
            <?php _e('Results for: '); ?><strong><?php echo htmlspecialchars($this->parameter->keywords); ?></strong>
        </p>
        <?php endif; ?>
    </div>

    <!-- Search Form -->
    <form method="get" action="<?php $this->options->siteUrl(); ?>" class="search-form">
        <input
            type="text"
            name="s"
            value="<?php echo htmlspecialchars($this->parameter->keywords ?? ''); ?>"
            placeholder="<?php _e('Search posts...'); ?>"
            aria-label="<?php _e('Search'); ?>"
        >
    </form>

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
    <p style="margin-top:2rem;opacity:0.7;"><?php _e('No posts found matching your search.'); ?></p>
    <?php endif; ?>

    <!-- Pagination -->
    <nav class="pagination" role="navigation">
        <?php if ($this->hasPrev()): ?>
        <a href="<?php $this->pageLink('prev'); ?>"><?php echo iconArrowLeft(); ?> Prev</a>
        <?php endif; ?>
        <?php if ($this->hasNext()): ?>
        <a href="<?php $this->pageLink('next'); ?>">Next <?php echo iconArrowRight(); ?></a>
        <?php endif; ?>
    </nav>

</main>

<?php $this->need('footer.php'); ?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<main id="main-content" class="app-layout" style="padding-bottom:3rem;">

    <div class="page-header">
        <h1><?php _e('Archives'); ?></h1>
        <p style="margin-top:0.5rem;font-style:italic;"><?php _e('All posts by date'); ?></p>
    </div>

    <?php if ($this->have()):
        $currentYear = null;
    ?>
    <?php while ($this->next()):
        $year = $this->date('Y');
        if ($year !== $currentYear) {
            if ($currentYear !== null) echo '</ul></div>';
            $currentYear = $year;
            echo '<div class="archive-group"><h2>' . htmlspecialchars($year) . '</h2><ul class="post-list">';
        }
    ?>
        <li class="post-item">
            <a href="<?php $this->permalink(); ?>" class="post-title-link">
                <span><?php $this->title(); ?></span>
            </a>
            <div class="post-date">
                <?php echo iconCalendar(); ?>
                <time datetime="<?php $this->date('c'); ?>">
                    <?php $this->date('j M, Y'); ?>
                </time>
            </div>
        </li>
    <?php endwhile; ?>
    <?php if ($currentYear !== null) echo '</ul></div>'; ?>
    <?php else: ?>
    <p style="margin-top:2rem;opacity:0.7;"><?php _e('No posts found.'); ?></p>
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

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<!-- Reading Progress Bar -->
<div class="progress-container">
    <div class="progress-bar" id="myBar"></div>
</div>

<div class="app-layout" style="padding-top:0.5rem;">
    <a href="javascript:history.back()" class="back-btn">
        <?php echo iconChevronLeft(); ?>
        Go back
    </a>
</div>

<main id="main-content" class="app-layout" style="padding-bottom:3rem;">

    <!-- Post Header -->
    <div class="post-header">
        <h1><?php $this->title(); ?></h1>
        <div class="post-meta">
            <div class="post-date">
                <?php echo iconCalendar(); ?>
                <time datetime="<?php $this->date('c'); ?>">
                    <?php $this->date('j M, Y'); ?>
                </time>
            </div>
        </div>
    </div>

    <!-- Post Content -->
    <article id="article" class="post-content">
        <?php $this->content(); ?>
    </article>

    <hr class="dashed">

    <!-- Tags -->
    <?php if ($this->tags(', ', true, 'none') !== 'none'): ?>
    <ul class="tags-list">
        <?php $this->tags('<li><a href="{url}" class="tag-link sm">' . iconHash('sm') . '{name}</a></li>', true, ''); ?>
    </ul>
    <?php endif; ?>

    <!-- Share Links -->
    <div class="share-links">
        <span>Share:</span>
        <a class="share-link" href="https://x.com/intent/post?url=<?php $this->permalink(); ?>&text=<?php echo urlencode($this->title); ?>" target="_blank" rel="noopener noreferrer" title="Share on X">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 4l11.733 16H20L8.267 4zM4 20l6.768-6.768M20 4l-6.768 6.768"/></svg>
            <span class="sr-only">Share on X</span>
        </a>
        <a class="share-link" href="https://www.facebook.com/sharer.php?u=<?php $this->permalink(); ?>" target="_blank" rel="noopener noreferrer" title="Share on Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            <span class="sr-only">Share on Facebook</span>
        </a>
        <a class="share-link" href="https://t.me/share/url?url=<?php $this->permalink(); ?>&text=<?php echo urlencode($this->title); ?>" target="_blank" rel="noopener noreferrer" title="Share on Telegram">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22 2L11 13M22 2L15 22l-4-9-9-4 20-7z"/></svg>
            <span class="sr-only">Share on Telegram</span>
        </a>
        <a class="share-link" href="mailto:?subject=<?php echo urlencode($this->title); ?>&body=<?php $this->permalink(); ?>" title="Share via Email">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><polyline points="3 7 12 13 21 7"/></svg>
            <span class="sr-only">Share via Email</span>
        </a>
    </div>

    <hr class="dashed">

    <!-- Prev / Next Post Navigation -->
    <div class="post-nav">
        <?php
        // Get adjacent posts (previous = older, next = newer)
        $db = Typecho_Db::get();

        $prevRow = $db->fetchRow(
            $db->select()->from('table.contents')
                ->where('type = ?', 'post')
                ->where('status = ?', 'publish')
                ->where('cid < ?', $this->cid)
                ->order('cid', Typecho_Db::SORT_DESC)
                ->limit(1)
        );

        $nextRow = $db->fetchRow(
            $db->select()->from('table.contents')
                ->where('type = ?', 'post')
                ->where('status = ?', 'publish')
                ->where('cid > ?', $this->cid)
                ->order('cid', Typecho_Db::SORT_ASC)
                ->limit(1)
        );
        ?>
        <?php if ($prevRow): ?>
        <a href="<?php echo Typecho_Router::url('post', $prevRow, $this->options->index); ?>" class="prev">
            <?php echo iconChevronLeft(); ?>
            <div>
                <span class="nav-label">Previous Post</span>
                <span class="nav-title"><?php echo htmlspecialchars($prevRow['title']); ?></span>
            </div>
        </a>
        <?php endif; ?>
        <?php if ($nextRow): ?>
        <a href="<?php echo Typecho_Router::url('post', $nextRow, $this->options->index); ?>" class="next">
            <div>
                <span class="nav-label">Next Post</span>
                <span class="nav-title"><?php echo htmlspecialchars($nextRow['title']); ?></span>
            </div>
            <?php echo iconChevronRight(); ?>
        </a>
        <?php endif; ?>
    </div>

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

<script>
// ===== Reading Progress Bar =====
(function () {
    var bar = document.getElementById('myBar');
    if (!bar) return;
    document.addEventListener('scroll', function () {
        var scrolled = (document.documentElement.scrollTop / (document.documentElement.scrollHeight - document.documentElement.clientHeight)) * 100;
        bar.style.width = scrolled + '%';
    });
})();
</script>

<?php $this->need('footer.php'); ?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<!-- Comment Form -->
<?php if ($this->allow('comment')): ?>
<div id="comment-form" style="margin-top:1.5rem;">
    <h3 style="font-size:1.1rem;font-weight:600;margin-bottom:1rem;"><?php _e('Leave a Comment'); ?></h3>
    <form method="post" action="<?php $this->commentUrl(); ?>" id="comment_form">
        <?php if ($this->user->hasLogin()): ?>
        <p style="margin-bottom:1rem;">
            <?php _e('Logged in as '); ?>
            <strong><?php $this->user->screenName(); ?></strong>.
            <a href="<?php $this->options->siteUrl(); ?>logout/"><?php _e('Log out?'); ?></a>
        </p>
        <?php else: ?>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem;">
            <div>
                <label for="author" style="display:block;font-size:0.875rem;margin-bottom:0.25rem;">
                    <?php _e('Name'); ?><?php if ($this->options->commentsRequireName): ?> <span style="color:var(--accent);">*</span><?php endif; ?>
                </label>
                <input
                    type="text"
                    id="author"
                    name="author"
                    value="<?php $this->remember('author'); ?>"
                    <?php if ($this->options->commentsRequireName): ?>required<?php endif; ?>
                    style="width:100%;padding:0.5rem;background:var(--muted);border:1px solid var(--border);border-radius:0.375rem;color:var(--foreground);"
                >
            </div>
            <div>
                <label for="mail" style="display:block;font-size:0.875rem;margin-bottom:0.25rem;">
                    <?php _e('Email'); ?><?php if ($this->options->commentsRequireMail): ?> <span style="color:var(--accent);">*</span><?php endif; ?>
                </label>
                <input
                    type="email"
                    id="mail"
                    name="mail"
                    value="<?php $this->remember('mail'); ?>"
                    <?php if ($this->options->commentsRequireMail): ?>required<?php endif; ?>
                    style="width:100%;padding:0.5rem;background:var(--muted);border:1px solid var(--border);border-radius:0.375rem;color:var(--foreground);"
                >
            </div>
        </div>
        <div style="margin-bottom:1rem;">
            <label for="url" style="display:block;font-size:0.875rem;margin-bottom:0.25rem;"><?php _e('Website'); ?></label>
            <input
                type="url"
                id="url"
                name="url"
                value="<?php $this->remember('url'); ?>"
                style="width:100%;padding:0.5rem;background:var(--muted);border:1px solid var(--border);border-radius:0.375rem;color:var(--foreground);"
            >
        </div>
        <?php endif; ?>

        <div style="margin-bottom:1rem;">
            <label for="textarea" style="display:block;font-size:0.875rem;margin-bottom:0.25rem;">
                <?php _e('Comment'); ?> <span style="color:var(--accent);">*</span>
            </label>
            <textarea
                id="textarea"
                name="text"
                rows="5"
                required
                style="width:100%;padding:0.5rem;background:var(--muted);border:1px solid var(--border);border-radius:0.375rem;color:var(--foreground);resize:vertical;"
            ><?php $this->remember('text'); ?></textarea>
        </div>

        <button
            type="submit"
            style="background:var(--accent);color:var(--background);border:none;padding:0.5rem 1.25rem;border-radius:0.375rem;font-weight:500;cursor:pointer;transition:opacity 0.15s;"
            onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'"
        >
            <?php _e('Submit Comment'); ?>
        </button>
    </form>
</div>
<?php endif; ?>

    <!-- Footer -->
    <footer class="app-layout">
        <div>
            <?php renderSocialLinks($this->options); ?>
            <div class="copyright">
                <span>Copyright &#169; <?php echo date('Y'); ?></span>
                <span class="sep">&nbsp;|&nbsp;</span>
                <span><?php
                    $name = !empty($this->options->copyrightText)
                        ? htmlspecialchars($this->options->copyrightText)
                        : htmlspecialchars($this->options->title);
                    echo $name;
                ?></span>
                <span class="sep">&nbsp;|&nbsp;</span>
                <span>All rights reserved.</span>
            </div>
        </div>
    </footer>
    <!-- /Footer -->

    <!-- Back to Top Button -->
    <button id="back-to-top" aria-label="Back to top" title="Back to top">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"/>
        </svg>
    </button>

    <!-- JavaScript: navigation toggle, theme toggle, back-to-top -->
    <script>
    // ===== Mobile Navigation Toggle =====
    (function () {
        var menuBtn   = document.getElementById('menu-btn');
        var menuItems = document.getElementById('menu-items');
        var menuIcon  = document.getElementById('menu-icon');
        var closeIcon = document.getElementById('close-icon');

        if (!menuBtn || !menuItems) return;

        menuBtn.addEventListener('click', function () {
            var open = menuBtn.getAttribute('aria-expanded') === 'true';
            menuBtn.setAttribute('aria-expanded', open ? 'false' : 'true');
            menuBtn.setAttribute('aria-label', open ? 'Open Menu' : 'Close Menu');
            menuItems.classList.toggle('hidden');
            if (menuIcon)  menuIcon.classList.toggle('hidden');
            if (closeIcon) closeIcon.classList.toggle('hidden');
        });
    })();

    // ===== Dark / Light Mode Toggle =====
    (function () {
        var btn = document.getElementById('theme-btn');
        if (!btn) return;

        btn.addEventListener('click', function () {
            var current = document.documentElement.getAttribute('data-theme');
            var next = (current === 'dark') ? 'light' : 'dark';
            document.documentElement.setAttribute('data-theme', next);
            localStorage.setItem('theme', next);
        });
    })();

    // ===== Back to Top Button =====
    (function () {
        var btn = document.getElementById('back-to-top');
        if (!btn) return;

        window.addEventListener('scroll', function () {
            if (window.scrollY > 300) {
                btn.classList.add('visible');
            } else {
                btn.classList.remove('visible');
            }
        });

        btn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    })();
    </script>

    <?php $this->footer(); ?>
</body>
</html>

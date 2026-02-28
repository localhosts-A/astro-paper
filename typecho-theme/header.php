<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $this->archiveTitle(array(
        'category' => '%s - ',
        'tag'      => '%s - ',
        'search'   => '%s - ',
        'author'   => '%s - ',
    ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta name="description" content="<?php $this->options->description(); ?>">

    <!-- Canonical & RSS -->
    <link rel="alternate" type="application/rss+xml" title="<?php $this->options->title(); ?>" href="<?php $this->options->feedUrl(); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php $this->options->siteUrl; ?>favicon.ico">

    <!-- Theme Stylesheet -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">

    <!-- Inline theme initialisation – prevents flash of wrong theme -->
    <script>
    (function () {
        var stored = localStorage.getItem('theme');
        var preferDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        var theme = stored || (preferDark ? 'dark' : 'light');
        document.documentElement.setAttribute('data-theme', theme);
    })();
    </script>

    <?php $this->header(); ?>
</head>
<body>
    <!-- Skip to content -->
    <a id="skip-to-content" href="#main-content">Skip to content</a>

    <!-- Header -->
    <header class="app-layout">
        <div id="top-nav-wrap">
            <a href="<?php $this->options->siteUrl(); ?>" class="site-title">
                <?php $this->options->title(); ?>
            </a>

            <nav id="nav-menu" aria-label="Main navigation">
                <!-- Mobile menu toggle -->
                <button id="menu-btn" aria-label="Open Menu" aria-expanded="false" aria-controls="menu-items">
                    <!-- Hamburger icon -->
                    <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="6" x2="20" y2="6"/>
                        <line x1="4" y1="12" x2="20" y2="12"/>
                        <line x1="4" y1="18" x2="20" y2="18"/>
                    </svg>
                    <!-- Close icon -->
                    <svg id="close-icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>

                <ul id="menu-items" class="hidden">
                    <li class="col-span-2">
                        <a href="<?php $this->options->siteUrl(); ?>">Home</a>
                    </li>
                    <li class="col-span-2">
                        <!-- Categories -->
                        <a href="<?php $this->options->siteUrl(); ?>category/">Categories</a>
                    </li>
                    <?php if ($this->options->showArchives): ?>
                    <li class="col-span-2">
                        <a href="<?php $this->options->siteUrl(); ?>archives/" class="nav-icon-btn" title="Archives" aria-label="Archives">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="4" rx="1"/><path d="M4 8v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8"/><line x1="10" y1="12" x2="14" y2="12"/></svg>
                            <span class="hidden sm-inline">Archives</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="col-span-1">
                        <a href="<?php $this->options->siteUrl(); ?>search/" class="nav-icon-btn" title="Search" aria-label="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            <span class="sr-only">Search</span>
                        </a>
                    </li>
                    <?php if ($this->options->lightDarkMode): ?>
                    <li class="col-span-1">
                        <button id="theme-btn" title="Toggles light &amp; dark" aria-label="auto" aria-live="polite">
                            <!-- Moon icon (shown in light mode) -->
                            <svg class="icon-moon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                            <!-- Sun icon (shown in dark mode) -->
                            <svg class="icon-sun" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                        </button>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    <!-- /Header -->

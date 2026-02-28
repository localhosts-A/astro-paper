<?php
/**
 * AstroPaper Typecho Theme - Functions
 *
 * Ported from the AstroPaper Astro theme by Sat Naing.
 * @package AstroPaper
 * @version 1.0.0
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * Theme initialization
 */
function themeInit($archive) {
    // Set global timezone if needed
}

/**
 * Theme configuration panel
 */
function themeConfig($form) {
    // Site description / hero text
    $description = new Typecho_Widget_Helper_Form_Element_Textarea(
        'heroText',
        null,
        'A minimal, responsive and SEO-friendly Typecho blog theme.',
        _t('Hero Description'),
        _t('The description shown on the homepage hero section.')
    );
    $form->addInput($description);

    // Posts per page on index
    $postPerIndex = new Typecho_Widget_Helper_Form_Element_Text(
        'postPerIndex',
        null,
        '4',
        _t('Posts Per Index'),
        _t('Number of recent posts shown on the homepage.')
    );
    $form->addInput($postPerIndex);

    // Enable light/dark mode toggle
    $lightDarkMode = new Typecho_Widget_Helper_Form_Element_Radio(
        'lightDarkMode',
        array('1' => _t('Enabled'), '0' => _t('Disabled')),
        '1',
        _t('Light & Dark Mode Toggle'),
        _t('Show the theme toggle button in the navigation bar.')
    );
    $form->addInput($lightDarkMode);

    // Show archives link
    $showArchives = new Typecho_Widget_Helper_Form_Element_Radio(
        'showArchives',
        array('1' => _t('Yes'), '0' => _t('No')),
        '1',
        _t('Show Archives Link'),
        _t('Display the Archives link in the navigation menu.')
    );
    $form->addInput($showArchives);

    // Social Links - GitHub
    $github = new Typecho_Widget_Helper_Form_Element_Text(
        'socialGithub',
        null,
        '',
        _t('GitHub URL'),
        _t('Your GitHub profile URL (leave blank to hide).')
    );
    $form->addInput($github);

    // Social Links - Twitter/X
    $twitter = new Typecho_Widget_Helper_Form_Element_Text(
        'socialTwitter',
        null,
        '',
        _t('Twitter/X URL'),
        _t('Your Twitter/X profile URL (leave blank to hide).')
    );
    $form->addInput($twitter);

    // Social Links - LinkedIn
    $linkedin = new Typecho_Widget_Helper_Form_Element_Text(
        'socialLinkedin',
        null,
        '',
        _t('LinkedIn URL'),
        _t('Your LinkedIn profile URL (leave blank to hide).')
    );
    $form->addInput($linkedin);

    // Social Links - Email
    $email = new Typecho_Widget_Helper_Form_Element_Text(
        'socialEmail',
        null,
        '',
        _t('Email Address'),
        _t('Your contact email address (leave blank to hide).')
    );
    $form->addInput($email);

    // Footer copyright text
    $copyright = new Typecho_Widget_Helper_Form_Element_Text(
        'copyrightText',
        null,
        '',
        _t('Copyright Name'),
        _t('Name shown in the footer copyright notice. Defaults to site title if empty.')
    );
    $form->addInput($copyright);
}

/**
 * Output social links HTML
 *
 * @param Typecho_Widget $options Theme options widget
 */
function renderSocialLinks($options) {
    $links = array();

    if (!empty($options->socialGithub)) {
        $links[] = array(
            'href'  => htmlspecialchars($options->socialGithub),
            'title' => 'GitHub',
            'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-4.3 1.4-4.3-2.5-6-3m12 5v-3.5c0-1 .1-1.4-.5-2 2.8-.3 5.5-1.4 5.5-6a4.6 4.6 0 0 0-1.3-3.2 4.2 4.2 0 0 0-.1-3.2s-1.1-.3-3.5 1.3a12.3 12.3 0 0 0-6.2 0C6.5 2.8 5.4 3.1 5.4 3.1a4.2 4.2 0 0 0-.1 3.2A4.6 4.6 0 0 0 4 9.5c0 4.6 2.7 5.7 5.5 6-.6.6-.6 1.2-.5 2V21"/></svg>',
        );
    }

    if (!empty($options->socialTwitter)) {
        $links[] = array(
            'href'  => htmlspecialchars($options->socialTwitter),
            'title' => 'Twitter / X',
            'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4l11.733 16H20L8.267 4zM4 20l6.768-6.768M20 4l-6.768 6.768"/></svg>',
        );
    }

    if (!empty($options->socialLinkedin)) {
        $links[] = array(
            'href'  => htmlspecialchars($options->socialLinkedin),
            'title' => 'LinkedIn',
            'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6a2 2 0 1 0 4 0 2 2 0 0 0-4 0M4 10h4v10H4zM12 10h3.4v1.6h.1c.5-.9 1.6-1.8 3.3-1.8 3.5 0 4.2 2.3 4.2 5.3V20h-4v-4.5c0-1.1 0-2.5-1.5-2.5s-1.8 1.2-1.8 2.4V20H12z"/></svg>',
        );
    }

    if (!empty($options->socialEmail)) {
        $links[] = array(
            'href'  => 'mailto:' . htmlspecialchars($options->socialEmail),
            'title' => _t('Send Email'),
            'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><polyline points="3 7 12 13 21 7"/></svg>',
        );
    }

    if (empty($links)) return;

    echo '<div class="social-links">' . "\n";
    foreach ($links as $link) {
        printf(
            '<a href="%s" class="social-link" title="%s" rel="noopener noreferrer" target="_blank">%s<span class="sr-only">%s</span></a>' . "\n",
            $link['href'],
            htmlspecialchars($link['title']),
            $link['icon'],
            htmlspecialchars($link['title'])
        );
    }
    echo '</div>' . "\n";
}

/**
 * Output a calendar SVG icon (inline)
 */
function iconCalendar() {
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="5" width="16" height="16" rx="2"/><line x1="16" y1="3" x2="16" y2="7"/><line x1="8" y1="3" x2="8" y2="7"/><line x1="4" y1="11" x2="20" y2="11"/></svg>';
}

/**
 * Output a hash SVG icon (inline)
 */
function iconHash($size = 'lg') {
    $s = ($size === 'sm') ? '16' : '20';
    return '<svg xmlns="http://www.w3.org/2000/svg" width="' . $s . '" height="' . $s . '" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="9" x2="19" y2="9"/><line x1="5" y1="15" x2="19" y2="15"/><line x1="11" y1="4" x2="7" y2="20"/><line x1="17" y1="4" x2="13" y2="20"/></svg>';
}

/**
 * Output chevron-left SVG icon
 */
function iconChevronLeft() {
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>';
}

/**
 * Output chevron-right SVG icon
 */
function iconChevronRight() {
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>';
}

/**
 * Output arrow-left SVG icon
 */
function iconArrowLeft() {
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>';
}

/**
 * Output arrow-right SVG icon
 */
function iconArrowRight() {
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';
}

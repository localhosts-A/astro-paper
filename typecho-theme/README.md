# AstroPaper — Typecho Theme

A minimal, responsive and SEO-friendly Typecho blog theme, ported from the [AstroPaper](https://github.com/satnaing/astro-paper) Astro theme by Sat Naing.

## Preview

The theme features:

- 🌓 **Light & Dark mode** — automatic detection + manual toggle stored in `localStorage`
- 📱 **Responsive** — mobile-first design with a hamburger navigation menu
- 🎨 **CSS Variables** — easy to customise colours without touching the stylesheet
- 📝 **Clean typography** — readable prose styles for post content
- 🏷️ **Tags & Categories** — dedicated archive pages
- 🔍 **Search** — built-in Typecho search integration
- 📖 **Reading progress bar** — shown on single post pages
- ⬆️ **Back-to-top button** — appears after scrolling down
- 💬 **Comments** — Typecho native comment form
- ✉️ **Share links** — X, Facebook, Telegram, Email

## Installation

1. Copy the `typecho-theme/` folder into your Typecho installation's `usr/themes/` directory and rename it to `astro-paper` (or any name you like).
2. Log in to the Typecho admin panel.
3. Go to **Appearance → Themes** and activate **AstroPaper**.
4. Go to **Appearance → Theme Settings** to configure the theme.

## Theme Settings

| Setting | Description |
|---|---|
| Hero Description | Short text shown in the hero section on the homepage |
| Posts Per Index | Number of recent posts shown on the homepage (default: 4) |
| Light & Dark Mode Toggle | Show/hide the theme toggle button in the navigation |
| Show Archives Link | Show/hide the Archives link in the navigation |
| GitHub URL | Your GitHub profile URL |
| Twitter/X URL | Your Twitter/X profile URL |
| LinkedIn URL | Your LinkedIn profile URL |
| Email Address | Your contact email address |
| Copyright Name | Name displayed in the footer copyright notice |

## Colour Customisation

The colours are defined as CSS custom properties in `style.css`. Override them to match your brand:

```css
/* Light mode */
:root,
html[data-theme="light"] {
  --background: #fdfdfd;
  --foreground: #282728;
  --accent: #006cac;      /* links, headings */
  --muted:  #e6e6e6;      /* code background, nav bg */
  --border: #ece9e9;
}

/* Dark mode */
html[data-theme="dark"] {
  --background: #212737;
  --foreground: #eaedf3;
  --accent: #ff6b01;
  --muted:  #343f60;
  --border: #ab4b08;
}
```

## File Structure

```
typecho-theme/
├── style.css         Theme metadata & all styles
├── functions.php     Theme initialisation & settings panel
├── header.php        Site header & navigation
├── footer.php        Site footer, scripts & back-to-top
├── index.php         Homepage / post list / archive list
├── post.php          Single post page
├── page.php          Static page template
├── archive.php       Date-based archive
├── category.php      Category archive
├── tag.php           Tag archive
├── search.php        Search results
├── 404.php           404 error page
├── comments.php      Comment list & comment form
└── README.md         This file
```

## License

MIT — same as the original AstroPaper theme.

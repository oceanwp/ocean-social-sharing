# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

Ocean Social Sharing is a free OceanWP add-on (on WordPress.org) that adds social share buttons to single blog posts. It only works with the OceanWP theme (or a child theme of it).

## Commands

```bash
npx grunt                # browserify/babel then uglify JS, compile SCSS, autoprefix, csscomb
npx grunt watch          # recompile SCSS on change
npx grunt build          # copy a release into build/ocean-social-sharing/
npx grunt package        # zip build/ocean-social-sharing/ into build/ocean-social-sharing.zip
composer lint:php        # phpcs (phpcs.xml.dist) + parallel-lint + PHPCompatibilityWP 5.6+
composer make-pot        # regenerate languages/ocean-social-sharing.pot
composer update-mo       # merge the .pot into the es_ES, pl_PL, et, nl_NL .po files and compile .mo
```

package.json has no npm scripts. There are no tests.

## Architecture

The plugin is the `Ocean_Social_Sharing` singleton in `ocean-social-sharing.php`, plus `includes/helpers.php` (`oss_social_share_sites()`), `includes/options.php` (Customizer options) and one template.

- `oss_setup()` runs on `init` and does nothing unless the theme is OceanWP or its child. It is not gated by a license. The Freemius block runs only when Ocean Extra is active, with `is_premium` and `has_paid_plans` false.
- Settings are theme mods named `oss_*` (sites, position, style, heading, colors). They are defined as data in `oss_customizer_options()` and registered through OceanWP's `ocean_customize_options_data` filter, not `customize_register`. The section is skipped if Ocean Extra's theme panel setting `ocean_social_sharing_panel` is turned off. Color/radius options become CSS through the `ocean_head_css` filter.
- The heading text is registered for translation plugins via `ocean_register_tm_strings` and read with `oceanwp_tm_translation()`.
- Output: the buttons print on the theme's `ocean_before_single_post_content` action (position "before") or `ocean_social_share` action, which OceanWP fires in `partials/single/layout.php` (position "after", the default).
- Template: `template/social-share.php`. A theme or child theme can override it with `templates/extra/social-share.php` (note the `extra/` folder, unlike other add-ons). The share URL can be changed with the `oss_social_share_url` filter.

## Assets

- `assets/css/style.scss` compiles to `style.css`. The `sass:prod` target has an empty file list, so Grunt never rebuilds `style.min.css` from the SCSS; it only re-runs autoprefixer on the existing file. `style.min.css` is the file enqueued, so a SCSS change must also reach `style.min.css` some other way. `rtl.css` is hand-written and loaded when `is_rtl()`.
- `assets/js/social.js` and `assets/js/customizer.js` are the sources. Grunt writes `social.min.js` and `customizer.min.js` (browserify first, then `uglify:prod` overwrites them from the raw sources). The front end enqueues the unminified `social.js`; the Customizer preview uses `customizer.min.js`.
- All outputs are committed.

## Coding standard

`phpcs.xml.dist`: WordPress-Extra + WordPress-Docs + PHPCompatibility (PHP 5.6+, WP 5.0+), text domain `ocean-social-sharing`, global prefix `oss`. `assets/` and `sass/` are excluded from phpcs.

# Ocean Social Sharing - Features Documentation

Complete documentation of all features available in Ocean Social Sharing.

---

## Table of Contents

1. [Plugin Overview](#plugin-overview)
2. [License & Availability](#license--availability)
3. [Sharing Buttons](#sharing-buttons)
4. [Button Style](#button-style)
5. [Front-End Behavior](#front-end-behavior)
6. [Display & Developer API](#display--developer-api)

---

## Plugin Overview

**Ocean Social Sharing** adds social share buttons to single blog posts in the OceanWP theme, set up from the Customizer.

| Property | Value |
|----------|-------|
| Version | 2.2.4 |
| Minimum WordPress | 5.6 |
| Minimum PHP | 7.4 (readme.txt) |
| Tested up to | 7.1 |
| Text Domain | `ocean-social-sharing` |
| Main class | `Ocean_Social_Sharing` (singleton, `Ocean_Social_Sharing()`) |
| Requires | OceanWP theme (or a child theme). Ocean Extra is needed for the "After the Content" position |
| Distribution | Free on WordPress.org |

### Key Capabilities

- 10 networks: X (Twitter), Facebook, Pinterest, LinkedIn, Viber, VK, Reddit, Tumblr, Viadeo, WhatsApp
- Drag to reorder or turn off each network
- Show the buttons before the content, after it, or both
- Three styles (Minimal, Colored, Dark) with custom colors and border radius
- Optional heading and network names
- Adds your X username as "via" on X shares
- Uses Yoast SEO's Twitter title and description when present
- Translations included for Spanish, Polish, Estonian and Dutch

---

## License & Availability

Ocean Social Sharing is free. It registers with Freemius (product ID `3807`) only when Ocean Extra is active, as a free product with no paid plans. All features work without a license.

---

## Sharing Buttons

Settings live in **Customizer > Social Sharing**. The panel can be hidden from Ocean Extra's Theme Panel, where it is listed as "Social Sharing".

| Setting | Theme mod | Description | Default |
|---------|-----------|-------------|---------|
| **Sharing Buttons** | `oss_social_share_sites` | Drag to order, toggle to show or hide: X (ex Twitter), Facebook, Pinterest, LinkedIn, Viber, VK, Reddit, Tumblr, Viadeo, WhatsApp | All 10, in that order |
| **Position** | `oss_social_share_position` | Before the Content, After the Content, Before and After the Content, Disabled. "Disabled" is not handled by the output code, so it behaves like Before and After | After the Content |
| **Display Social Name** | `oss_social_share_name` | Show the network name next to each icon | Off |
| **X (ex Twitter) Username** | `oss_social_share_twitter_handle` | Added as `via` to X share links (a leading `@` is removed) | Empty |
| **Sharing Heading** | `oss_social_share_heading` | Heading above or beside the buttons. Leave empty for no heading | Please Share This |
| **Heading Position** | `oss_social_share_heading_position` | Side or Top | Side |

The heading text is registered through OceanWP's `ocean_register_tm_strings` filter and read with `oceanwp_tm_translation()`, so it can be translated through OceanWP's string translation support.

---

## Button Style

| Setting | Theme mod | Description | Default |
|---------|-----------|-------------|---------|
| **Social Buttons Style** | `oss_social_share_style` | Minimal, Colored or Dark | Minimal |
| **Buttons Border Radius** | `oss_social_share_style_border_radius` | Corner radius of every button | Theme style |
| **Minimal Style Borders** | `oss_sharing_borders_color` | Border color (Minimal style) | Theme style |
| **Minimal Style Background** | `oss_sharing_icons_bg` | Button background (Minimal style) | Theme style |
| **Minimal Style Icon** | `oss_sharing_icons_color` | Icon color (Minimal style) | Theme style |

The colors and radius are printed as inline CSS through OceanWP's `ocean_head_css` filter.

---

## Front-End Behavior

| Position | Where the buttons print |
|----------|-------------------------|
| Before the Content | On the theme's `ocean_before_single_post_content` action, wrapped in `.entry-share-wrap` |
| After the Content | On the theme's `ocean_social_share` action. OceanWP fires it from the "Social Share" element of the single post layout, only when Ocean Extra is active. Ocean Portfolio fires the same action on single portfolio items |
| Before and After | Both of the above |

- Buttons are not shown on password-protected posts, or when no network is enabled.
- Each link opens the network's share page in a 640x480 popup window. Viber uses a `viber://` link and WhatsApp uses `wa.me`.
- Pinterest shares include the post's featured image.
- Icons are inline SVG.
- The stylesheet and script load on every front-end page. An extra RTL stylesheet loads on right-to-left sites.

---

## Display & Developer API

### Template Override

| Plugin file | Theme override path |
|-------------|---------------------|
| `template/social-share.php` | `templates/extra/social-share.php` in the active (child) theme |

### Filters

| Hook | Description |
|------|-------------|
| `oss_social_share_sites_filter` | The list of enabled networks, in order |
| `oss_social_share_url` | The URL that is shared (default the post permalink) |

### Data Storage

| Data | Where |
|------|-------|
| Settings | Theme mods `oss_*` |
| Version | Option `ocean-social-sharing-version` (set on activation) |

### Uninstall

The plugin has no uninstall routine. Deleting it leaves its theme mods and the version option in the database.

---

*Ocean Social Sharing - Social share buttons for OceanWP blog posts*

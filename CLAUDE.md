# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

Ocean Product Sharing is a free OceanWP add-on (published on WordPress.org). It adds share buttons (Twitter, Facebook, Pinterest, email) to single product pages for WooCommerce and Easy Digital Downloads. It only works with the OceanWP theme or a child theme of it. `readme.txt` is the WordPress.org readme. A release bumps the version in the `ocean-product-sharing.php` header, `readme.txt` (`Stable tag` and changelog), `README.md` and `changelog.txt`.

## Commands

```bash
npx grunt            # sass:dev only (style.scss -> style.css)
npx grunt watch      # sass:dev + autoprefixer on .scss changes
npx grunt build      # uglify JS, sass:prod, autoprefixer, csscomb, then copy plugin into build/ocean-product-sharing/
npx grunt package    # zip build/ocean-product-sharing/ into build/ocean-product-sharing.zip
composer lint:php    # phpcs (WordPress-Extra, WordPress-Docs, PHPCompatibility) + parallel-lint
composer lint:wpcs   # phpcs only
composer make-pot    # regenerate languages/ocean-product-sharing.pot (needs wp-cli)
composer update-mo   # msgmerge the es_ES, ar, et, pl_PL .po files from the .pot and compile .mo
```

There are no tests. `package.json` has no npm scripts, so call Grunt directly. The `csscomb` step points at `.csscomb.json`, which is not in the repo.

## Assets

Built files are committed. There is no JS bundler: `assets/js/*.js` are the sources and `*.min.js` are uglified copies.

- The front end loads `assets/css/style.min.css`, which only `grunt build` produces (the default task writes `style.css`, which nothing enqueues). After editing `style.scss`, run `grunt build` or at least `npx grunt sass:prod`.
- The front end loads the unminified `assets/js/social.js` (the `ops_onClick()` popup window helper), so JS edits need no build.
- `assets/css/rtl.css` is hand-written and loaded when `is_rtl()`.
- `assets/js/customizer.js` is not used. Its enqueue in `ops_setup()` is commented out.

## How it loads

- `ops_setup()` runs on `init` and does nothing unless the active theme name is `OceanWP` or its template is `oceanwp`. All hooks are registered there.
- Freemius is set up through Ocean Extra's `OceanWP_EDD_Addon_Migration` (on the theme's `owp_fs_loaded` action), but as a free product (`is_premium` false). It does not gate loading, so the plugin works on a local site without a license.
- `includes/update-message.php` (an "update required" notice) is loaded only when OceanWP is 3.6.1 or older and Ocean Extra is missing or 2.3.1 or older.

## Settings and output

- Settings are theme mods with the `ops_` prefix: `ops_product_sharing_sites` (sortable list, may be saved as a JSON string, see `ops_social_share_sites()` in `includes/helpers.php`) and three colors. Field definitions are in `includes/options.php` and are added to the theme's React Customizer through the `ocean_customize_options_data` filter as section `ocean_product_sharing_settings`.
- The Customizer section is skipped if the Ocean Extra Theme Panel switch `ocean_product_sharing_panel` (added via `oe_theme_panels`) is off.
- Color CSS is built in `ops_head_css()` and appended to the theme's `ocean_head_css` output.
- `template/product-share.php` prints the buttons on `woocommerce_after_single_product_summary` and on the theme's `ocean_after_single_download_item` (EDD, from `oceanwp/partials/edd/single.php`). A theme can override it at `templates/extra/product-share.php`. The site list can be changed with the `ops_product_sharing_sites_filter` filter.

## Code style

phpcs is set to text domain `ocean-product-sharing`, global prefix `ops`, PHP 5.6+ and WordPress 5.0+ (`readme.txt` says PHP 7.4 is required). The 2.2.3 security fix (Patchstack report) changed `template/product-share.php` to build share URLs with `add_query_arg()` and strip tags from the title. Keep share URLs built that way and escaped with `esc_url()`.

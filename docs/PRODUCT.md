# Ocean Product Sharing - Features Documentation

Complete documentation of all features available in Ocean Product Sharing.

---

## Table of Contents

1. [Plugin Overview](#plugin-overview)
2. [License & Availability](#license--availability)
3. [Product Share Buttons](#product-share-buttons)
4. [Customizer Settings](#customizer-settings)
5. [Theme Panel Switch](#theme-panel-switch)
6. [Display & Developer API](#display--developer-api)

---

## Plugin Overview

**Ocean Product Sharing** is a free OceanWP add-on that adds social share buttons to single product pages. It works with WooCommerce products and Easy Digital Downloads downloads.

| Property | Value |
|----------|-------|
| Version | 2.2.4 |
| Minimum WordPress | 5.6 |
| Minimum PHP | 7.4 (from `readme.txt`) |
| Tested up to | WordPress 7.1, WooCommerce 11.0.1 |
| WooCommerce minimum | 3.0 |
| Text Domain | `ocean-product-sharing` |
| Main class | `Ocean_Product_Sharing` (singleton, `Ocean_Product_Sharing()` helper) |
| Requires | OceanWP theme (or a child theme). WooCommerce or Easy Digital Downloads for the buttons to show. Ocean Extra is optional. |
| Distribution | Free on WordPress.org |

### Key Capabilities

- Share buttons for X (Twitter), Facebook, Pinterest and email
- Choose which buttons show and in what order
- Colors for borders, icon background and icon
- Share links open in a centered 640 x 480 popup window
- RTL stylesheet
- Child theme template override
- WooCommerce HPOS compatible
- Translations: Arabic, Spanish, Estonian, Polish

---

## License & Availability

Ocean Product Sharing is free. All features are available without a license.

| Item | Value |
|------|-------|
| Freemius product ID | 3809 |
| Freemius type | Free (`is_premium` false, `has_paid_plans` false) |
| Freemius parent product | OceanWP theme |

Freemius is set up through Ocean Extra (`OceanWP_EDD_Addon_Migration`) when Ocean Extra is active, but it does not gate any feature. The plugin works as long as the active theme is OceanWP or a child of it.

---

## Product Share Buttons

The buttons print below the product summary on single product pages.

| Where | Hook |
|-------|------|
| WooCommerce single product | `woocommerce_after_single_product_summary` |
| Easy Digital Downloads single download (OceanWP template) | `ocean_after_single_download_item` (fired in `oceanwp/partials/edd/single.php`) |

| Button | Share URL | Text shown |
|--------|-----------|------------|
| X (Twitter) | `https://twitter.com/intent/tweet` with product title and URL | Tweet This Product |
| Facebook | `https://www.facebook.com/sharer.php` with product URL | Share on Facebook |
| Pinterest | `https://www.pinterest.com/pin/create/button/` with URL, featured image and title | Pin This Product |
| Email | `mailto:` with the title as subject and the URL as body | Mail This Product |

Front-end behavior:

- Clicking a button calls `ops_onClick()` (`assets/js/social.js`), which opens the share URL in a centered 640 x 480 window.
- The product title is stripped of HTML tags before it goes into the share URLs. All URLs are built with `add_query_arg()` and escaped with `esc_url()`.
- Each link has an ARIA label and a screen reader "Opens in a new window" note. Icons are inline SVG.
- If no buttons are selected, nothing is printed.
- The stylesheet (`assets/css/style.min.css`) and script load on every front-end page. `assets/css/rtl.css` also loads on RTL sites.

---

## Customizer Settings

All settings live in **Appearance > Customize > Product Sharing** (section `ocean_product_sharing_settings`, priority 16). Settings are theme mods.

| Setting | Default | Description |
|---------|---------|-------------|
| **Sharing Buttons** (`ops_product_sharing_sites`) | X (Twitter), Facebook, Pinterest, Mail | Sortable list. Reorder buttons or turn them off. |
| **PS Borders** (`ops_product_sharing_borders_color`) | `#e9e9e9` | Border color of the share box and items |
| **PS Background** (`ops_product_sharing_icons_bg`) | `#333333` | Icon circle background |
| **PS Icons** (`ops_product_sharing_icons_color`) | `#ffffff` | Icon fill color |

Saved colors that differ from the defaults are added to the theme's inline CSS through `ocean_head_css`. The section ends with a "Need Help?" link to the OceanWP docs.

---

## Theme Panel Switch

When Ocean Extra is active, its Theme Panel gets a **Product Sharing** switch (`ocean_product_sharing_panel`, added through `oe_theme_panels`). When the switch is off, the Product Sharing Customizer section is not added. The buttons still print with the saved settings.

The plugin also adds a "backup recommended before update" note to its update row on the Plugins screen when OceanWP is 3.6.1 or older and Ocean Extra is missing or 2.3.1 or older.

---

## Display & Developer API

### Template Override

| File | Override path |
|------|---------------|
| `template/product-share.php` | `<child-theme>/templates/extra/product-share.php` |

### Hooks

| Hook | Type | Description |
|------|------|-------------|
| `ops_product_sharing_sites_filter` | Filter | Change the list and order of share buttons before output |
| `ops_customizer_options` | Filter | Change the Customizer section definition |

The plugin hooks into the theme's `ocean_customize_options_data`, `ocean_head_css` and `ocean_after_single_download_item`, Ocean Extra's `oe_theme_panels`, and WooCommerce's `woocommerce_after_single_product_summary` and `before_woocommerce_init` (HPOS).

### JavaScript

| Function | Description |
|----------|-------------|
| `ops_onClick( href )` | Opens a share URL in a centered popup window |

### Data Storage

| Type | Keys |
|------|------|
| Theme mods | `ops_product_sharing_sites`, `ops_product_sharing_borders_color`, `ops_product_sharing_icons_bg`, `ops_product_sharing_icons_color` |
| Options | `ocean-product-sharing-version` (written on activation) |

There are no shortcodes, blocks, widgets, REST routes, AJAX actions, custom post types or custom tables.

### Uninstall

The plugin has no uninstall routine. Deleting it leaves the `ops_*` theme mods and the `ocean-product-sharing-version` option in the database.

---

*Ocean Product Sharing - Social share buttons for WooCommerce and Easy Digital Downloads product pages*

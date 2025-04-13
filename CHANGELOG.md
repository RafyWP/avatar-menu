### Changelog – Avatar Menu v1.0.0

**🔐 Security**
- Escaped all HTML outputs (`esc_html`, `esc_attr`, etc.)
- Sanitized inputs with `sanitize_text_field()`
- Nonce verification via `avatar_menu_verify_nonce()`
- Permissions checked with `current_user_can()`
- Safe removal of `$_POST` in settings processing
- Protected against direct access with `defined( 'ABSPATH' )`

**🧩 Structure and Organization**
- Modular architecture with namespace `RafyCo\\AvatarMenu`
- `Plugin` class centralizes main logic
- `Assets` class handles block and asset registration
- Reusable helpers in `helpers.php`

**✨ Features**
- Gutenberg block with avatar and user name support
- `[avatar_menu]` shortcode with friendly fallback for visitors
- Settings page added to the "Settings" menu
- "Remove data on uninstall" option with safe control
- Avatar rendered with `loading="lazy"`, `aria-label`, `role="img"`
- Support for `aria-live="polite"` for accessibility
- Unique dynamic IDs per block/user

**🧪 Tests and Automation**
- PHPUnit configured with tests for login and nonce verification
- GitHub Actions configured (`phpunit.yml`)

**🛠️ Development and Build**
- `webpack.config.js` with Babel + SASS
- Scripts `start`, `build`, and `zip` in `package.json`

**♿ Accessibility (a11y)**
- Used `aria-labelledby`, `aria-live`, `role="region"`
- Fields with `<label for="...">` and correctly associated IDs
- Appropriate alt text in avatars

**🚀 Performance**
- Light and optimized loading of assets
- Avatar with `loading="lazy"`
- No external calls or excessive processing

# Avatar Menu

**Author:** Rafy Co.  
**Version:** 1.0.0  
**License:** GPL v2 or later  
**Requires at least:** WordPress 5.2  
**Tested up to:** WordPress 6.5  
**Requires PHP:** 7.2+

## Description

**Avatar Menu** is a powerful and easy-to-use WordPress plugin designed to display the logged-in user's avatar, name, and a customizable message in a Gutenberg block. It's ideal for personalized dashboards, member areas, or user-specific greetings.

The plugin makes it simple to enhance the user experience by displaying personalized content, such as the user's profile picture and name, directly in the WordPress block editor. The block is fully responsive, meaning it adapts to different screen sizes, and integrates seamlessly with the WordPress core.

## Features

- **Gutenberg Block Integration**: The plugin is fully integrated with the WordPress block editor, allowing you to easily insert the block into posts or pages.
- **Responsive Design**: The avatar and user information will adjust to the screen size, ensuring a smooth experience on both desktop and mobile devices.
- **Customizable Welcome Message**: You can personalize the greeting message displayed to the logged-in user. For non-logged-in users, a friendly message will encourage them to log in.
- **PSR-compliant PHP Architecture**: The plugin follows modern PHP coding standards, ensuring it’s maintainable, extensible, and easy to integrate with other systems.
- **Accessibility Ready**: The plugin is designed with accessibility in mind, featuring semantic HTML, ARIA attributes, and support for screen readers.
- **Custom Shortcode**: In addition to the Gutenberg block, the plugin provides a `[avatar_menu]` shortcode that you can use in any post or page for flexible placement.
- **Safe Uninstall Option**: The plugin provides a setting to ensure that all data related to the plugin is removed when uninstalled, giving you control over your data.

## Installation

1. **Upload the Plugin**:
    - Download the plugin and unzip it.
    - Upload the `avatar-menu` folder to the `/wp-content/plugins/` directory on your server.

2. **Activate the Plugin**:
    - Go to the **Plugins** page in your WordPress admin area.
    - Find **Avatar Menu** in the list of installed plugins and click **Activate**.

3. **Use the Plugin**:
    - You can now add the **Avatar Menu** block in any post or page using the Gutenberg editor.
    - You can also use the `[avatar_menu]` shortcode anywhere on your site.

## Settings

Once activated, you can configure the plugin by navigating to **Settings > Avatar Menu**. Here, you can adjust the following settings:

- **Remove Data on Uninstall**: Choose whether you want the plugin to delete all of its data upon uninstallation. This includes any settings and user-specific information stored by the plugin.

## Shortcode Usage

The plugin provides a shortcode for easy inclusion of the avatar and username on any page or post:

[avatar_menu]

This shortcode will output the logged-in user's avatar and name. If the user is not logged in, it will display a message prompting them to log in.

### Example

[avatar_menu]

If the user is logged in, the following HTML will be generated:

<div class="avatar-menu-block">
  <img src="user-avatar.jpg" alt="John Doe" class="avatar" role="img" aria-label="John Doe" />
  <p>John Doe</p>
</div>

## Development

### Installation Requirements

- **Composer**: Ensure that Composer is installed on your local development environment.
- **Node.js and NPM**: The plugin uses modern JavaScript tooling. Run the following commands to install dependencies:
  npm install

### Building Assets

To compile the assets (JavaScript, CSS, and SCSS), run:

npm run build

This will generate the necessary files in the `build/` folder.

## License

This plugin is free software, licensed under the GPL v2 or later. See the LICENSE file for more details.

## Author

[Rafy Co.](https://rafy.site)

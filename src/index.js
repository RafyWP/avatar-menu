import { registerBlockType } from '@wordpress/blocks';
import { useState } from '@wordpress/element';
import { TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import './editor.scss';
import './style.scss';

registerBlockType('avatar-menu/avatar-menu', {
  title: __('Avatar Menu', 'avatar-menu'),
  description: __('Display the logged-in user\'s avatar and name.', 'avatar-menu'),
  category: 'widgets',
  icon: 'admin-users',
  attributes: {
    showName: {
      type: 'boolean',
      default: true,
    },
    alignment: {
      type: 'string',
      default: 'center',
    },
  },
  edit: ({ attributes, setAttributes }) => {
    const [showName, setShowName] = useState(attributes.showName);

    const toggleShowName = () => {
      setShowName(!showName);
      setAttributes({ showName: !showName });
    };

    return (
      <div className={`avatar-menu-block align${attributes.alignment}`}>
        <TextControl
          label={__('Display Name', 'avatar-menu')}
          checked={showName}
          onChange={toggleShowName}
        />
        <div className="avatar-menu-content">
          <img src="user-avatar.jpg" alt="User Avatar" />
          {showName && <p>{__('John Doe', 'avatar-menu')}</p>}
        </div>
      </div>
    );
  },
  save: () => {
    return (
      <div className="avatar-menu-block">
        <img src="user-avatar.jpg" alt="User Avatar" />
        <p>{__('John Doe', 'avatar-menu')}</p>
      </div>
    );
  },
});

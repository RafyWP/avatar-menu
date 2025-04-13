import { useSelect } from '@wordpress/data';
import { __ } from '@wordpress/i18n';
import { BlockControls, AlignmentToolbar } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
  const { user } = useSelect((select) => select('core').getCurrentUser(), []);

  if (!user || !user.id) {
    return <p>{__('Please log in to see your profile.', 'avatar-menu')}</p>;
  }

  return (
    <div className="avatar-menu-block">
      <BlockControls>
        <AlignmentToolbar
          value={attributes.alignment}
          onChange={(newAlignment) => setAttributes({ alignment: newAlignment })}
        />
      </BlockControls>

      <div className="avatar-menu-content">
        <img
          src={user.avatar_urls?.[96] || ''}
          alt={user.name}
          style={{ borderRadius: '50%', width: 64, height: 64 }}
        />
        <p>{user.name}</p>
      </div>

      <PanelBody title={__('Settings', 'avatar-menu')}>
        <ToggleControl
          label={__('Show name', 'avatar-menu')}
          checked={attributes.showName}
          onChange={() => setAttributes({ showName: !attributes.showName })}
        />
      </PanelBody>
    </div>
  );
}

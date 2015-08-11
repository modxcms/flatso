<?php
if (!$object->xpdo) return false;
/** @var modX $modx */
$modx =& $object->xpdo;

if (!function_exists('getResourceMap')) {
    function getResourceMap() {
        global $modx;

        $assetsPath = rtrim($modx->getOption('flatso.assets_path',null,$modx->getOption('assets_path').'components/flatso/'), '/') . '/';
        $rmf = $assetsPath . 'resourcemap.php';

        if (is_readable($rmf)) {
            $map = include $rmf;
        } else {
            $map = array();
        }

        return $map;
    }
}

switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
        $clientConfigCorePath = $modx->getOption('clientconfig.core_path', null, $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/clientconfig/');
        /** @var ClientConfig $clientConfig */
        $clientConfig = $modx->getService(
            'clientconfig',
            'ClientConfig',
            $clientConfigCorePath . 'model/clientconfig/',
            array(
                'core_path' => $clientConfigCorePath
            )
        );

        $groups = array();
        if (isset($options['install_resources']) && empty($options['install_resources'])) {
            $rssResource = '';
            $archivistIDsValue = '';
        } else {
            $resourceMap = getResourceMap();
            $rssResource = "[[~" . $resourceMap['RSS'] . "]]";
            $archivistIDsValue = $resourceMap['Archives'];
        }
        
        $group = $modx->getObject('cgGroup', array('label' => 'Global'));
        if (!$group) {
            $group = $modx->newObject('cgGroup');
            $group->set('label', 'Global');
            $group->set('description', '');
            $group->set('sortorder', '0');
            $group->save();
        }
        $groups['global'] = $group->id;

        $group = $modx->getObject('cgGroup', array('label' => 'Fonts'));
        if (!$group) {
            $group = $modx->newObject('cgGroup');
            $group->set('label', 'Fonts');
            $group->set('description', '');
            $group->set('sortorder', '1');
            $group->save();
        }
        $groups['fonts'] = $group->id;

        $group = $modx->getObject('cgGroup', array('label' => 'Mobile'));
        if (!$group) {
            $group = $modx->newObject('cgGroup');
            $group->set('label', 'Mobile');
            $group->set('description', '');
            $group->set('sortorder', '3');
            $group->save();
        }
        $groups['mobile'] = $group->id;

        $group = $modx->getObject('cgGroup', array('label' => 'Content'));
        if (!$group) {
            $group = $modx->newObject('cgGroup');
            $group->set('label', 'Content');
            $group->set('description', '');
            $group->set('sortorder', '90');
            $group->save();
        }
        $groups['content'] = $group->id;

        $group = $modx->getObject('cgGroup', array('label' => 'Social Media'));
        if (!$group) {
            $group = $modx->newObject('cgGroup');
            $group->set('label', 'Social Media');
            $group->set('description', '');
            $group->set('sortorder', '91');
            $group->save();
        }
        $groups['socialmedia'] = $group->id;

        $group = $modx->getObject('cgGroup', array('label' => 'Images'));
        if (!$group) {
            $group = $modx->newObject('cgGroup');
            $group->set('label', 'Images');
            $group->set('description', '');
            $group->set('sortorder', '95');
            $group->save();
        }
        $groups['images'] = $group->id;

        $group = $modx->getObject('cgGroup', array('label' => 'JS'));
        if (!$group) {
            $group = $modx->newObject('cgGroup');
            $group->set('label', 'JS');
            $group->set('description', '');
            $group->set('sortorder', '99');
            $group->save();
        }
        $groups['js'] = $group->id;
        
        $settings = array(
            array(
                'key' => 'cc_font_script',
                'label' => 'External Font Script(s)',
                'xtype' => 'textarea',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '0',
                'value' => "<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>",
                'default' => '',
                'group' => $groups['fonts'],
                'options' => ''
            ),
            array(
                'key' => 'cc_body_font',
                'label' => 'Body Font Family',
                'xtype' => 'textfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '1',
                'value' => "font-family: 'Lato', Arial, sans-serif; font-weight: 400;",
                'default' => '',
                'group' => $groups['fonts'],
                'options' => ''
            ),
            array(
                'key' => 'cc_heading_font',
                'label' => 'Heading Font Family',
                'xtype' => 'textfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '2',
                'value' => "font-weight: 900;",
                'default' => '',
                'group' => $groups['fonts'],
                'options' => ''
            ),
            array(
                'key' => 'cc_light_font',
                'label' => 'Light Font Family',
                'xtype' => 'textfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '3',
                'value' => "font-weight: 300;",
                'default' => '',
                'group' => $groups['fonts'],
                'options' => ''
            ),
            array(
                'key' => 'cc_primary_color',
                'label' => 'Primary Color',
                'xtype' => 'colorpickerfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '0',
                'value' => "6e9924",
                'default' => '',
                'group' => $groups['global'],
                'options' => ''
            ),
            array(
                'key' => 'cc_secondary_color',
                'label' => 'Secondary Color',
                'xtype' => 'colorpickerfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '1',
                'value' => "444444",
                'default' => '',
                'group' => $groups['global'],
                'options' => ''
            ),
            array(
                'key' => 'cc_body_bg_color',
                'label' => 'Body BG Color',
                'xtype' => 'colorpickerfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '2',
                'value' => "ececec",
                'default' => '',
                'group' => $groups['global'],
                'options' => ''
            ),
            array(
                'key' => 'cc_body_font_color',
                'label' => 'Body Font Color',
                'xtype' => 'colorpickerfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '3',
                'value' => "3a3a3a",
                'default' => '',
                'group' => $groups['global'],
                'options' => ''
            ),
            array(
                'key' => 'cc_header_background',
                'label' => 'Header BG Color',
                'xtype' => 'colorpickerfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '4',
                'value' => "444444",
                'default' => '',
                'group' => $groups['global'],
                'options' => ''
            ),
            array(
                'key' => 'cc_nav_link',
                'label' => 'Nav Link Color',
                'xtype' => 'colorpickerfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '5',
                'value' => "f2f2f2",
                'default' => '',
                'group' => $groups['global'],
                'options' => ''
            ),
            array(
                'key' => 'cc_nav_link_hover',
                'label' => 'Nav Link Hover Color',
                'xtype' => 'colorpickerfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '6',
                'value' => "6e9924",
                'default' => '',
                'group' => $groups['global'],
                'options' => ''
            ),
            array(
                'key' => 'cc_js_link',
                'label' => 'JS Library Link',
                'xtype' => 'textfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '0',
                'value' => "",
                'default' => '',
                'group' => $groups['js'],
                'options' => ''
            ),
            array(
                'key' => 'cc_mobile_background',
                'label' => 'Mobile Background Color',
                'xtype' => 'colorpickerfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '0',
                'value' => "6e9924",
                'default' => '',
                'group' => $groups['mobile'],
                'options' => ''
            ),
            array(
                'key' => 'cc_mobile_link',
                'label' => 'Mobile Link Color',
                'xtype' => 'colorpickerfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '1',
                'value' => "FFFFFF",
                'default' => '',
                'group' => $groups['mobile'],
                'options' => ''
            ),
            array(
                'key' => 'cc_mobile_link_hover',
                'label' => 'Mobile Link Hover Color',
                'xtype' => 'colorpickerfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '2',
                'value' => "333333",
                'default' => '',
                'group' => $groups['mobile'],
                'options' => ''
            ),
            array(
                'key' => 'cc_logo',
                'label' => 'Site Logo',
                'xtype' => 'modx-panel-tv-image',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '0',
                'value' => "assets/components/flatso/images/modx-revo-2_3-icon.png",
                'default' => '',
                'group' => $groups['images'],
                'options' => ''
            ),
            array(
                'key' => 'cc_sidebar_title',
                'label' => 'Sidebar Widget Title',
                'xtype' => 'textfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '0',
                'value' => "ABOUT ME",
                'default' => '',
                'group' => $groups['content'],
                'options' => ''
            ),
            array(
                'key' => 'cc_sidebar_img',
                'label' => 'Sidebar Widget Image',
                'xtype' => 'modx-panel-tv-image',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '1',
                'value' => "assets/components/flatso/images/wayne-avatar.jpg",
                'default' => '',
                'group' => $groups['content'],
                'options' => ''
            ),
            array(
                'key' => 'cc_sidebar_subtitle',
                'label' => 'Sidebar Widget Subtitle',
                'xtype' => 'textfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '2',
                'value' => "BIO",
                'default' => '',
                'group' => $groups['content'],
                'options' => ''
            ),
            array(
                'key' => 'cc_sidebar_message',
                'label' => 'Sidebar Widget Message',
                'xtype' => 'textarea',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '3',
                'value' => "Hamburger ullamco alcatra exercitation prosciutto shoulder pork loin. Minim ham hock duis picanha incididunt turkey sed swine ball tip consectetur dolore. Hamburger ham deserunt, et minim frankfurter occaecat id. Pastrami est picanha kevin cow. Ea rump doner pork belly boudin.",
                'default' => '',
                'group' => $groups['content'],
                'options' => ''
            ),
            array(
                'key' => 'cc_featured_title',
                'label' => 'Featured Post Sidebar Title',
                'xtype' => 'textfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '4',
                'value' => "Featured Posts",
                'default' => '',
                'group' => $groups['content'],
                'options' => ''
            ),
            array(
                'key' => 'cc_social_title',
                'label' => 'Widget Title',
                'xtype' => 'textfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '0',
                'value' => "GET CONNECTED",
                'default' => '',
                'group' => $groups['socialmedia'],
                'options' => ''
            ),
            array(
                'key' => 'cc_facebook_icon',
                'label' => 'Facebook Icon',
                'xtype' => 'modx-panel-tv-image',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '1',
                'value' => "assets/components/flatso/images/facebook-white-35.png",
                'default' => '',
                'group' => $groups['socialmedia'],
                'options' => ''
            ),
            array(
                'key' => 'cc_facebook_link',
                'label' => 'Facebook Link',
                'xtype' => 'textfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '2',
                'value' => "https://facebook.com",
                'default' => '',
                'group' => $groups['socialmedia'],
                'options' => ''
            ),
            array(
                'key' => 'cc_twitter_icon',
                'label' => 'Twitter Icon',
                'xtype' => 'modx-panel-tv-image',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '3',
                'value' => "assets/components/flatso/images/twitter-white-35.png",
                'default' => '',
                'group' => $groups['socialmedia'],
                'options' => ''
            ),
            array(
                'key' => 'cc_twitter_link',
                'label' => 'Twitter Link',
                'xtype' => 'textfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '4',
                'value' => "https://twitter.com",
                'default' => '',
                'group' => $groups['socialmedia'],
                'options' => ''
            ),
            array(
                'key' => 'cc_rss_icon',
                'label' => 'RSS Icon',
                'xtype' => 'modx-panel-tv-image',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '5',
                'value' => "assets/components/flatso/images/rss-white-35.png",
                'default' => '',
                'group' => $groups['socialmedia'],
                'options' => ''
            ),
            array(
                'key' => 'cc_rss_link',
                'label' => 'RSS Link',
                'xtype' => 'textfield',
                'description' => '',
                'is_required' => '0',
                'sortorder' => '6',
                'value' => $rssResource,
                'default' => '',
                'group' => $groups['socialmedia'],
                'options' => ''
            ),
            
        );
        
        foreach ($settings as $setting) {
            $settingObject = $modx->newObject('cgSetting');
            $settingObject->set('key', $setting['key']);
            $settingObject->set('label', $setting['label']);
            $settingObject->set('xtype', $setting['xtype']);
            $settingObject->set('description', $setting['description']);
            $settingObject->set('is_required', $setting['is_required']);
            $settingObject->set('sortorder', $setting['sortorder']);
            $settingObject->set('value', $setting['value']);
            $settingObject->set('default', $setting['default']);
            $settingObject->set('group', $setting['group']);
            $settingObject->set('options', $setting['options']);
            $settingObject->save();
        }

        $themeSetting = $modx->getObject('modSystemSetting', array('key' => 'mxt.theme'));
        if ($themeSetting) {
            $themeSetting->set('value','flatso');
            $themeSetting->save();
        }
    
        $archivistIDs = $modx->getObject('modSystemSetting', array('key' => 'archivist.archive_ids'));
        if (!$archivistIDs) {
            $archivistIDs = $modx->newObject('modSystemSetting');
            $archivistIDs->set('key', 'archivist.archive_ids');
            $archivistIDs->set('namespace', 'archivist');
            $archivistIDs->set('area', 'furls');
        }
        
        if (!empty($archivistIDsValue)) {
            $archivistIDs->set('value', $archivistIDsValue . ':arc_');
        }
        
        $archivistIDs->save();

        if (!(isset($options['install_resources'])) || !(empty($options['install_resources']))) {
            $contentType = $modx->getObject('modContentType', array('name' => 'HTML'));
            if ($contentType) {
                $contentType->set('file_extensions', '/');
                $contentType->save();
            }
        }

        break;
    case xPDOTransport::ACTION_UPGRADE:
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
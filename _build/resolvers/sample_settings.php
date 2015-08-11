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
        if (isset($options['install_resources']) && empty($options['install_resources'])) return true;
        
        $resourceMap =  getResourceMap();
        
        $archive = $modx->getObject('modSystemSetting', array('key' => 'flatso.archive_id'));
        if ($archive && !empty($resourceMap['Archives'])) {
            $archive->set('value', $resourceMap['Archives']);
            $archive->save();
        }
    
        $blog = $modx->getObject('modSystemSetting', array('key' => 'flatso.blog_id'));
        if ($blog && !empty($resourceMap['Home'])) {
            $blog->set('value', $resourceMap['Home']);
            $blog->save();
        }
    
        $category = $modx->getObject('modSystemSetting', array('key' => 'flatso.category_id'));
        if ($category && !empty($resourceMap['Categories'])) {
            $category->set('value', $resourceMap['Categories']);
            $category->save();
        }
    
        $fPosts = $modx->getObject('modSystemSetting', array('key' => 'mxt.default_fposts'));
        if ($fPosts && !empty($resourceMap['Coastal Beach House']) && !empty($resourceMap['Surf City'])) {
            $fPosts->set('value', $resourceMap['Coastal Beach House'] . ',' . $resourceMap['Surf City']);
            $fPosts->save();
        }

        if (!empty($resourceMap['Home'])) {
            /** @var modResource $homeResource */
            $homeResource = $modx->getObject('modResource', $resourceMap['Home']);
            if ($homeResource) {
                $homeResource->setTVValue('fpost_ids', $resourceMap['Coastal Beach House'] . ',' . $resourceMap['Surf City']);                
            }
        }

        break;
    case xPDOTransport::ACTION_UPGRADE:
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
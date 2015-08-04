<?php
if (!$object->xpdo) return false;
/** @var modX $modx */
$modx =& $object->xpdo;

switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        if (isset($options['install_resources']) && empty($options['install_resources'])) return true;

        $taggerCorePath = $modx->getOption('tagger.core_path', null, $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/tagger/');
        /** @var Tagger $tagger */
        $tagger = $modx->getService(
            'tagger',
            'Tagger',
            $taggerCorePath . 'model/tagger/',
            array(
                'core_path' => $taggerCorePath
            )
        );
        
        $template = $modx->getObject('modTemplate', array('templatename' => 'MX Template'));

        $group = $modx->getObject('TaggerGroup', array('alias' => 'category'));
        if (!$group) {
            $group = $modx->newObject('TaggerGroup');
            $group->set('name', 'Category');
            $group->set('alias', 'category');
            $group->set('field_type', 'tagger-combo-tag');
            $group->set('allow_new', 0);
            $group->set('remove_unused', 0);
            $group->set('allow_blank', 1);
            $group->set('allow_type', 0);
            $group->set('show_autotag', 0);
            $group->set('hide_input', 0);
            $group->set('tag_limit', 0);
            $group->set('show_for_templates', '');
            $group->set('place', 'in-tab');
            $group->set('description', '');
    
            if ($template) {
                $group->set('show_for_templates', $template->id);
            }
            
            $group->save();
        }

        $tags = array('Landmarks', 'Landscapes');
        
        foreach ($tags as $tag) {
            $tagObject = $modx->newObject('TaggerTag');
            $tagObject->set('tag', $tag);
            $tagObject->set('alias', strtolower($tag));
            $tagObject->set('group', $group->id);
            $tagObject->save();
        }

        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
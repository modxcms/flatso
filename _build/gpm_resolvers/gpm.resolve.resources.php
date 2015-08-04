<?php
/**
 *
 * Resolve Resources
 *
 * THIS RESOLVER IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package flatso
 * @subpackage build
 */

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

if (!function_exists('setResourceMap')) {
    function setResourceMap($resourceMap) {
        global $modx;

        $assetsPath = rtrim($modx->getOption('flatso.assets_path',null,$modx->getOption('assets_path').'components/flatso/'), '/') . '/';
        $rmf = $assetsPath . 'resourcemap.php';
        file_put_contents($rmf, '<?php return ' . var_export($resourceMap, true) . ';');

    }
}

if (!function_exists('createResource')) {
    function createResource($resource) {
        global $modx;

        if (isset($resource['tvs'])) {
            $tvs = $resource['tvs'];
            unset($resource['tvs']);
        } else {
            $tvs = array();
        }
        
        if (isset($resource['others'])) {
            $others = $resource['others'];
            unset($resource['others']);

            $taggerCorePath = $modx->getOption('tagger.core_path', null, $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/tagger/');
            if (file_exists($taggerCorePath . 'model/tagger/tagger.class.php')) {
                /** @var Tagger $tagger */
                $tagger = $modx->getService(
                    'tagger',
                    'Tagger',
                    $taggerCorePath . 'model/tagger/',
                    array(
                        'core_path' => $taggerCorePath
                    )
                );
            
                $tagger = $tagger instanceof Tagger;
            } else {
                $tagger = null;
            }
            
            foreach ($others as $other) {
                if (($tagger == true) && (strpos($other['name'], 'tagger-') !== false)) {
                    $groupAlias = preg_replace('/tagger-/', '', $other['name'], 1);
            
                    $group = $modx->getObject('TaggerGroup', array('alias' => $groupAlias));
                    if ($group) {
                        $other['name'] = 'tagger-' . $group->id;
                    }
                }
            
                $resource[$other['name']] = $other['value'];
            }
        }

        $res = $modx->runProcessor('resource/create', $resource);
        $resObject = $res->getObject();

        if ($resObject && isset($resObject['id'])) {
            /** @var modResource $modResource */
            $modResource = $modx->getObject('modResource', array('id' => $resObject['id']));

            if ($modResource) {
                foreach ($tvs as $tv) {
                    $modResource->setTVValue($tv['name'], $tv['value']);
                }

                return $modResource->id;
            }
        }

        return false;
    }
}

if (!function_exists('updateResource')) {
    function updateResource($resource) {
        global $modx;

        if (isset($resource['tvs'])) {
            $tvs = $resource['tvs'];
            unset($resource['tvs']);
        } else {
            $tvs = array();
        }

        if (isset($resource['others'])) {
            $others = $resource['others'];
            unset($resource['others']);

            $taggerCorePath = $modx->getOption('tagger.core_path', null, $modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/tagger/');
            if (file_exists($taggerCorePath . 'model/tagger/tagger.class.php')) {
                /** @var Tagger $tagger */
                $tagger = $modx->getService(
                    'tagger',
                    'Tagger',
                    $taggerCorePath . 'model/tagger/',
                    array(
                        'core_path' => $taggerCorePath
                    )
                );
            
                $tagger = $tagger instanceof Tagger;
            } else {
                $tagger = null;
            }

            foreach ($others as $other) {
                if (($tagger == true) && (strpos($other['name'], 'tagger-') !== false)) {
                    $groupAlias = preg_replace('/tagger-/', '', $other['name'], 1);
                
                    $group = $modx->getObject('TaggerGroup', array('alias' => $groupAlias));
                    if ($group) {
                        $other['name'] = 'tagger-' . $group->id;
                    }
                }

                $resource[$other['name']] = $other['value'];
            }
        }

        $res = $modx->runProcessor('resource/update', $resource);
        $resObject = $res->getObject();

        if ($resObject && isset($resObject['id'])) {
            /** @var modResource $modResource */
            $modResource = $modx->getObject('modResource', array('id' => $resObject['id']));

            if ($modResource) {
                foreach ($tvs as $tv) {
                    $modResource->setTVValue($tv['name'], $tv['value']);
                }

                return $modResource->id;
            }
        }

        return false;
    }
}

switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        $resources = array (
  0 => 
  array (
    'pagetitle' => 'Home',
    'alias' => 'index',
    'parent' => 0,
    'content' => '',
    'context_key' => 'web',
    'class_key' => 'CollectionContainer',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 1,
    'tvs' => 
    array (
      'content_tpl' => 
      array (
        'name' => 'content_tpl',
        'value' => 'listing',
      ),
      'body_tpl' => 
      array (
        'name' => 'body_tpl',
        'value' => 'page',
      ),
      'page_icon' => 
      array (
        'name' => 'page_icon',
        'value' => 'fa-home',
      ),
      'page_img' => 
      array (
        'name' => 'page_img',
        'value' => 'assets/components/flatso/images/home-page-image.jpg',
      ),
      'fpost_ids' => 
      array (
        'name' => 'fpost_ids',
        'value' => '9,10',
      ),
      'hero_banner' => 
      array (
        'name' => 'hero_banner',
        'value' => 'yes',
      ),
      'carousel_ids' => 
      array (
        'name' => 'carousel_ids',
        'value' => '',
      ),
      'slider_ids' => 
      array (
        'name' => 'slider_ids',
        'value' => '',
      ),
      'listing_ids' => 
      array (
        'name' => 'listing_ids',
        'value' => '',
      ),
      'listbyparent' => 
      array (
        'name' => 'listbyparent',
        'value' => '',
      ),
    ),
    'others' => 
    array (
    ),
    'template' => 'MX Template',
    'published' => 1,
  ),
  1 => 
  array (
    'pagetitle' => 'Categories',
    'alias' => 'tags',
    'parent' => 0,
    'content' => '',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => 'All Categories',
    'description' => '',
    'isfolder' => 1,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'content_tpl' => 
      array (
        'name' => 'content_tpl',
        'value' => 'listing',
      ),
      'body_tpl' => 
      array (
        'name' => 'body_tpl',
        'value' => 'page',
      ),
      'page_icon' => 
      array (
        'name' => 'page_icon',
        'value' => '',
      ),
      'page_img' => 
      array (
        'name' => 'page_img',
        'value' => '',
      ),
      'fpost_ids' => 
      array (
        'name' => 'fpost_ids',
        'value' => '',
      ),
      'hero_banner' => 
      array (
        'name' => 'hero_banner',
        'value' => '',
      ),
      'carousel_ids' => 
      array (
        'name' => 'carousel_ids',
        'value' => '',
      ),
      'slider_ids' => 
      array (
        'name' => 'slider_ids',
        'value' => '',
      ),
      'listing_ids' => 
      array (
        'name' => 'listing_ids',
        'value' => '',
      ),
      'listbyparent' => 
      array (
        'name' => 'listbyparent',
        'value' => '',
      ),
    ),
    'others' => 
    array (
    ),
    'template' => 'MX Template',
    'published' => 1,
  ),
  2 => 
  array (
    'pagetitle' => 'RSS',
    'alias' => 'rss',
    'parent' => 0,
    'content' => '',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '',
    'description' => '',
    'isfolder' => 0,
    'introtext' => 'RSS FEED',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
    ),
    'others' => 
    array (
    ),
    'template' => 'RSS',
    'published' => 1,
    'hidemenu' => 1,
    'cacheable' => 0,
    'searchable' => 0,
    'richtext' => 0,
  ),
  3 => 
  array (
    'pagetitle' => 'Style Guide',
    'alias' => 'style-guide',
    'parent' => 0,
    'content' => '[[$styleguide]]',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => 'Style Guide',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'content_tpl' => 
      array (
        'name' => 'content_tpl',
        'value' => 'page',
      ),
      'body_tpl' => 
      array (
        'name' => 'body_tpl',
        'value' => 'page',
      ),
      'page_icon' => 
      array (
        'name' => 'page_icon',
        'value' => '',
      ),
      'page_img' => 
      array (
        'name' => 'page_img',
        'value' => 'assets/components/flatso/images/revine-yoga.jpg',
      ),
      'fpost_ids' => 
      array (
        'name' => 'fpost_ids',
        'value' => '',
      ),
      'hero_banner' => 
      array (
        'name' => 'hero_banner',
        'value' => 'yes',
      ),
      'carousel_ids' => 
      array (
        'name' => 'carousel_ids',
        'value' => '',
      ),
      'slider_ids' => 
      array (
        'name' => 'slider_ids',
        'value' => '',
      ),
      'listing_ids' => 
      array (
        'name' => 'listing_ids',
        'value' => '',
      ),
      'listbyparent' => 
      array (
        'name' => 'listbyparent',
        'value' => '',
      ),
    ),
    'others' => 
    array (
    ),
    'template' => 'MX Template',
    'published' => 1,
  ),
  4 => 
  array (
    'pagetitle' => 'Archives',
    'alias' => 'archives',
    'parent' => 0,
    'content' => '',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => '[[+arc_month_name]] [[+arc_year]] Archives',
    'description' => '',
    'isfolder' => 1,
    'introtext' => 'A lot can happen in a month',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'content_tpl' => 
      array (
        'name' => 'content_tpl',
        'value' => 'listing',
      ),
      'body_tpl' => 
      array (
        'name' => 'body_tpl',
        'value' => 'page',
      ),
      'page_icon' => 
      array (
        'name' => 'page_icon',
        'value' => '',
      ),
      'page_img' => 
      array (
        'name' => 'page_img',
        'value' => '',
      ),
      'fpost_ids' => 
      array (
        'name' => 'fpost_ids',
        'value' => '',
      ),
      'hero_banner' => 
      array (
        'name' => 'hero_banner',
        'value' => '',
      ),
      'carousel_ids' => 
      array (
        'name' => 'carousel_ids',
        'value' => '',
      ),
      'slider_ids' => 
      array (
        'name' => 'slider_ids',
        'value' => '',
      ),
      'listing_ids' => 
      array (
        'name' => 'listing_ids',
        'value' => '',
      ),
      'listbyparent' => 
      array (
        'name' => 'listbyparent',
        'value' => '',
      ),
    ),
    'others' => 
    array (
    ),
    'template' => 'MX Template',
    'published' => 1,
  ),
  5 => 
  array (
    'pagetitle' => 'Golden Gate Bridge',
    'alias' => 'golden-gate-bridge',
    'parent' => 'Home',
    'content' => '<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
</p>
<p>
    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
</p>
<p>
    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
</p>',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => 'Golden Gate Bridge',
    'description' => 'Golden Gate Bridge spans the San Francisco Bay.',
    'isfolder' => 0,
    'introtext' => 'Golden Gate Bridge spans the San Francisco Bay.',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'content_tpl' => 
      array (
        'name' => 'content_tpl',
        'value' => 'page',
      ),
      'body_tpl' => 
      array (
        'name' => 'body_tpl',
        'value' => 'page',
      ),
      'page_icon' => 
      array (
        'name' => 'page_icon',
        'value' => '',
      ),
      'page_img' => 
      array (
        'name' => 'page_img',
        'value' => 'assets/components/flatso/images/golden-gate-bridge.jpg',
      ),
      'fpost_ids' => 
      array (
        'name' => 'fpost_ids',
        'value' => '',
      ),
      'hero_banner' => 
      array (
        'name' => 'hero_banner',
        'value' => '',
      ),
      'carousel_ids' => 
      array (
        'name' => 'carousel_ids',
        'value' => '',
      ),
      'slider_ids' => 
      array (
        'name' => 'slider_ids',
        'value' => '',
      ),
      'listing_ids' => 
      array (
        'name' => 'listing_ids',
        'value' => '',
      ),
      'listbyparent' => 
      array (
        'name' => 'listbyparent',
        'value' => '',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'tagger-category',
        'value' => 'Landmarks',
      ),
    ),
    'template' => 'MX Template',
    'published' => 1,
  ),
  6 => 
  array (
    'pagetitle' => 'Redwood Forest',
    'alias' => 'redwood-forest',
    'parent' => 'Home',
    'content' => '<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
</p>
<p>
    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
</p>
<p>
    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
</p>',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => 'Redwood Forest',
    'description' => 'Find everything you need to plan your Northern California vacation in the redwoods.',
    'isfolder' => 0,
    'introtext' => 'Find everything you need to plan your Northern California vacation in the redwoods.',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'content_tpl' => 
      array (
        'name' => 'content_tpl',
        'value' => 'page',
      ),
      'body_tpl' => 
      array (
        'name' => 'body_tpl',
        'value' => 'page',
      ),
      'page_icon' => 
      array (
        'name' => 'page_icon',
        'value' => '',
      ),
      'page_img' => 
      array (
        'name' => 'page_img',
        'value' => 'assets/components/flatso/images/forest.jpg',
      ),
      'fpost_ids' => 
      array (
        'name' => 'fpost_ids',
        'value' => '',
      ),
      'hero_banner' => 
      array (
        'name' => 'hero_banner',
        'value' => '',
      ),
      'carousel_ids' => 
      array (
        'name' => 'carousel_ids',
        'value' => '',
      ),
      'slider_ids' => 
      array (
        'name' => 'slider_ids',
        'value' => '',
      ),
      'listing_ids' => 
      array (
        'name' => 'listing_ids',
        'value' => '',
      ),
      'listbyparent' => 
      array (
        'name' => 'listbyparent',
        'value' => '',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'tagger-category',
        'value' => 'Landmarks',
      ),
    ),
    'template' => 'MX Template',
    'published' => 1,
  ),
  7 => 
  array (
    'pagetitle' => 'Golden City',
    'alias' => 'golden-city',
    'parent' => 'Home',
    'content' => '<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
</p>
<p>
    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
</p>
<p>
    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
</p>',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => 'Golden City',
    'description' => '',
    'isfolder' => 0,
    'introtext' => 'Look at this beautiful color. ',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'content_tpl' => 
      array (
        'name' => 'content_tpl',
        'value' => 'page',
      ),
      'body_tpl' => 
      array (
        'name' => 'body_tpl',
        'value' => 'page',
      ),
      'page_icon' => 
      array (
        'name' => 'page_icon',
        'value' => '',
      ),
      'page_img' => 
      array (
        'name' => 'page_img',
        'value' => 'assets/components/flatso/images/golden-city.jpg',
      ),
      'fpost_ids' => 
      array (
        'name' => 'fpost_ids',
        'value' => '',
      ),
      'hero_banner' => 
      array (
        'name' => 'hero_banner',
        'value' => 'yes',
      ),
      'carousel_ids' => 
      array (
        'name' => 'carousel_ids',
        'value' => '',
      ),
      'slider_ids' => 
      array (
        'name' => 'slider_ids',
        'value' => '',
      ),
      'listing_ids' => 
      array (
        'name' => 'listing_ids',
        'value' => '',
      ),
      'listbyparent' => 
      array (
        'name' => 'listbyparent',
        'value' => '',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'tagger-category',
        'value' => 'Landscapes',
      ),
    ),
    'template' => 'MX Template',
    'published' => 1,
  ),
  8 => 
  array (
    'pagetitle' => 'Downtown Hustle',
    'alias' => 'downtown-hustle',
    'parent' => 'Home',
    'content' => '<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
</p>
<p>
    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
</p>
<p>
    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
</p>',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => 'Downtown Hustle',
    'description' => '',
    'isfolder' => 0,
    'introtext' => '',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'content_tpl' => 
      array (
        'name' => 'content_tpl',
        'value' => 'page',
      ),
      'body_tpl' => 
      array (
        'name' => 'body_tpl',
        'value' => 'page',
      ),
      'page_icon' => 
      array (
        'name' => 'page_icon',
        'value' => '',
      ),
      'page_img' => 
      array (
        'name' => 'page_img',
        'value' => 'assets/components/flatso/images/downtown.jpg',
      ),
      'fpost_ids' => 
      array (
        'name' => 'fpost_ids',
        'value' => '',
      ),
      'hero_banner' => 
      array (
        'name' => 'hero_banner',
        'value' => 'yes',
      ),
      'carousel_ids' => 
      array (
        'name' => 'carousel_ids',
        'value' => '',
      ),
      'slider_ids' => 
      array (
        'name' => 'slider_ids',
        'value' => '',
      ),
      'listing_ids' => 
      array (
        'name' => 'listing_ids',
        'value' => '',
      ),
      'listbyparent' => 
      array (
        'name' => 'listbyparent',
        'value' => '',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'tagger-category',
        'value' => 'Landscapes',
      ),
    ),
    'template' => 'MX Template',
    'published' => 1,
  ),
  9 => 
  array (
    'pagetitle' => 'Coastal Beach House',
    'alias' => 'coastal-beach-house',
    'parent' => 'Home',
    'content' => '<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
</p>
<p>
    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
</p>
<p>
    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
</p>',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => 'Coastal Beach House',
    'description' => 'The shores of Orange Park are a mellow sight.',
    'isfolder' => 0,
    'introtext' => 'The shores of Orange Park are a mellow sight.',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'content_tpl' => 
      array (
        'name' => 'content_tpl',
        'value' => 'page',
      ),
      'body_tpl' => 
      array (
        'name' => 'body_tpl',
        'value' => 'page',
      ),
      'page_icon' => 
      array (
        'name' => 'page_icon',
        'value' => '',
      ),
      'page_img' => 
      array (
        'name' => 'page_img',
        'value' => 'assets/components/flatso/images/beach-house.jpg',
      ),
      'fpost_ids' => 
      array (
        'name' => 'fpost_ids',
        'value' => '',
      ),
      'hero_banner' => 
      array (
        'name' => 'hero_banner',
        'value' => 'yes',
      ),
      'carousel_ids' => 
      array (
        'name' => 'carousel_ids',
        'value' => '',
      ),
      'slider_ids' => 
      array (
        'name' => 'slider_ids',
        'value' => '',
      ),
      'listing_ids' => 
      array (
        'name' => 'listing_ids',
        'value' => '',
      ),
      'listbyparent' => 
      array (
        'name' => 'listbyparent',
        'value' => '',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'tagger-category',
        'value' => 'Landmarks',
      ),
    ),
    'template' => 'MX Template',
    'published' => 1,
  ),
  10 => 
  array (
    'pagetitle' => 'Surf City',
    'alias' => 'surf-city',
    'parent' => 'Home',
    'content' => '<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
</p>
<p>
    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
</p>
<p>
    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
</p>',
    'context_key' => 'web',
    'class_key' => 'modDocument',
    'longtitle' => 'Surf City',
    'description' => 'Hang Ten Brah!',
    'isfolder' => 0,
    'introtext' => 'Hang Ten Brah!',
    'deleted' => 0,
    'menutitle' => '',
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'set_as_home' => 0,
    'tvs' => 
    array (
      'content_tpl' => 
      array (
        'name' => 'content_tpl',
        'value' => 'page',
      ),
      'body_tpl' => 
      array (
        'name' => 'body_tpl',
        'value' => 'page',
      ),
      'page_icon' => 
      array (
        'name' => 'page_icon',
        'value' => '',
      ),
      'page_img' => 
      array (
        'name' => 'page_img',
        'value' => 'assets/components/flatso/images/surf-city.jpg',
      ),
      'fpost_ids' => 
      array (
        'name' => 'fpost_ids',
        'value' => '',
      ),
      'hero_banner' => 
      array (
        'name' => 'hero_banner',
        'value' => 'yes',
      ),
      'carousel_ids' => 
      array (
        'name' => 'carousel_ids',
        'value' => '',
      ),
      'slider_ids' => 
      array (
        'name' => 'slider_ids',
        'value' => '',
      ),
      'listing_ids' => 
      array (
        'name' => 'listing_ids',
        'value' => '',
      ),
      'listbyparent' => 
      array (
        'name' => 'listbyparent',
        'value' => '',
      ),
    ),
    'others' => 
    array (
      0 => 
      array (
        'name' => 'tagger-category',
        'value' => 'Landscapes',
      ),
    ),
    'template' => 'MX Template',
    'published' => 1,
  ),
);

        if (isset($options['install_resources']) && empty($options['install_resources'])) return true;

        $resourceMap = getResourceMap();
        $toRemove = $resourceMap;
        $siteStart = $modx->getOption('site_start');

        foreach ($resources as $resource) {
            if (is_string($resource['parent'])) {
                if (isset($resourceMap[$resource['parent']])) {
                    $resource['parent'] = $resourceMap[$resource['parent']];
                } else {
                    /** @var modResource $parent */
                    $parent = $modx->getObject('modResource', array('pagetitle' => $resource['parent']));
                    if ($parent) {
                        $resource['parent'] = $parent->id;
                    }
                }
            } else {
                if ($resource['parent'] != 0) {
                    /** @var modResource $parent */
                    $parent = $modx->getObject('modResource', array('id' => $resource['parent']));
                    if ($parent) {
                        $resource['parent'] = $parent->id;
                    }
                } else {
                    $resource['parent'] = 0;
                }
            }

            if ($resource['template'] !== null) {
                if ($resource['template'] !== 0) {
                    $template = $modx->getObject('modTemplate', array('templatename' => $resource['template']));
                    if ($template) {
                        $resource['template'] = $template->id;
                    }
                } else {
                    $resource['template'] = 0;
                }
            }

            if ($resource['content_type'] !== null) {
                $content_type = $modx->getObject('modContentType', array('name' => $resource['content_type']));
                if ($content_type) {
                    $resource['content_type'] = $content_type->id;
                }
            } else {
                $resource['content_type'] = $modx->getOption('default_content_type', null, 1);
            }

            if (isset($resourceMap[$resource['pagetitle']])) {
                unset($toRemove[$resource['pagetitle']]);

                /** @var modResource $exists */
                $exists = $modx->getObject('modResource', array('id' => $resourceMap[$resource['pagetitle']]));
                if ($exists) {
                    $resource['id'] = $exists->id;
                    $resId = updateResource($resource);

                    if ($resId !== false) {
                        $resourceMap[$resource['pagetitle']] = $resId;
                    }
                } else {
                    if ($resource['set_as_home'] == 1) {
                        unset($resource['set_as_home']);
                        $resource['id'] = $siteStart;

                        $resId = updateResource($resource);

                        if ($resId !== false) {
                            $resourceMap[$resource['pagetitle']] = $resId;
                        }
                    } else {
                        $resId = createResource($resource);

                        if ($resId !== false) {
                            $resourceMap[$resource['pagetitle']] = $resId;
                        }
                    }
                }
            } else {
                if ($resource['set_as_home'] == 1) {
                    unset($resource['set_as_home']);
                    $resource['id'] = $siteStart;
                
                    $resId = updateResource($resource);
                
                    if ($resId !== false) {
                        $resourceMap[$resource['pagetitle']] = $resId;
                    }
                } else {
                    $resId = createResource($resource);

                    if ($resId !== false) {
                        $resourceMap[$resource['pagetitle']] = $resId;
                    }
                }
            }
        }

        foreach ($toRemove as $pageTitle => $resource) {
            unset($resourceMap[$pageTitle]);

            if ($resource == $siteStart) continue;

            /** @var modResource $modResource */
            $modResource = $modx->getObject('modResource', $resource);
            if ($modResource) {
                $modx->updateCollection('modResource', array('parent' => 0), array('parent' => $resource));

                $modResource->remove();
            }
        }

        setResourceMap($resourceMap);

        break;
    case xPDOTransport::ACTION_UNINSTALL:

        break;
}

return true;
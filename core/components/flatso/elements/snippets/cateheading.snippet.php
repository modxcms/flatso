<?php
$get = modX::sanitize($_GET, $modx->sanitizePatterns);
$name = str_replace("-", " ", urldecode($get['category']));
$modx->setPlaceholder('cateName', $name);

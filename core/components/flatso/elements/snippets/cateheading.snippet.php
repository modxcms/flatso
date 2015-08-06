<?php
$get = modX::sanitize($_GET, $modx->sanitizePatterns);
$modx->setPlaceholder('cateName', urldecode($get['category']));
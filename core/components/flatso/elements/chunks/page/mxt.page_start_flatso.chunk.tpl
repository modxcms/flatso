<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Blog">
<head>
    <!-- You have loaded Theme "[[++theme]]" -->
    <!-- You have Selected Content Template [[*content_tpl]] -->
    <title>[[*longtitle:default=`[[*pagetitle]]`]] | [[++cc_site_title]]</title>
    <base href="[[!++site_url]]" />
    <meta itemprop="url" content="[[!++site_url]][[~[[*id]]]]">
    [[$mxt.global_meta_flatso]]
    [[$mxt.global_assets_flatso]]

</head>
<body class="[[*content_tpl]] [[*content_tpl]]-[[*id]]">
[[[[*mxg-ad:is=``:then=`-`:else=``]]getResources? &resources=`[[*mxg-ad]]` &tpl=`mxg-ad-content` &includeContent=`1` &limit=`1`]]

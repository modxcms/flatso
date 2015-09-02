<!DOCTYPE html>
<html lang="en">
<head>
    <!-- You have loaded Theme "[[++theme]]" -->
    <!-- You have Selected Content Template [[*content_tpl]] -->
    <title>[[*longtitle:default=`[[*pagetitle]]`]] | [[++cc_site_title]]</title>
    <base href="[[!++site_url]]" />
    <link rel="alternate" type="application/rss+xml" title="[[++site_name]]" href="[[!++site_url]][[~12]]" />
    [[$mxt.global_meta_flatso]]
    [[$mxt.global_assets_flatso]]

</head>
<body class="[[*content_tpl]] [[*content_tpl]]-[[*id]]">
[[*id:eq=`[[++flatso.archive_id]]`:then=`[[!getArchives? &parents=`[[++flatso.blog_id]]` &toPlaceholder=`archives` &tpl=`tpl.feature_listing_flatso` &includeTVs=`1` &processTVs=`1` &tvPrefix=`tv.`]]`]]
[[*id:eq=`[[++flatso.category_id]]`:then=`[[!cateHeading]]`]]

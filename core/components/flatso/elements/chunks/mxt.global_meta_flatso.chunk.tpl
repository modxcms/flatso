
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta itemprop="description" content="[[*description]]">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="article">
<meta property="og:title" content="[[*longtitle:default=`[[*pagetitle]]`]]">
<meta property="og:description" content="[[*description]]">
[[*page_img:notempty=`<meta property="og:image" content="[[!++site_url]][[*page_img]]" />`]]
[[switch?
&get=`[[*id]]`
&c1=`[[++flatso.category_id]]` &do1=``
&c2=`[[++flatso.archive_id]]` &do2=``
&default=`
<meta property="og:url" content="[[!++site_url]][[*id:is=`1`:then=``:else=`[[*uri]]`]]">
<link rel="canonical" href="[[!++site_url]][[*id:is=`1`:then=``:else=`[[*uri]]`]]">
`
]]

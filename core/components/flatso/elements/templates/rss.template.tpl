<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">

    <channel>
        <title>[[++site_name]]</title>
        <link>[[!++site_url]]</link>
        <description>[[*description]]</description>
        <pubDate>[[*publishedon:strtotime:date=`%a, %e %b %Y`]] 17:00:00 +0000</pubDate>
        [[getResources? &parents=`[[++flatso.blog_id]]` &depth=`0` &limit=`30` &sortby=`{"publishedon":"DESC"}` &tpl=`rss-item`]]
    </channel>
</rss>

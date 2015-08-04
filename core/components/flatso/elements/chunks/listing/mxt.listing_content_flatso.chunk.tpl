[[*hero_banner:is=`yes`:then=`<div class="hero--banner" style="background-image: url([[*page_img]]);">
    [[++cc_logo:notempty=`<img src="[[++cc_logo]]" alt="[[++site_name]]" class="logo">`]]
</div>`]]
<main role="main" class="container clearfix [[*hero_banner:is=`yes`:then=`hero--on`]]">
    <section role="region">
        <article tabindex="0" id="nextItem">

            [[switch?
            &get=`[[*id]]`
            &c1=`[[++flatso.archive_id]]` &do1=`<h1>[[*longtitle]]</h1>[[+archives]]`
            &c2=`[[++flatso.category_id]]` &do2=`
            <h1>[[+cateName:empty=`[[*longtitle]]`:default=`[[+cateName]]`]]</h1>
            [[!getPage?
                &elementClass=`modSnippet`
                &element=`getResources`
                &parents=`[[++flatso.blog_id]]`
                &limit=`5`
                &depth=`0`
                &pageVarKey=`page`
                &includeTVs=`1`
                &processTVs=`1`
                &tvPrefix=`tv.`
                &sortby=`publishedon`
                &sortdir=`DESC`
                &where=`[[!TaggerGetResourcesWhere]]`
                &tpl=`tpl.feature_listing_flatso`
            ]]
            `

            &default=`
            [[!getPage?
                &elementClass=`modSnippet`
                &element=`getResources`
                &parents=`[[*id]]`
                &depth=`0`
                &limit=`5`
                &pageVarKey=`page`
                &includeTVs=`1`
                &processTVs=`1`
                &tvPrefix=`tv.`
                &tpl=`tpl.feature_listing_flatso`
                &sortby=`publishedon`
                &sortdir=`DESC`
            ]]
            `]]

            [[!+page.nav:notempty=`<div class="paging clearfix"><ul>[[!+page.nav]]</ul></div>`]]
        </article>

    </section>

    [[$mxt.listing_aside_flatso]]

</main>
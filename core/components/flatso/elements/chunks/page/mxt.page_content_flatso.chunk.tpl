[[*hero_banner:is=`yes`:then=`<div class="hero--banner" style="background-image: url([[*page_img]]);">
    [[++cc_logo:notempty=`<img src="[[++cc_logo]]" alt="[[++site_name]]" class="logo">`]]
</div>`]]
<main role="main" class="container clearfix [[*hero_banner:is=`yes`:then=`hero--on`]]">
    <section role="region">
        <article aria-labelledby="heading" tabindex="0" id="nextItem">
            <h1 id="heading" itemprop="headline">[[*longtitle]]</h1>
            <p class="page--meta">By: <span itemprop="author">[[*createdby:userinfo=`fullname`]]</span> on <span itemprop="datePublished">[[*publishedon:strtotime:date=`%Y-%m-%d`]]</span></p>
            <div itemprop="text">[[*content]]</div>
        </article>
    </section>
</main>
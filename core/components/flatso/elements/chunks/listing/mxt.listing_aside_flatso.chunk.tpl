<aside tabindex="3">
    [[++cc_sidebar_title:notempty=`
    <div class="aside--widget">
        <h3>[[++cc_sidebar_title]]</h3>
        <div class="aside--widget--inner">
            [[++cc_sidebar_img:notempty=`<img class="fit" alt="[[++cc_sidebar_subtitle]]" src="[[++cc_sidebar_img:phpthumbof=`w=300`]]">`]]
            [[++cc_sidebar_subtitle:notempty=`<p class="bold">[[++cc_sidebar_subtitle]]</p>`]]
            [[++cc_sidebar_message:notempty=`<p>[[++cc_sidebar_message]]</p>`]]
        </div>
    </div><!--eof widget-->
    `]]

    <div class="aside--widget">
        <h3>[[++cc_social_title]]</h3>
        <div class="aside--widget--inner">
            [[++cc_facebook_link:notempty=`
            <a class="social--link" href="[[++cc_facebook_link]]"><span><img src="[[++cc_facebook_icon]]" alt="Facebook"></span> Facebook</a>
            `]]
            [[++cc_twitter_link:notempty=`
            <a class="social--link" href="[[++cc_twitter_link]]"><span><img src="[[++cc_twitter_icon]]" alt="Twitter"></span> Twitter</a>
            `]]
            [[++cc_rss_link:notempty=`
            <a class="social--link" href="[[++cc_rss_link]]"><span><img src="[[++cc_rss_icon]]" alt="RSS"></span> RSS</a>
            `]]
        </div>
    </div><!--eof widget-->

    [[*fpost_ids:notempty=`
    <div class="aside--widget">
        <h3>[[++cc_featured_title]]</h3>
        <div class="aside--widget--inner">
            [[getResources?
            &parents=`-1`
            &resources=`[[*fpost_ids:is=`default`:then=`[[++mxt.default_fposts]]`:else=`[[*fpost_ids]]`]]`
            &sortdir=`ASC`
            &tpl=`tpl.feature_featured_posts_sidebar_[[++mxt.theme]]`
            &includeTVs=`1` &processTVs=`1` &tvPrefix=`tv.`
            ]]
        </div>
    </div><!--eof widget-->
    `]]

</aside>
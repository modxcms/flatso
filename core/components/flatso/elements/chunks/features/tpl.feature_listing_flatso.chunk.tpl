<div class="listing--item">
    <div class="listing--item--date">
        <span>[[+publishedon:strtotime:date=`%B %e, %Y`]]</span>
    </div>
    <h2><a href="[[~[[+id]]]]" title="[[+pagetitle]]">[[+menutitle:default=`[[+pagetitle]]`]]</a></h2>
    <div class="listing--item--meta">Posted by [[*createdby:userinfo=`fullname`]] in [[!TaggerGetTags? &resources=`[[+id]]` &rowTpl=`tpl.listing_tag_flatso`]]</div>

    [[+tv.page_img:notempty=`<p><a href="[[~[[+id]]]]"><img class="fit" src="[[+tv.page_img:phpthumbof=`w=700&zc=1`]]" alt="[[+pagetitle]]"></a></p>`]]

    <p>[[+introtext]]</p>

</div>
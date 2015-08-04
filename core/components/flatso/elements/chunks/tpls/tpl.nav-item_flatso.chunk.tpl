<li role="menuitem" aria-haspopup="true">
    <a href="[[~[[+id]]]]" title="[[+pagetitle]]">[[+menutitle:default=`[[+pagetitle]]`]]</a>
    [[+id:eq=`[[++flatso.archive_id]]`:then=`<ul class="modx-subnav" aria-hidden="true" role="menu">[[Archivist? &parents=`[[++flatso.blog_id]]` &target=`[[++flatso.archive_id]]` &tpl=`tpl.arc_list_flatso`]]</ul>`]]
    [[+id:eq=`[[++flatso.category_id]]`:then=`<ul class="modx-subnav" aria-hidden="true" role="menu">[[TaggerGetTags? &groups=`category` &rowTpl=`tpl.tag_list_flatso` &target=`[[++flatso.category_id]]`]]</ul>`]]
</li>
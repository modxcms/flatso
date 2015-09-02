<style>
    body{[[++cc_body_font]] line-height: 1.5rem; background-color:#[[++cc_body_bg_color]];color:#[[++cc_body_font_color]];}
    h1,h2,h3,strong,.bold{[[++cc_heading_font]]} .light{[[++cc_light_font]]}
    body a{color:#[[++cc_primary_color]];text-decoration:none;}

    /*mobile nav*/
    body:after {background: #[[++cc_mobile_background]];content: '';height: 100%;left: 0;opacity: 0;overflow: hidden;padding: 0;position: absolute;z-index: 999;top: 0;visibility: hidden;transition: all 0.4s ease;width: 100%;}
    .b-nav li a{color: #[[++cc_mobile_link]];} .b-link{color: #[[++cc_mobile_link]];border-left:2px solid #[[++cc_mobile_link]];}.b-link:hover {color: #[[++cc_mobile_link_hover]];}
    .b-link--active {border-left: 2px solid #[[++cc_mobile_link]];padding-left: 10px;}
    .b-menu{background: #[[++cc_mobile_background]]; border:2px solid #[[++cc_mobile_background]];}.b-menu:hover {border:2px solid #[[++cc_mobile_background]];}
    .b-bun {background: #[[++cc_mobile_link]];position:relative;transition: all 0.4s ease;}
    .b-container:hover:not(.open) .bun-top,.b-container:hover:not(.open) .bun-mid,.b-container:hover:not(.open) .bun-bottom {background: #[[++cc_mobile_background]];}
    .b-container.open .b-main{border:2px solid #[[++cc_mobile_link]];}.b-container.open .b-bun--top,.b-container.open .b-bun--bottom {background: #[[++cc_mobile_link]];}

        /*header*/
    header{width:100%;background-color:#[[++cc_header_background]];}
    nav ul li{position:relative;z-index:9999;display:inline-block;color:#[[++cc_nav_link]];[[++cc_light_font]]}nav ul li a{text-transform:uppercase;[[++cc_light_font]]display:block;padding:.35rem 1rem;color:#[[++cc_nav_link]];font-size:1rem;border-top:2px solid #[[++cc_header_background]];border-bottom:2px solid #[[++cc_header_background]];}
    nav ul li:hover > a{color:#[[++cc_nav_link_hover]];border-top:2px solid #[[++cc_nav_link_hover]];}
    nav ul li ul{width:12rem;background-color:#[[++cc_header_background]];}

        /*listing*/
    body.listing main > section h1{color:#FFF;background-color:#[[++cc_primary_color]];}
    .listing--item{padding:3rem 2rem;border-bottom:1px solid #[[++cc_body_bg_color]];}
    .listing--item--date span{[[++cc_light_font]]background-color:#[[++cc_primary_color]];color:#FFF;}
    .listing--item h2 a{color:#[[++cc_secondary_color]];}.listing--item h2 a:hover{color:#[[++cc_primary_color]];}
    .listing--item--meta{[[++cc_light_font]]text-align:center;text-transform:uppercase;}
    .paging li{background-color:#[[++cc_primary_color]];}
    .paging li a{color:#FFF;opacity:.6;}.paging li a.active,.paging li a:hover{opacity:1 !important;}

        /*aside*/
    .aside--widget{background-color:#FFF;border-bottom:2px solid #[[++cc_secondary_color]];}
    .aside--widget h3{border-left:4px solid #[[++cc_secondary_color]];background-color:#[[++cc_primary_color]];color:#FFF;}

        /*social links*/
    .social--link{color:#[[++cc_secondary_color]];}
    .social--link:hover{background-color:#f2f2f2;}
    .social--link span{background-color:#[[++cc_primary_color]];}

        /*page*/
    body.page main{background-color:#FFF;}
    body.page main > section > article > h1{border-bottom: 1px solid #[[++cc_primary_color]];}
    body.page .page--meta{color:#[[++cc_third_color]];[[++cc_light_font]]}
    body.page main a{color:#[[++cc_primary_color]];text-decoration:none;}

    blockquote{color:#[[++cc_third_color]];border-left:3px solid #[[++cc_primary_color]]; padding: .5rem 1rem; margin:1rem 0;}

        /*featured post*/
    .feat--post h4 a{color:#[[++cc_secondary_color]];}.feat--post h4 a:hover{color:#[[++cc_primary_color]];}

    /*forms*/
    input,textarea,select{border:1px solid #[[++cc_third_color]] !important;}
    form button[type="submit"]{background-color:#[[++cc_primary_color]];} form button[type="submit"]:hover{color: #FFF;}

    /*tables*/
    table{border-bottom:1px solid #[[++cc_third_color]];}
    table thead{border-bottom:1px solid #[[++cc_primary_color]];}
</style>

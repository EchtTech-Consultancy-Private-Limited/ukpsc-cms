<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
$url = base_url();
$newurl = dirname($url);
//echo $newurl;
?>
   <head>
      <meta charset="utf-8" />
      <link rel="shortcut icon" href="<?php echo $newurl."/sites/default/files/favicon.png"?>" type="image/png" />
      <meta name="generator" content="Drupal (https://www.drupal.org)" />
      <link rel="canonical" href="<?php echo $newurl ?>" />
      <link rel="shortlink" href="<?php echo $newurl ?>" />
      <title>CPRI | Online Test/Calibration Date Booking Request</title>
      <meta name="MobileOptimized" content="width">
      <meta name="HandheldFriendly" content="true">
      <meta name="viewport" content="width=device-width">
      <style>
         @import url("<?php echo $newurl; ?>/sites/all/modules/views_slideshow/views_slideshow.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/jquery_update/replace/ui/themes/base/jquery.ui.core.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/jquery_update/replace/ui/themes/base/jquery.ui.theme.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/jquery_update/replace/ui/themes/base/jquery.ui.tabs.css?qltzki");
      </style>
      <style>
         @import url("<?php echo $newurl; ?>/sites/all/modules/date/date_api/date.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/date/date_popup/themes/datepicker.1.7.css?qltzki");
         @import url("<?php echo $newurl; ?>/modules/field/theme/field.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/google_cse/google_cse.css?qltzki");
         @import url("<?php echo $newurl; ?>/modules/search/search.css?qltzki");
         @import url("<?php echo $newurl; ?>/modules/user/user.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/extlink/css/extlink.css?qltzki");
         @import url("<?php echo $newurl; ?>/modules/forum/forum.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/views/css/views.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/ckeditor/css/ckeditor.css?qltzki");
      </style>
      <style>
         @import url("<?php echo $newurl; ?>/sites/all/modules/ctools/css/ctools.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/lightbox2/css/lightbox.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/video/css/video.css?qltzki");
         @import url("<?php echo $newurl; ?>/modules/locale/locale.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/vscc/vscc.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/views_slideshow/contrib/views_slideshow_cycle/views_slideshow_cycle.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/jcarousel/skins/tango/jcarousel-tango.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/megamenu/megamenu.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/modules/megamenu/megamenu-skins.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/libraries/superfish/css/superfish.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/libraries/superfish/css/superfish-smallscreen.css?qltzki");
      </style>
      <style>
         @import url("<?php echo $newurl; ?>/sites/all/themes/zen/css/custom.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/themes/zen/css/style.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/themes/zen/css/reset.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/themes/zen/css/site-change.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/themes/zen/zen-internals/css/styles.css?qltzki");
         @import url("<?php echo $newurl; ?>/sites/all/themes/zen/new/css/font.css");
         @import url("<?php echo $newurl; ?>/sites/all/themes/zen/new/css/bootstrap.min.css");
         @import url("<?php echo $newurl; ?>/sites/all/themes/zen/new/css/fontawesome.min.css");
         @import url("<?php echo $newurl; ?>/sites/all/themes/zen/new/css/style.css");

       
      </style>
      <style>
        .main-wrapper {
            min-height: 40vh;
        }
      </style>
        <script src="<?php echo base_url()."assets/new/js/jquery.min.js";?>"></script>
      <script src="<?php echo base_url()."assets/new/js/bootstrap.bundle.min.js";?>"></script>
      <!-- <script src="//code.jquery.com/jquery-1.7.2.js"></script> -->
      <script>window.jQuery || document.write("<script src='/cpri/sites/all/modules/jquery_update/replace/jquery/1.7/jquery.js'>\x3C/script>")</script>
      <script src="<?php echo $newurl; ?>/misc/jquery-extend-3.4.0.js?v=1.7.2"></script>
      <script src="<?php echo $newurl; ?>/misc/jquery.once.js?v=1.2"></script>
      <script src="<?php echo $newurl; ?>/misc/drupal.js?qltzki"></script>

      <script>window.jQuery.ui || document.write("<script src='/cpri/sites/all/modules/jquery_update/replace/ui/ui/jquery-ui.js'>\x3C/script>")</script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/views_slideshow/js/views_slideshow.js?v=1.0"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/jquery_update/replace/ui/external/jquery.cookie.js?v=67fb34f6a866c40d0570"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/jquery_update/replace/misc/jquery.form.js?v=2.69"></script>
      <script src="<?php echo $newurl; ?>/misc/jquery.ba-bbq.js?v=1.2.1"></script>
      <script src="<?php echo $newurl; ?>/misc/ajax.js?v=7.69"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/jquery_update/js/jquery_update.js?v=0.0.1"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/google_cse/google_cse.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/spamspan/spamspan.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/lightbox2/js/lightbox.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/video/js/video.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/views/js/base.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/misc/progress.js?v=7.69"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/vscc/js/vscc.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/libraries/jquery.cycle/jquery.cycle.all.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/views_slideshow/contrib/views_slideshow_cycle/js/views_slideshow_cycle.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/jcarousel/js/jcarousel.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/megamenu/megamenu.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/views/js/ajax_view.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/jcarousel/js/jquery.jcarousel.min.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/extlink/js/extlink.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/libraries/fontawesome/js/all.js?qltzki" data-search-pseudo-elements="1"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/quicktabs/js/qt_ui_tabs.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/libraries/superfish/jquery.hoverIntent.minified.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/libraries/superfish/sfsmallscreen.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/libraries/superfish/supposition.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/libraries/superfish/superfish.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/libraries/superfish/supersubs.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/modules/superfish/superfish.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/themes/zen/js/custom.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/themes/zen/js/switcher.js?qltzki"></script>
      <script src="<?php echo $newurl; ?>/sites/all/themes/zen/js/font-size.js?qltzki"></script>
      <script>jQuery.extend(Drupal.settings, {"basePath":"\/cpri\/","pathPrefix":"","ajaxPageState":{"theme":"zen","theme_token":"cw5QMrfUpu1vmMFRexZBUXmjCjgiUcavLkcBLL2vi44","jquery_version":"1.7","js":{"\/\/code.jquery.com\/jquery-1.7.2.js":1,"0":1,"misc\/jquery-extend-3.4.0.js":1,"misc\/jquery.once.js":1,"misc\/drupal.js":1,"\/\/code.jquery.com\/ui\/.2\/jquery-ui.js":1,"1":1,"sites\/all\/modules\/views_slideshow\/js\/views_slideshow.js":1,"sites\/all\/modules\/jquery_update\/replace\/ui\/external\/jquery.cookie.js":1,"sites\/all\/modules\/jquery_update\/replace\/misc\/jquery.form.js":1,"misc\/jquery.ba-bbq.js":1,"misc\/ajax.js":1,"sites\/all\/modules\/jquery_update\/js\/jquery_update.js":1,"sites\/all\/modules\/google_cse\/google_cse.js":1,"sites\/all\/modules\/spamspan\/spamspan.js":1,"sites\/all\/modules\/lightbox2\/js\/lightbox.js":1,"sites\/all\/modules\/video\/js\/video.js":1,"sites\/all\/modules\/views\/js\/base.js":1,"misc\/progress.js":1,"sites\/all\/modules\/vscc\/js\/vscc.js":1,"sites\/all\/libraries\/jquery.cycle\/jquery.cycle.all.js":1,"sites\/all\/modules\/views_slideshow\/contrib\/views_slideshow_cycle\/js\/views_slideshow_cycle.js":1,"sites\/all\/modules\/jcarousel\/js\/jcarousel.js":1,"sites\/all\/modules\/megamenu\/megamenu.js":1,"sites\/all\/modules\/views\/js\/ajax_view.js":1,"sites\/all\/modules\/jcarousel\/js\/jquery.jcarousel.min.js":1,"sites\/all\/modules\/extlink\/js\/extlink.js":1,"sites\/all\/libraries\/fontawesome\/js\/all.js":1,"sites\/all\/modules\/quicktabs\/js\/qt_ui_tabs.js":1,"sites\/all\/libraries\/superfish\/jquery.hoverIntent.minified.js":1,"sites\/all\/libraries\/superfish\/sfsmallscreen.js":1,"sites\/all\/libraries\/superfish\/supposition.js":1,"sites\/all\/libraries\/superfish\/superfish.js":1,"sites\/all\/libraries\/superfish\/supersubs.js":1,"sites\/all\/modules\/superfish\/superfish.js":1,"sites\/all\/themes\/zen\/js\/custom.js":1,"sites\/all\/themes\/zen\/js\/switcher.js":1,"sites\/all\/themes\/zen\/js\/font-size.js":1},"css":{"modules\/system\/system.base.css":1,"modules\/system\/system.menus.css":1,"modules\/system\/system.messages.css":1,"modules\/system\/system.theme.css":1,"sites\/all\/modules\/views_slideshow\/views_slideshow.css":1,"misc\/ui\/jquery.ui.core.css":1,"misc\/ui\/jquery.ui.theme.css":1,"misc\/ui\/jquery.ui.tabs.css":1,"modules\/comment\/comment.css":1,"sites\/all\/modules\/date\/date_api\/date.css":1,"sites\/all\/modules\/date\/date_popup\/themes\/datepicker.1.7.css":1,"modules\/field\/theme\/field.css":1,"sites\/all\/modules\/google_cse\/google_cse.css":1,"modules\/node\/node.css":1,"modules\/search\/search.css":1,"modules\/user\/user.css":1,"sites\/all\/modules\/extlink\/css\/extlink.css":1,"modules\/forum\/forum.css":1,"sites\/all\/modules\/views\/css\/views.css":1,"sites\/all\/modules\/ckeditor\/css\/ckeditor.css":1,"sites\/all\/modules\/ctools\/css\/ctools.css":1,"sites\/all\/modules\/lightbox2\/css\/lightbox.css":1,"sites\/all\/modules\/video\/css\/video.css":1,"modules\/locale\/locale.css":1,"sites\/all\/modules\/vscc\/vscc.css":1,"sites\/all\/modules\/views_slideshow\/contrib\/views_slideshow_cycle\/views_slideshow_cycle.css":1,"sites\/all\/modules\/jcarousel\/skins\/tango\/jcarousel-tango.css":1,"sites\/all\/modules\/megamenu\/megamenu.css":1,"sites\/all\/modules\/megamenu\/megamenu-skins.css":1,"sites\/all\/libraries\/superfish\/css\/superfish.css":1,"sites\/all\/libraries\/superfish\/css\/superfish-smallscreen.css":1,"sites\/all\/themes\/zen\/system.base.css":1,"sites\/all\/themes\/zen\/system.menus.css":1,"sites\/all\/themes\/zen\/system.messages.css":1,"sites\/all\/themes\/zen\/system.theme.css":1,"sites\/all\/themes\/zen\/comment.css":1,"sites\/all\/themes\/zen\/node.css":1,"sites\/all\/themes\/zen\/css\/custom.css":1,"sites\/all\/themes\/zen\/css\/style.css":1,"sites\/all\/themes\/zen\/css\/reset.css":1,"sites\/all\/themes\/zen\/css\/change.css":1,"sites\/all\/themes\/zen\/css\/site-change.css":1,"sites\/all\/themes\/zen\/zen-internals\/css\/styles.css":1}},"googleCSE":{"cx":"","language":"","resultsWidth":600,"domain":"www.google.com","showWaterMark":true},"jcarousel":{"ajaxPath":"\/cpri\/jcarousel\/ajax\/views","carousels":{"jcarousel-dom-1":{"view_options":{"view_args":"","view_path":"node","view_base_path":null,"view_display_id":"block","view_name":"laboratories_across_india_","jcarousel_dom_id":1},"wrap":"both","skin":"tango","responsive":1,"autoPause":1,"start":1,"selector":".jcarousel-dom-1"},"jcarousel-dom-2":{"view_options":{"view_args":"","view_path":"node","view_base_path":null,"view_display_id":"block","view_name":"expertise","jcarousel_dom_id":2},"wrap":"both","skin":"tango","responsive":1,"autoPause":1,"start":1,"selector":".jcarousel-dom-2"},"jcarousel-dom-3":{"view_options":{"view_args":"","view_path":"node","view_base_path":null,"view_display_id":"block","view_name":"footer_carousel","jcarousel_dom_id":3},"wrap":"both","skin":"tango","responsive":1,"autoPause":1,"start":1,"selector":".jcarousel-dom-3"}}},"lightbox2":{"rtl":"0","file_path":"\/cpri\/(\\w\\w\/)public:\/","default_image":"\/cpri\/sites\/all\/modules\/lightbox2\/images\/brokenimage.jpg","border_size":10,"font_color":"000","box_color":"fff","top_position":"","overlay_opacity":"0.8","overlay_color":"000","disable_close_click":true,"resize_sequence":0,"resize_speed":400,"fade_in_speed":400,"slide_down_speed":600,"use_alt_layout":false,"disable_resize":false,"disable_zoom":false,"force_show_nav":false,"show_caption":true,"loop_items":false,"node_link_text":"View Image Details","node_link_target":false,"image_count":"Image !current of !total","video_count":"Video !current of !total","page_count":"Page !current of !total","lite_press_x_close":"press \u003Ca href=\u0022#\u0022 onclick=\u0022hideLightbox(); return FALSE;\u0022\u003E\u003Ckbd\u003Ex\u003C\/kbd\u003E\u003C\/a\u003E to close","download_link_text":"","enable_login":false,"enable_contact":false,"keys_close":"c x 27","keys_previous":"p 37","keys_next":"n 39","keys_zoom":"z","keys_play_pause":"32","display_image_size":"original","image_node_sizes":"()","trigger_lightbox_classes":"","trigger_lightbox_group_classes":"","trigger_slideshow_classes":"","trigger_lightframe_classes":"","trigger_lightframe_group_classes":"","custom_class_handler":0,"custom_trigger_classes":"","disable_for_gallery_lists":true,"disable_for_acidfree_gallery_lists":true,"enable_acidfree_videos":true,"slideshow_interval":5000,"slideshow_automatic_start":true,"slideshow_automatic_exit":true,"show_play_pause":true,"pause_on_next_click":false,"pause_on_previous_click":true,"loop_slides":false,"iframe_width":600,"iframe_height":400,"iframe_border":1,"enable_video":false,"useragent":"Mozilla\/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko\/20100101 Firefox\/84.0"},"viewsSlideshow":{"home_banner-block_1":{"methods":{"goToSlide":["viewsSlideshowPager","viewsSlideshowSlideCounter","viewsSlideshowCycle"],"nextSlide":["viewsSlideshowPager","viewsSlideshowSlideCounter","viewsSlideshowCycle"],"pause":["viewsSlideshowControls","viewsSlideshowCycle"],"play":["viewsSlideshowControls","viewsSlideshowCycle"],"previousSlide":["viewsSlideshowPager","viewsSlideshowSlideCounter","viewsSlideshowCycle"],"transitionBegin":["viewsSlideshowPager","viewsSlideshowSlideCounter"],"transitionEnd":[]},"paused":0},"home_notifications-block_1":{"methods":{"goToSlide":["viewsSlideshowPager","viewsSlideshowSlideCounter","viewsSlideshowCycle"],"nextSlide":["viewsSlideshowPager","viewsSlideshowSlideCounter","viewsSlideshowCycle"],"pause":["viewsSlideshowControls","viewsSlideshowCycle"],"play":["viewsSlideshowControls","viewsSlideshowCycle"],"previousSlide":["viewsSlideshowPager","viewsSlideshowSlideCounter","viewsSlideshowCycle"],"transitionBegin":["viewsSlideshowPager","viewsSlideshowSlideCounter"],"transitionEnd":[]},"paused":0}},"viewsSlideshowControls":{"home_banner-block_1":{"bottom":{"type":"vsccControls"}},"home_notifications-block_1":{"bottom":{"type":"vsccControls"}}},"viewsSlideshowCycle":{"#views_slideshow_cycle_main_home_banner-block_1":{"num_divs":3,"id_prefix":"#views_slideshow_cycle_main_","div_prefix":"#views_slideshow_cycle_div_","vss_id":"home_banner-block_1","effect":"fade","transition_advanced":0,"timeout":5000,"speed":700,"delay":0,"sync":1,"random":0,"pause":1,"pause_on_click":0,"play_on_hover":0,"action_advanced":0,"start_paused":0,"remember_slide":0,"remember_slide_days":1,"pause_in_middle":0,"pause_when_hidden":0,"pause_when_hidden_type":"full","amount_allowed_visible":"","nowrap":0,"pause_after_slideshow":0,"fixed_height":1,"items_per_slide":1,"wait_for_image_load":1,"wait_for_image_load_timeout":3000,"cleartype":0,"cleartypenobg":0,"advanced_options":"{}"},"#views_slideshow_cycle_main_home_notifications-block_1":{"num_divs":3,"id_prefix":"#views_slideshow_cycle_main_","div_prefix":"#views_slideshow_cycle_div_","vss_id":"home_notifications-block_1","effect":"fade","transition_advanced":0,"timeout":5000,"speed":700,"delay":0,"sync":1,"random":0,"pause":1,"pause_on_click":0,"play_on_hover":0,"action_advanced":0,"start_paused":0,"remember_slide":0,"remember_slide_days":1,"pause_in_middle":0,"pause_when_hidden":0,"pause_when_hidden_type":"full","amount_allowed_visible":"","nowrap":0,"pause_after_slideshow":0,"fixed_height":1,"items_per_slide":1,"wait_for_image_load":1,"wait_for_image_load_timeout":3000,"cleartype":0,"cleartypenobg":0,"advanced_options":"{}"}},"megamenu":{"timeout":"500","sizewait":"250","hoverwait":"400"},"urlIsAjaxTrusted":{"\/cpri\/":true},"superfish":{"1":{"id":"1","sf":{"animation":{"opacity":"show","height":"show"},"speed":"fast","autoArrows":false},"plugins":{"smallscreen":{"mode":"window_width","breakpointUnit":"px","title":"Main menu"},"supposition":true,"supersubs":true}}},"quicktabs":{"qt_home_tab":{"name":"home_tab","active_tab":"0","history":0},"qt_home_photo_video_gallery":{"name":"home_photo_video_gallery","active_tab":999999,"history":0}},"extlink":{"extTarget":"_blank","extClass":"ext","extLabel":"(link is external)","extImgClass":0,"extIconPlacement":0,"extSubdomains":1,"extExclude":"","extInclude":"","extCssExclude":"","extCssExplicit":"","extAlert":"_blank","extAlertText":"This link will take you to an external web site.","mailtoClass":"mailto","mailtoLabel":"(link sends e-mail)","extUseFontAwesome":0}});</script>
      <!--[if lt IE 9]>
      <script src="/cpri/sites/all/themes/zen/js/html5shiv.min.js"></script>
      <![endif]-->
    
      
      <script type="text/javascript" src="<?php echo base_url()."assets/js/jquery.min.js";?>"></script>
      <script type="text/javascript" src="<?php echo base_url()."assets/js/test_date_booking_request.js";?>"></script> 
      <script src="<?php echo base_url()."assets/js/fullcalendar/lib/moment.min.js";?>"></script>
      
      <!-- <script src="./assets/js/fullcalendar/lib/jquery.min.js"></script> -->
      <script src="<?php echo base_url()."assets/js/fullcalendar/fullcalendar.min.js";?>"></script>
      <link rel="stylesheet" href="<?php echo base_url()."assets/js/fullcalendar/fullcalendar.min.css";?>">
      <link rel="stylesheet" href="<?php echo base_url()."assets/css/custom.css";?>">
     
      <!-- Theme initialization -->
      <style>
p {
    font-size: 13px !important;
}
.h1, h1 {
    font-size: 15px;
    margin: 2rem 0;
}
h2 {
    font-size: 15px;
}
.easy-breadcrumb {
    margin-top: 10px;
    color: #000;
}
a.easy-breadcrumb_segment.easy-breadcrumb_segment-front {
    color: #000;
    text-decoration: none;
}

.lang-dropdown .dropdown-toggle {
    background: #fff;
    width: 90px !important;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    margin: 0;
    padding: 0.375rem 2.25rem 0.375rem 0.75rem;
}
.top-nav ul li .lang-dropdown .dropdown-menu {
    width: 90px;
    background-color: #fff;
    padding: 0.375rem 2.25rem 0.375rem 0.75rem;
}
.top-nav ul li .lang-dropdown .dropdown-item {
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    padding: 5px 10px !important;
}
.top-nav ul li .lang-dropdown .dropdown-toggle::after {
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: 0.255em;
    vertical-align: 0.255em;
    content: "";
    border-top: 0.3em solid;
    border-right: 0.3em solid transparent;
    border-bottom: 0;
    border-left: 0.3em solid transparent;
}
</style>
   </head>
   <body class="html front not-logged-in no-sidebars page-node i18n-en" >
      <p class="skip-link__wrapper">
         <a href="#main-menu" class="skip-link visually-hidden visually-hidden--focusable" id="skip-link">Jump to navigation</a>
      </p>
      <div class="top-nav">
    <div class="container">
        <ul class="d-flex justify-content-end align-items-center mb-0">
            <li>
                <div class="d-flex">
                    <a href="javascript:void(0);">
                        <div class="color-box blue-temp high-contrast light"></div>
                    </a>
                    
                    <a href="javascript:void(0);">
                        <div class="color-box black-temp high-contrast dark"></div>
                    </a>
                </div>
                
            </li>
            <li><span class="text-white">|</span></li>
            <li data-bs-toggle="tooltip" data-bs-placement="bottom" title="Skip to Main Content">
                            <a class="skpcnt" href="#main" title="Skip to Main Content">Skip to Main Content</a>
                            </li>
            <li><span class="text-white">|</span></li>
            
            <li data-bs-toggle="tooltip" data-bs-placement="bottom" title="Screen Reader Access">
                                <a href="https://cpri.inroad.in/screen-reader-access">Screen Reader Access</a>
                            </li>
            <li><span class="text-white">|</span></li>
            <li data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sitemap">
                <a href="https://cpri.inroad.in/sitemap">
                    <img src="https://cpri.inroad.in/sites/default/files/ico-sitemap.png" width="24" height="24" alt="sitemap">
                </a>
            </li>
            <li><span class="text-white">|</span></li>
            <li>
                <div class="d-flex">
                    <a onclick="set_font_size('decrease')" id="downSize" class="bg-transparent me-2" title="'Decrease font size"
                    href="#">A<sup>-</sup></a>
                    <a onclick="set_font_size()" title="Reset font size" id="resetSize" class="bg-transparent me-2"
                            href="#">A<sup>&nbsp;</sup></a>
                    <a onclick="set_font_size('increase')" id="upSize" title="'Increase font size" class="bg-transparent"
                            href="#">A<sup>+</sup></a>

                </div>
            </li>
            <li><span class="text-white">|</span></li>
            <li data-bs-toggle="tooltip" data-bs-placement="bottom" title="Select language">
                <a>
                      <div class="region region-language-switcher">
    <div class="block block-lang-dropdown first last odd" id="block-lang-dropdown-language">

      
  <form class="lang_dropdown_form language" id="lang_dropdown_form_language" action="/about-us/about-cpri" method="post" accept-charset="UTF-8"><div><div class="form-item form-type-select form-item-lang-dropdown-select" style="margin:0px;">

  <div class="dropdown lang-dropdown">
 <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       English
      </a>
    
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <li><a class="dropdown-item" href="https://cpri.inroad.in/online-testing/pay_online">English</a></li>
        <li><a class="dropdown-item" href="https://cpri.inroad.in/online-testing/pay_online/hi">हिन्दी</a></li>
        
      </ul>
    </div>
</div>
<input autocomplete="off" type="hidden" name="en" value="/about-us/about-cpri" />
<input autocomplete="off" type="hidden" name="hi" value="/hi/%E0%A4%B9%E0%A4%AE%E0%A4%BE%E0%A4%B0%E0%A5%87-%E0%A4%AC%E0%A4%BE%E0%A4%B0%E0%A5%87-%E0%A4%AE%E0%A5%87%E0%A4%82/%E0%A4%B8%E0%A5%80%E0%A4%AA%E0%A5%80%E0%A4%86%E0%A4%B0%E0%A4%86%E0%A4%88-%E0%A4%95%E0%A5%87-%E0%A4%AC%E0%A4%BE%E0%A4%B0%E0%A5%87-%E0%A4%AE%E0%A5%87%E0%A4%82" />
<noscript><div>
<input autocomplete="off" type="submit" id="edit-submit" name="op" value="Go" class="form-submit" />
</div></noscript><input type="hidden" name="form_build_id" value="form-zJpc_gh6Qu1w0137yimXeObBUWCrEuLx6-cnqoGkt8c" />
<input autocomplete="off" type="hidden" name="form_id" value="lang_dropdown_form" />
</div></form>
</div>
  </div>
                </a>
            </li>
            <li><span class="text-white">|</span></li>
  
            <li>
                <div class="d-flex">
                    <a class="me-2" title="Twitter"
                        href="https://twitter.com/CPRI_MoP?t=6upj8QKU7rJVxmDnefJrfw&s=08" target="_blank">
                        <img src="https://cpri.inroad.in/sites/default/files/twitter_new.png" height="20" width="20" alt="twitter" />
                    </a>
                    <a class="me-2" title="Youtube" href="https://youtu.be/inrPHPsQ9F4" target="_blank">
                        <img src="https://cpri.inroad.in/sites/default/files/youtube_new.png"  height="24" width="24" alt="youtube" />
                    </a>
                    <a class="" title="Facebook" href="https://www.facebook.com/cprimop"
                    target="_blank">
                    <img src="https://cpri.inroad.in/sites/default/files/facebook_new.png"  class="bg-white" height="20" width="20" alt="facebook" />
                </a>

                </div>
            </li>
            <li><span class="text-white">|</span></li>
            <li>
                  <div class="region region-search">
    <div class="block block-search first last odd" role="search" id="block-search-form">

      
  <form action="/about-us/about-cpri" method="post" id="search-block-form" accept-charset="UTF-8"><div><div class="container-inline">
      <h2 class="element-invisible">Search form</h2>
    <div class="form-item form-type-textfield form-item-search-block-form">
  <label class="element-invisible" for="edit-search-block-form--2">Search </label>
 <input title="Enter the terms you wish to search for." autocomplete="off" type="text" id="edit-search-block-form--2" name="search_block_form" value="" size="15" maxlength="128" class="form-text" />
</div>
<div class="form-actions form-wrapper" id="edit-actions"><input type="submit" id="edit-submit--2" name="op" value="Search" class="form-submit" /></div><input type="hidden" name="form_build_id" value="form-U7IRLvr7HcfZPIhC1c5f9OIMgl9xwLu70F9NigqdhqU" />
<input autocomplete="off" type="hidden" name="form_id" value="search_block_form" />
</div>
</div></form>
</div>
  </div>
          

            </li>
        </ul>
    </div>
</div>
      <menu>
         <!-- <container>
            <logo>
               <span class="logo">
               <a href="/" title="Home" rel="home" class="header__logo"><img src="<?php echo $newurl; ?>/sites/default/files/WhatsApp%20Image.jpeg" alt="Home" class="header__logo-image" /></a>
               </span>
            </logo>
            <aside class="menuAnchor align-center">
               <div class="menuLink">
                  <div class="region region-header-links">
                     <div class="block block-views first last odd" id="block-views-right-side-header-block-1">
                        <div class="view view-right-side-header view-id-right_side_header view-display-id-block_1 view-dom-id-73d62c73b5cde23692a4c9f73b18cae5">
                           <div class="view-content">
                              <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
                                 <div class="views-field views-field-field-links">
                                    <div class="field-content"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <logo class="flex align-center  rightLogo">
               <div class="region region-header-logo-1">
                     <div class="block block-views first last odd" id="block-views-right-side-header-block-2">
                        <div class="view view-right-side-header view-id-right_side_header view-display-id-block_2 view-dom-id-e6e929e1f9b324e85a17d386a46ed50b">
                           <div class="view-content">
                              <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
                                 <div class="views-field views-field-field-logo-1">
                                    <div class="field-content"><a href="/"><img typeof="foaf:Image" src="https://cpri.inroad.in/sites/default/files/G20_theme_and_logo.png" width="147" height="111" alt="" /></a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="region region-header-logo-1">
                     <div class="block block-views first last odd" id="block-views-right-side-header-block-2">
                        <div class="view view-right-side-header view-id-right_side_header view-display-id-block_2 view-dom-id-e6e929e1f9b324e85a17d386a46ed50b">
                           <div class="view-content">
                              <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
                                 <div class="views-field views-field-field-logo-1">
                                    <div class="field-content"><a href="/"><img typeof="foaf:Image" src="<?php echo $newurl; ?>/sites/default/files/WhatsApp%20Image%20Mahatma.jpeg" width="147" height="111" alt="" /></a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                     <div class="region region-header-logo-1">
                     <div class="block block-views first last odd" id="block-views-right-side-header-block-2">
                        <div class="view view-right-side-header view-id-right_side_header view-display-id-block_2 view-dom-id-e6e929e1f9b324e85a17d386a46ed50b">
                           <div class="view-content">
                              <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
                                 <div class="views-field views-field-field-logo-1">
                                    <div class="field-content"><a href="/"><img typeof="foaf:Image" src="<?php echo $newurl; ?>/sites/default/files/WhatsApp%20Image%20Mahatma.jpeg" width="147" height="111" alt="" /></a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="region region-header-logo-2">
                     <div class="block block-views first last odd" id="block-views-right-side-header-block-3">
                        <div class="view view-right-side-header view-id-right_side_header view-display-id-block_3 view-dom-id-d1140af4a9eaae99165f19c97852edee">
                           <div class="view-content">
                              <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
                                 <div class="views-field views-field-field-logo-2">
                                    <div class="field-content"><a href="/"><img typeof="foaf:Image" src="<?php echo $newurl; ?>/sites/default/files/WhatsApp%20Image%202020-08-27%20at%202.56.14%20PM.jpeg" width="107" height="121" alt="" /></a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="region region-header-logo-3">
                     <div class="block block-views first last odd" id="block-views-right-side-header-block-4">
                        <div class="view view-right-side-header view-id-right_side_header view-display-id-block_4 view-dom-id-0864705d28b6410ca4babf721cb8df05">
                           <div class="view-content">
                              <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
                                 <div class="views-field views-field-field-logo-3">
                                    <div class="field-content"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </logo>
            </aside>
         </container> -->
         <?php include_once "header_new.php";?>

      </menu>
      <nav>
         <container>
            <div class="dropdown">
               <div class="region region-navigation">
                  <div class="block block-superfish first last odd" id="block-superfish-1">
         <?php include_once "website_menu.php";?>
                </div>
               </div>
            </div>
         </container>
      </nav>
    <container>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-buttons">
                        <h1> Online Payment</h1>
                                   <!--  <p>CPRI provides On line test date booking request facility for the laboratories/divisions provided below. Customers are encouraged to avail this facility as per the dates available. This facility provides customers to raise the request for booking the dates for testing.</p>
                        -->  </div>
                </header>
                <?php $user_type = $this->session->userdata('user_type'); ?>

                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <article class="content item-editor-page">
                    <div class="title-block">
                        <div>
                            <span class="error"><p id="proforma_invoice_no_null"></p></span>
                            <span class="error"><p id="organisation_name_null"></p></span>
                            <span class="error"><p id="amount_as_per_pi_null"></p></span>
                            <span class="error"><p id="amount_paid_null"></p></span>
                            <span class="error"><p id="amount_paid_now_null"></p></span>
                            <span class="error"><p id="tds_amount_null"></p></span>
                            <span class="error"><p id="total_amount_paid_null"></p></span>

                            <span class="error"><p id="unit_id_null"></p></span>
                            <span class="error"><p id="department_id_null"></p></span>
                            <span class="error"><p id="laboratories_id_null"></p></span>
                            <span class="error"><p id="invoice_no_null"></p></span>
                            <span class="error"><p id="payment_currency_null"></p></span>
                            <span class="error"><p id="tds_amount_invoice_null"></p></span>
                            <span class="error"><p id="amount_paid_invoice_null"></p></span>
                            <span class="error"><p id="type_of_customer_null"></p></span>
                            <span class="error"><p id="organisation_null"></p></span>
                            <span class="error"><p id="address_null"></p></span>
                            <span class="error"><p id="name_of_contact_person_null"></p></span>
                            <span class="error"><p id="email_null"></p></span>
                            <span class="error"><p id="mobile_no_null"></p></span>
                            <span class="error"><p id="pan_null"></p></span>
                            <span class="error"><p id="gstin_null"></p></span>
                            <span class="error"><p id="tan_null"></p></span>
                            <span class="error"><p id="payment_gateway_null"></p></span>
                            <span class="error"><p id="term_condition_null"></p></span>


                            <?php if ($this->session->flashdata('payment-online-mssg') != null) { ?>
                                <div class="alert alert-success">
                                    <strong><?php echo $this->session->flashdata('payment-online-mssg'); ?></strong>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('online-payment-error') != null) { ?>
                                <div class="alert alert-danger">
                                    <strong><?php echo $this->session->flashdata('online-payment-error'); ?></strong>
                                </div>
                            <?php } ?>
                        </div>
                        <h3 class="title"><span class="sparkline bar" data-type="bar"></span> </h3>
                    </div>
                    <!--                   <div class="title-block">
                                                       <marquee scrolldelay="0" direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();">
                                         <h3 class="title" style="color:red;">This module is under development and not functional completely. </h3>
                                                              </marquee>
                                      </div>-->
                    <!-- <form method="POST" action="<?php //echo base_url() . "Pay_online/add_pay_online"; ?>" name="mypayonline" id="paymentForm"  onsubmit= "return validateform()" -->
                    <form method="POST" action="<?php echo base_url() . "Pay_online/add_pay_online"; ?>" name="mypayonline" id="paymentForm" enctype="multipart/form-data">
                        <div class="">
                          
                            <div class="form-group row mb-3">
                                <label class="col-4 form-control-label text-xs-right">
                                    Payment made against:<span style="color:red">*</span>
                                </label>
                                <div class="col-4">
                                    <select class="c-select form-control boxed" id="payment_made_against" name="payment_made_against" >
                                        <option value="">Select Payment made against</option>
                                        <option value="Proforma Invoice">Proforma Invoice</option>
                                        <option value="Invoice">Invoice</option>
                                        <option value="Advance">Advance Payment</option>
                                    </select>
                                </div>
                            </div>


                            <div id="proforma_invoice_no_div">
                                  <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Unit:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4">
                                        <select class="c-select form-control boxed ProformaRequired" id="unit_invoice1" name="unit_id_pi" >
                                            <option value="">Select Unit</option>
                                            <?php foreach ($row as $units) { ?>
                                                <option  value="<?php echo $units->id; ?>"><?php echo $units->unit_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Enter Proforma Invoice No:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed ProformaRequired" name="proforma_invoice_no" id="proforma_invoice_no" placeholder="Enter Proforma Invoice No" > </div>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function () {

                                        $('#reason_deviation_div').hide();
                                        $('#proforma_invoice_no').on('change', function () {
                                            var proforma_invoice_no = $(this).val();
                                            if (proforma_invoice_no != '')
                                            {
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>Pay_online/get_performa_no",
                                                    type: "POST",
                                                    data: {'proforma_invoice_no': proforma_invoice_no},
                                                    datatype: 'json',
                                                    success: function (data) {
                                                        // console.log(data['customer_name']);
                                                        //  $('#customer_name').val(data['customer_name']);
                                                        $('#organisation_name').val(data['name_of_the_organization']);
                                                        $('#amount_as_per_pi').val(data['amount_paid_now_temp']);
                                                        $('#laboratory_id').val(data['laboratory_id']);
                                                        $('#amount_as_per_pi').prop('readonly', true);

                                                        var val5 = (isNaN(parseInt($('#tds_amount').val()))) ? 0 : parseInt($('#tds_amount').val());
                                                        var val6 = (isNaN(parseInt($('#amount_paid_now').val()))) ? 0 : parseInt($('#amount_paid_now').val());
                                                        var val7 = val6 - val5;
                                                        $('#total_amount_paid').val(val7);

                                                        // if (data['currency'] == 'USD') {
                                                        //     document.getElementById("USD").checked = true;
                                                        //     $('#USD').prop('readonly', true);
                                                        //     $('#INR').prop('readonly', true);
                                                        // } else {
                                                        //     document.getElementById("INR").checked = true;
                                                        //     $('#USD').prop('readonly', true);
                                                        //     $('#INR').prop('readonly', true);
                                                        // }

                                                        $('#amount_paid').change(function () {
                                                            if ($('#amount_paid').val() == 'Amount as per PI') {
                                                                $('#amount_paid_now').val(data['amount_paid_now_temp']);
                                                                $('#amount_paid_now').prop('readonly', true);
                                                            } else {
                                                                $('#amount_paid_now').change(function () {
                                                                    var val8 = (isNaN(parseInt($('#amount_paid_now').val()))) ? 0 : parseInt($('#amount_paid_now').val());
                                                                    if (val8 < data['amount_paid_now_temp']) {
                                                                        $('#reason_deviation_div').show();
                                                                    } else {
                                                                        $('#reason_deviation_div').hide();
                                                                    }
                                                                });
                                                                $('#amount_paid_now').prop('readonly', false);

                                                            }
                                                        });

                                                      

                                                        $('#tds_amount').change(function () {
                                                            var val1 = (isNaN(parseInt($('#tds_amount').val()))) ? 0 : parseInt($('#tds_amount').val());
                                                            var val2 = (isNaN(parseInt($('#amount_as_per_pi').val()))) ? 0 : parseInt($('#amount_as_per_pi').val());
                                                            // var val4 = val2 * (0.2 / 100); //less than
                                                            var val4 = val2 * (0.0 / 100); //less than
                                                            var val5 = val2 * (10 / 100);   //  greater than
                                                            if ((val4 <= val1) && (val5 >= val1)) {
                                                                var val3 = val2 - val1;
                                                                $('#total_amount_paid').val(val3);
                                                                $('#total_amount_paid').prop('readonly', true);
                                                            } else {
                                                                // alert('Entered TDS amount should be >= 0.2% of the PI base Amount (i.e without GST) and <= 10% of the PI base amount (i.e without GST)');
                                                                  alert('Entered TDS amount should be >= 0.0% of the PI base Amount (i.e without GST) and <= 10% of the PI base amount (i.e without GST)');
                                                                $('#tds_amount').val("");
                                                                $('#total_amount_paid').val("");
                                                            }
                                                        });

                                                    },
                                                    error: function () {
                                                        alert('Invalid Proforma Invoice. Please enter valid Proforma Invoice.');
                                                    }
                                                });
                                            }
                                        });
                                    });
                                </script>
                                <input autocomplete="off" type="hidden" class="form-control boxed" name="laboratory_id" id="laboratory_id">
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Name of the  Organization:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed ProformaRequired" name="organisation_name" id="organisation_name" placeholder="Enter Name of the  Organization" > </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Amount as per PI: (Inclusive of GST @ 18%):
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="number" minlength="0" class="form-control boxed" name="amount_as_per_pi" id="amount_as_per_pi" placeholder="Enter Amount as per PI" > </div>
                                </div>
                                <!--       <div class="form-group row mb-3">
                              <label class="col-4 form-control-label text-xs-right">
                              Amount to be paid:
                              </label>
                              <div class="col-4">
                                 <select class="c-select form-control boxed" id="amount_paid" name="amount_paid" >
                                    <option value="">Select Amount to be paid</option>
                                    <option value="Amount as per PI">Amount as per PI</option>
                                    <option value="Any other Amount">Any other Amount</option>
                                 </select>
                              </div>
                                                  </div>
                                                 <div class="form-group row mb-3">


                           <label class="col-4 form-control-label text-xs-right">
                           Amount Paid Now:
                           </label>
                           <div class="col-4"> <input type="text" class="form-control boxed" name="amount_paid_now" id="amount_paid_now" placeholder="Enter Amount Paid Now" readonly > </div>
                                                </div> -->
                                <div id="reason_deviation_div">
                                    <!--<div class="form-group row mb-3">
               <label class="col-4 form-control-label text-xs-right">
               Reason for Deviation:
               </label>
               <div class="col-4">
                  <textarea class="form-control boxed"  id="reason_deviation" name="reason_deviation" placeholder="Add Reason for Deviation"> </textarea>
               </div>
            </div>-->
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        TDS Amount Deducted (on Basic Amount):<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off"  type="number" min="0" class="form-control boxed ProformaRequired" name="tds_amount" id="tds_amount" placeholder="Enter TDS Amount Deducted"> </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Total Amount to be paid:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" min="0" readonly class="form-control boxed ProformaRequired" name="total_amount_paid" id="total_amount_paid" placeholder="Enter Total Amount to be paid" > </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Type of Payment currency:
                                    </label>
                                    <input autocomplete="off" hidden type="radio" name="payment_currency" id="INR" value="INR" checked> INR
                                        <!--  <input type="radio" name="payment_currency" id="USD" value="USD"> USD -->

                                </div>
                            </div>

                            <div id="advance_no_div">
                               
                                
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Unit:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4">
                                        <select class="c-select form-control boxed AdvanceRequired" id="unit_id" name="unit_id_ind">
                                            <option value="">Select Unit</option>
                                            <?php foreach ($row as $units) { ?>
                                                <option  value="<?php echo $units->id; ?>"><?php echo $units->unit_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Departments:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4">
                                        <select class="c-select form-control boxed AdvanceRequired" id="department_id" name="department_idd" disabled="" >
                                            <option value="">Select Department</option>
                                        </select>
                                  
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Payment currency:<span style="color:red">*</span>
                                    </label>
                                    <input autocomplete="off" hidden type="radio" name="payment_currencyd" id="INR" value="INR" checked > INR
                                  <!--  <input type="radio" name="payment_currency" id="USD" value="USD"> USD -->
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Advance Payment Amount (Inclusive of GST @ 18%):<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="number" min="0" class="form-control boxed AdvanceRequired" name="invoice_amountd" id="invoice_amount" placeholder="Enter Advance Payment Amount" > </div>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function () {

                                        $('#invoice_amount').change(function () {
                                            var val1 = (isNaN(parseInt($('#tds_amount_invoice').val()))) ? 0 : parseInt($('#tds_amount_invoice').val());
                                            var val2 = (isNaN(parseInt($('#invoice_amount').val()))) ? 0 : parseInt($('#invoice_amount').val());
                                            var val3 = val2 - val1;
                                            if(val1!=0)
                                            {
                                                if ((val4 <= val1) && (val5 >= val1)) {
                                                   var val3 = val2 - val1;
                                                   $('#amount_paid_invoice').val(val3);
                                                   $('#amount_paid_invoice').prop('readonly', true);
                                               } else {
                                                   // alert('Entered TDS amount should be >= 0.2% of the PI base Amount (i.e without GST) and <= 10% of the PI base amount (i.e without GST)');
                                                   alert('Entered TDS amount should be >= 0.0% of the PI base Amount (i.e without GST) and <= 10% of the PI base amount (i.e without GST)');
                                                   $('#tds_amount_invoice').val("");
                                                   $('#amount_paid_invoice').val("");
                                               }
                                            }
                                            else{
                                               $('#amount_paid_invoice').val(val3);
                                               $('#amount_paid_invoice').prop('readonly', true);
                                                var val4 = (isNaN(parseInt(data['amount_paid_now_temp']))) ? 0 : parseInt(data['amount_paid_now_temp']);
                                            }
                                          

                                        });

                                        $('#tds_amount_invoice').change(function () {
                                            var val1 = (isNaN(parseInt($('#tds_amount_invoice').val()))) ? 0 : parseInt($('#tds_amount_invoice').val());
                                            var val2 = (isNaN(parseInt($('#invoice_amount').val()))) ? 0 : parseInt($('#invoice_amount').val());
                                            var val3 = val2 - val1;
                                            // var val4 = val2 * (0.2 / 100); //less than
                                            var val4 = val2 * (0.0 / 100); //less than
                                            var val5 = val2 * (10 / 100);   //  greater than
                                            if ((val4 <= val1) && (val5 >= val1)) {
                                                var val3 = val2 - val1;
                                                $('#amount_paid_invoice').val(val3);
                                                $('#amount_paid_invoice').prop('readonly', true);
                                            } else {
                                                alert('Entered TDS amount should be >= 0.0% of the PI base Amount (i.e without GST) and <= 10% of the PI base amount (i.e without GST)');
                                                $('#tds_amount').val("");
                                                $('#amount_paid_invoice').val("");
                                            }
                                            //$('#amount_paid_invoice').val(val3);
                                            //$('#amount_paid_invoice').prop('readonly', true);
                                        });
//                                                                   $('#tds_amount_invoice').change(function(){
//                                                                    alert();
//                                                                    var val1 = (isNaN(parseInt($('#tds_amount_invoice').val()))) ? 0 : parseInt($('#tds_amount_invoice').val());
//                                                                    var val2 = (isNaN(parseInt($('#amount_as_per_pi').val()))) ? 0 : parseInt($('#amount_as_per_pi').val());
//                                                                    var val4 = val2*(0.2/100); //less than
//                                                                    var val5 = val2*(10/100); //  greater than
//                                                                    if((val4 <= val1) && (val5 >= val1)){
//                                                                        var val3 = val2 - val1;
//                                                                        $('#amount_paid_invoice').val(val3);
//                                                                        $('#amount_paid_invoice').prop('readonly', true);
//                                                                    }else{
//                                                                        alert('Entered TDS amount should be >= 0.2% of the PI base Amount (i.e without GST) and <= 10% of the PI base amount (i.e without GST)');
//                                                                        $('#tds_amount').val("");
//                                                                        $('#amount_paid_invoice').val("");
//                                                                    }
//                              });
                                    });
                                </script>

                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        TDS Amount Deducted (on Basic Amount):<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off"  type="number" min="0" class="form-control boxed AdvanceRequired" name="tds_amount_invoiced" id="tds_amount_invoice" placeholder="Enter TDS Amount Deducted"> </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Total Amount to be paid:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed AdvanceRequired" name="amount_paid_invoiced"  readonly id="amount_paid_invoice" placeholder="Enter Total Amount to be paid" > </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        New customer or Existing customer:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4">
                                        <select class="c-select form-control boxed AdvanceRequired" name="type_of_customerd" id="type_of_customer">
                                            <option value="">Select Type of Customer</option>
                                            <option  value="New customer">New customer</option>
                                            <option  value="Existing customer">Existing customer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Enter the   Old Party code:
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed" name="party_coded" id="party_code" placeholder="Add Party Code" disabled="">
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#type_of_customer').on('change', function () {
                                                    var type_of_customer = $(this).val();
                                                    if ((type_of_customer == '') || (type_of_customer == 'New customer'))
                                                    {
                                                        $('#party_code').prop('disabled', true);
                                                        $('#new_party_code').prop('disabled', true);
                                                        $('#customer_category_txt_div').hide();
                                                        $('#customer_category_div').show();
                                                        $('#customer_category').prop('disabled', false);
                                                        $('#customer_category_txt').prop('disabled', true);
                                                    } else {
                                                        $('#party_code').prop('disabled', false);
                                                        $('#new_party_code').prop('disabled', false);
                                                        $('#customer_category_txt_div').show();
                                                        $('#customer_category_div').hide();
                                                        $('#customer_category').prop('disabled', true);
                                                        $('#customer_category_txt').prop('disabled', false);
                                                    }
                                                });
                                            });

                                        </script>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Enter the New Party code:
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed" name="new_party_coded" id="new_party_code" placeholder="Add Party Code" disabled="">
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('#party_code').on('change', function () {
                                            var party_code = $(this).val();
                                            if (party_code != '')
                                            {
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>Test_date_booking_request/get_party_code",
                                                    type: "POST",
                                                    data: {'party_code': party_code},
                                                    datatype: 'json',
                                                    success: function (data) {
                                                        // console.log(data['customer_name']);
                                                        $('#customer_name').val(data['customer_name']);
                                                        // $('#customer_category').val(data['customer_category']);
                                                        $('#organisation').val(data['name_of_the_organization']);
                                                        $('#address').val(data['address_of_the_organization']);
                                                        $('#name_of_contact_person').val(data['customer_name']);
                                                        $('#email').val(data['email_id']);
                                                        $('#mobile_no').val(data['mobile_no']);
                                                        $('#pan').val(data['pan']);
                                                        $('#gstin').val(data['gst']);
                                                        $('#tan').val(data['tan']);
                                                        var tann = $('#tan').val();

                                                        if ($('#type_of_customer').val() == 'New customer') {
                                                            $('#customer_category').val(data['customer_category']);
                                                        } else {
                                                            $('#customer_category_txt').val(data['customer_category']);
                                                        }

                                                        if (tann != null) {
                                                            if ($('#booking_purpose').val() == 'Testing') {
                                                                $("#fourth_heading_testing").show();
                                                                $('#fourth_heading_calibration').hide();
                                                                $('#fourth_heading_bis_testing').hide();
                                                            } else if ($('#booking_purpose').val() == 'Calibration') {
                                                                $('#fourth_heading_testing').hide();
                                                                $('#fourth_heading_calibration').show();
                                                                $('#fourth_heading_bis_testing').hide();
                                                            } else {
                                                                $('#fourth_heading_testing').hide();
                                                                $('#fourth_heading_calibration').hide();
                                                                $('#fourth_heading_bis_testing').show();
                                                            }
                                                        }
                                                    },
                                                    error: function () {
                                                        alert('Error Occur');
                                                    }
                                                });
                                            }
                                        });
                                    });
                                    $(document).ready(function () {
                                        $('#new_party_code').on('change', function () {
                                            var new_party_code = $(this).val();
                                            if (new_party_code != '')
                                            {
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>Test_date_booking_request/get_party_code",
                                                    type: "POST",
                                                    data: {'new_party_code': new_party_code},
                                                    datatype: 'json',
                                                    success: function (data) {
                                                        // console.log(data['customer_name']);
                                                        $('#customer_name').val(data['customer_name']);

                                                        $('#organisation').val(data['name_of_the_organization']);
                                                        $('#address').val(data['address_of_the_organization']);
                                                        $('#name_of_contact_person').val(data['customer_name']);
                                                        $('#email').val(data['email_id']);
                                                        $('#mobile_no').val(data['mobile_no']);
                                                        $('#pan').val(data['pan']);
                                                        $('#gstin').val(data['gst']);
                                                        $('#tan').val(data['tan']);

                                                        if ($('#type_of_customer').val() == 'New customer') {
                                                            $('#customer_category').val(data['customer_category']);
                                                        } else {
                                                            $('#customer_category_txt').val(data['customer_category']);
                                                        }
                                                        var tann = $('#tan').val();
                                                        if (tann != null) {
                                                            if ($('#booking_purpose').val() == 'Testing') {
                                                                $("#fourth_heading_testing").show();
                                                                $('#fourth_heading_calibration').hide();
                                                                $('#fourth_heading_bis_testing').hide();
                                                            } else if ($('#booking_purpose').val() == 'Calibration') {
                                                                $('#fourth_heading_testing').hide();
                                                                $('#fourth_heading_calibration').show();
                                                                $('#fourth_heading_bis_testing').hide();
                                                            } else {
                                                                $('#fourth_heading_testing').hide();
                                                                $('#fourth_heading_calibration').hide();
                                                                $('#fourth_heading_bis_testing').show();
                                                            }
                                                        }
                                                    },
                                                    error: function () {
                                                        alert('Error Occur');
                                                    }
                                                });
                                            }
                                        });
                                    });
                                </script>
                                <div class="form-group row mb-3" id="customer_category_txt_div" style="display:none;">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Customer Category:
                                    </label>
                                    <div class="col-4">
                                        <input autocomplete="off" type="text" class="form-control boxed" name="customer_categoryd" id="customer_category_txt" placeholder="Add Customer Category"> </div>
                                </div>
                                <div class="form-group row mb-3" id="customer_category_div" style="display:none;">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Customer Category:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4">
                                                            <!--<span class="error"><p id="customer_category_null"></p></span>-->
                                        <select class="c-select form-control boxed" name="customer_categoryd" id="customer_category">
                                            <option value="">Select Customer Category</option>
                                            <option  value="Private">Private</option>
                                            <option  value="Government">Government</option>
                                            <option  value="Foreign">Foreign</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Name of the Organization:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed AdvanceRequired" name="organisationd" id="organisation" placeholder="Add Organisation"> </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Address of the Organization:
                                    </label>
                                    <div class="col-4">
                                        <textarea id="address" class="form-control boxed" name="addressd" autocomplete="off" placeholder="Add Address" rows="10"> </textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Name of the Contact Person:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed AdvanceRequired" name="name_of_contact_persond" id="name_of_contact_person" placeholder="Enter name of a person responsible for making payment"> </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Email Id:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="email" class="form-control boxed AdvanceRequired" name="emaild" id="email" placeholder="Add Email-ID"> </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Mobile Number:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="number"  class="form-control boxed AdvanceRequired" name="mobile_nod" id="mobile_no" placeholder="Add Mobile No"> </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        PAN:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed AdvanceRequired" name="pand" id="pan" maxlength="10" size="10" onkeyup="this.value = this.value.toUpperCase();" placeholder="Add PAN">  </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        GSTIN:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed AdvanceRequired" name="gstind" id="gstin" maxlength="15" size="15" onkeyup="this.value = this.value.toUpperCase();" placeholder="Add GSTIN"> </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        TAN:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed AdvanceRequired" name="tand" id="tan" maxlength="10" size="10" onkeyup="this.value = this.value.toUpperCase();" placeholder="Add TAN"> </div>
                                </div>
                            

                            </div>

                            <div id="invoice_no_div">
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Unit:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4">
                                        <select class="c-select form-control boxed InvoiceRequired" id="unit_id1" name="unit_id_in">
                                            <option value="">Select Unit</option>
                                            <?php foreach ($row as $units) { ?>
                                                <option  value="<?php echo $units->id; ?>"><?php echo $units->unit_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Departments:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4">
                                        <select class="c-select form-control boxed InvoiceRequired" id="department_id1" name="department_id" disabled="">
                                            <option value="">Select Department</option>
                                        </select>
                                
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Laboratories:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4">
                                        <select class="c-select form-control boxed InvoiceRequired" name="laboratories_id" id="laboratories_id" disabled="" >
                                            <option value="">Select Laboratory</option>
                                        </select>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#department_id1').on('change', function () {
                                                    var department_id = $(this).val();
                                                    if (department_id == '')
                                                    {
                                                        $('#laboratories_id').prop('disabled', true);
                                                    } else {
                                                        $('#laboratories_id').prop('disabled', false);
                                                        $.ajax({
                                                            url: "<?php echo base_url() ?>User/get_laboratories",
                                                            type: "POST",
                                                            data: {'department_id': department_id},
                                                            datatype: 'json',
                                                            success: function (data) {
                                                                $('#laboratories_id').html(data);
                                                            },
                                                            error: function () {
                                                                //alert('Error Occur');
                                                            }
                                                        });
                                                    }
                                                });
                                            });

                                        </script>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Enter Invoice No:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed InvoiceRequired" name="invoice_no" id="invoice_no" placeholder="Enter Invoice No" > </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Payment currency:<span style="color:red">*</span>
                                    </label>
                                    <input autocomplete="off" hidden type="radio" name="payment_currency" id="INR" value="INR" checked > INR
                                  <!--  <input type="radio" name="payment_currency" id="USD" value="USD"> USD -->
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Invoice Amount (Inclusive of GST @ 18%):<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="number" min="0" class="form-control boxed InvoiceRequired" name="invoice_amount" id="invoice_amount1" placeholder="Enter Invoice Amount" > </div>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function () {

                                        $('#invoice_amount1').change(function () {
                                            var val1 = (isNaN(parseInt($('#tds_amount_invoice1').val()))) ? 0 : parseInt($('#tds_amount_invoice1').val());
                                            var val2 = (isNaN(parseInt($('#invoice_amount1').val()))) ? 0 : parseInt($('#invoice_amount1').val());
                                            var val3 = val2 - val1;
                                            var  val4 = val2 * (0.2 / 100); //less than
                                            // var  val4 = val2 * (0.0 / 100); //less than
                                            var val5 = val2 * (10 / 100); //  greater than

                                            if(val1!=0){
                                               if ((val4 <= val1) && (val5 >= val1)) {
                                                var val3 = val2 - val1;
                                                $('#amount_paid_invoice1').val(val3);
                                                $('#amount_paid_invoice1').prop('readonly', true);
                                            } else {
                                                alert('Entered TDS amount should be >= 0.2% of the PI base Amount (i.e without GST) and <= 10% of the PI base amount (i.e without GST)');
                                                // alert('Entered TDS amount should be >= 0.0% of the PI base Amount (i.e without GST) and <= 10% of the PI base amount (i.e without GST)');
                                                $('#tds_amount_invoice1').val("");
                                                $('#amount_paid_invoice1').val("");
                                            }
                                         }
                                         else{

                                            $('#amount_paid_invoice1').val(val3);
                                            $('#amount_paid_invoice1').prop('readonly', true);
                                            var val4 = (isNaN(parseInt(data['amount_paid_now_temp']))) ? 0 : parseInt(data['amount_paid_now_temp']);
                                         }

                                        });

                                        $('#tds_amount_invoice1').change(function () {
                                            var val1 = (isNaN(parseInt($('#tds_amount_invoice1').val()))) ? 0 : parseInt($('#tds_amount_invoice1').val());
                                            var val2 = (isNaN(parseInt($('#invoice_amount1').val()))) ? 0 : parseInt($('#invoice_amount1').val());
                                            var val3 = val2 - val1;
                                            var val4 = val2 * (0.2 / 100); //less than
                                             // var val4 = val2 * (0.0 / 100); //less than
                                            var val5 = val2 * (10 / 100);   //  greater than
                                            if ((val4 <= val1) && (val5 >= val1)) {
                                                var val3 = val2 - val1;
                                                $('#amount_paid_invoice1').val(val3);
                                                $('#amount_paid_invoice1').prop('readonly', true);
                                            } else {
                                                alert('Entered TDS amount should be >= 0.2% of the PI base Amount (i.e without GST) and <= 10% of the PI base amount (i.e without GST)');
                                                // alert('Entered TDS amount should be >= 0.0% of the PI base Amount (i.e without GST) and <= 10% of the PI base amount (i.e without GST)');
                                                $('#tds_amount_invoice1').val("");
                                                $('#amount_paid_invoice1').val("");
                                            }
                                            //$('#amount_paid_invoice').val(val3);
                                            //$('#amount_paid_invoice').prop('readonly', true);
                                        });
//                                                                   $('#tds_amount_invoice').change(function(){
//                                                                    alert();
//                                                                    var val1 = (isNaN(parseInt($('#tds_amount_invoice').val()))) ? 0 : parseInt($('#tds_amount_invoice').val());
//                                                                    var val2 = (isNaN(parseInt($('#amount_as_per_pi').val()))) ? 0 : parseInt($('#amount_as_per_pi').val());
//                                                                    var val4 = val2*(0.2/100); //less than
//                                                                    var val5 = val2*(10/100); //  greater than
//                                                                    if((val4 <= val1) && (val5 >= val1)){
//                                                                        var val3 = val2 - val1;
//                                                                        $('#amount_paid_invoice').val(val3);
//                                                                        $('#amount_paid_invoice').prop('readonly', true);
//                                                                    }else{
//                                                                        alert('Entered TDS amount should be >= 0.2% of the PI base Amount (i.e without GST) and <= 10% of the PI base amount (i.e without GST)');
//                                                                        $('#tds_amount').val("");
//                                                                        $('#amount_paid_invoice').val("");
//                                                                    }
//                              });
                                    });
                                </script>

                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        TDS Amount Deducted (on Basic Amount):<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="number" min="0"  class="form-control boxed InvoiceRequired" name="tds_amount_invoice" id="tds_amount_invoice1" placeholder="Enter TDS Amount Deducted"> </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Total Amount to be paid:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed InvoiceRequired" name="amount_paid_invoice"  readonly id="amount_paid_invoice1" placeholder="Enter Total Amount to be paid" > </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        New customer or Existing customer:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4">
                                        <select class="c-select form-control boxed InvoiceRequired" name="type_of_customer" id="type_of_customer1">
                                            <option value="">Select Type of Customer</option>
                                            <option  value="New customer">New customer</option>
                                            <option  value="Existing customer">Existing customer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Enter the   Old Party code:
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed" name="party_code" id="party_code1" placeholder="Add Party Code" disabled="">
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#type_of_customer1').on('change', function () {
                                                    var type_of_customer = $(this).val();
                                                    if ((type_of_customer == '') || (type_of_customer == 'New customer'))
                                                    {
                                                        $('#party_code1').prop('disabled', true);
                                                        $('#new_party_code1').prop('disabled', true);
                                                        $('#customer_category_txt_div1').hide();
                                                        $('#customer_category_div1').show();
                                                        $('#customer_category1').prop('disabled', false);
                                                        $('#customer_category_txt1').prop('disabled', true);
                                                    } else {
                                                        $('#party_code1').prop('disabled', false);
                                                        $('#new_party_code1').prop('disabled', false);
                                                        $('#customer_category_txt_div1').show();
                                                        $('#customer_category_div1').hide();
                                                        $('#customer_category1').prop('disabled', true);
                                                        $('#customer_category_txt1').prop('disabled', false);
                                                    }
                                                });
                                            });

                                        </script>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Enter the New Party code:
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed" name="new_party_code" id="new_party_code1" placeholder="Add Party Code" disabled="">
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('#party_code1').on('change', function () {
                                            var party_code = $(this).val();
                                            if (party_code != '')
                                            {
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>Test_date_booking_request/get_party_code",
                                                    type: "POST",
                                                    data: {'party_code': party_code},
                                                    datatype: 'json',
                                                    success: function (data) {
                                                        // console.log(data['customer_name']);
                                                        $('#customer_name1').val(data['customer_name']);
                                                        // $('#customer_category').val(data['customer_category']);
                                                        $('#organisation1').val(data['name_of_the_organization']);
                                                        $('#address1').val(data['address_of_the_organization']);
                                                        $('#name_of_contact_person1').val(data['customer_name']);
                                                        $('#email1').val(data['email_id']);
                                                        $('#mobile_no1').val(data['mobile_no']);
                                                        $('#pan1').val(data['pan']);
                                                        $('#gstin1').val(data['gst']);
                                                        $('#tan1').val(data['tan']);
                                                        var tann = $('#tan').val();

                                                        if ($('#type_of_customer1').val() == 'New customer') {
                                                            $('#customer_category1').val(data['customer_category']);
                                                        } else {
                                                            $('#customer_category_txt1').val(data['customer_category']);
                                                        }

                                                        if (tann != null) {
                                                            if ($('#booking_purpose').val() == 'Testing') {
                                                                $("#fourth_heading_testing").show();
                                                                $('#fourth_heading_calibration').hide();
                                                                $('#fourth_heading_bis_testing').hide();
                                                            } else if ($('#booking_purpose').val() == 'Calibration') {
                                                                $('#fourth_heading_testing').hide();
                                                                $('#fourth_heading_calibration').show();
                                                                $('#fourth_heading_bis_testing').hide();
                                                            } else {
                                                                $('#fourth_heading_testing').hide();
                                                                $('#fourth_heading_calibration').hide();
                                                                $('#fourth_heading_bis_testing').show();
                                                            }
                                                        }
                                                    },
                                                    error: function () {
                                                        alert('Error Occur');
                                                    }
                                                });
                                            }
                                        });
                                    });
                                    $(document).ready(function () {
                                        $('#new_party_code1').on('change', function () {
                                            var new_party_code = $(this).val();
                                            if (new_party_code != '')
                                            {
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>Test_date_booking_request/get_party_code",
                                                    type: "POST",
                                                    data: {'new_party_code': new_party_code},
                                                    datatype: 'json',
                                                    success: function (data) {
                                                        // console.log(data['customer_name']);
                                                        $('#customer_name1').val(data['customer_name']);

                                                        $('#organisation1').val(data['name_of_the_organization']);
                                                        $('#address1').val(data['address_of_the_organization']);
                                                        $('#name_of_contact_person1').val(data['customer_name']);
                                                        $('#email1').val(data['email_id']);
                                                        $('#mobile_no1').val(data['mobile_no']);
                                                        $('#pan1').val(data['pan']);
                                                        $('#gstin1').val(data['gst']);
                                                        $('#tan1').val(data['tan']);

                                                        if ($('#type_of_customer1').val() == 'New customer') {
                                                            $('#customer_category1').val(data['customer_category']);
                                                        } else {
                                                            $('#customer_category_txt1').val(data['customer_category']);
                                                        }
                                                        var tann = $('#tan1').val();
                                                        if (tann != null) {
                                                            if ($('#booking_purpose').val() == 'Testing') {
                                                                $("#fourth_heading_testing").show();
                                                                $('#fourth_heading_calibration').hide();
                                                                $('#fourth_heading_bis_testing').hide();
                                                            } else if ($('#booking_purpose').val() == 'Calibration') {
                                                                $('#fourth_heading_testing').hide();
                                                                $('#fourth_heading_calibration').show();
                                                                $('#fourth_heading_bis_testing').hide();
                                                            } else {
                                                                $('#fourth_heading_testing').hide();
                                                                $('#fourth_heading_calibration').hide();
                                                                $('#fourth_heading_bis_testing').show();
                                                            }
                                                        }
                                                    },
                                                    error: function () {
                                                        alert('Error Occur');
                                                    }
                                                });
                                            }
                                        });
                                    });
                                </script>
                                <div class="form-group row mb-3" id="customer_category_txt_div1" style="display:none;">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Customer Category:
                                    </label>
                                    <div class="col-4">
                                        <input autocomplete="off" type="text" class="form-control boxed" name="customer_category" id="customer_category_txt1" placeholder="Add Customer Category"> </div>
                                </div>
                                <div class="form-group row mb-3" id="customer_category_div1" style="display:none;">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Customer Category:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4">
                                                            <!--<span class="error"><p id="customer_category_null"></p></span>-->
                                        <select class="c-select form-control boxed" name="customer_category" id="customer_category1">
                                            <option value="">Select Customer Category</option>
                                            <option  value="Private">Private</option>
                                            <option  value="Government">Government</option>
                                            <option  value="Foreign">Foreign</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Name of the Organization:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed InvoiceRequired" name="organisation" id="organisation1" placeholder="Add Organisation"> </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Address of the Organization:
                                    </label>
                                    <div class="col-4">
                                        <textarea id="address1" class="form-control boxed" name="address" autocomplete="off" placeholder="Add Address" rows="10"> </textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Name of the Contact Person:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed InvoiceRequired" name="name_of_contact_person" id="name_of_contact_person1" placeholder="Enter name of a person responsible for making payment"> </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Email Id:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="email" class="form-control boxed InvoiceRequired" name="email" id="email1" placeholder="Add Email-ID"> </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Mobile Number:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="number"  class="form-control boxed InvoiceRequired" name="mobile_no" id="mobile_no1" placeholder="Add Mobile No"> </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        PAN:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed InvoiceRequired" name="pan" id="pan1" maxlength="10" size="10" onkeyup="this.value = this.value.toUpperCase();" placeholder="Add PAN">  </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        GSTIN:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed InvoiceRequired" name="gstin" id="gstin1" maxlength="15" size="15" onkeyup="this.value = this.value.toUpperCase();" placeholder="Add GSTIN"> </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        TAN:<span style="color:red">*</span>
                                    </label>
                                    <div class="col-4"> <input autocomplete="off" type="text" class="form-control boxed InvoiceRequired" name="tan" id="tan1" maxlength="10" size="10" onkeyup="this.value = this.value.toUpperCase();" placeholder="Add TAN"> </div>
                                </div>
                            </div>
                            <div id="payment_div">
                                <div class="form-group row mb-3">
                                    <label class="col-4 form-control-label text-xs-right">
                                        Select payment Gateway :<span style="color:red">*</span>
                                    </label>
                                    <input autocomplete="off" type="radio" checked="checked" name="payment_gateway" id="SBIePay" value="SBIePay"> SBIePay
<!--                              <input type="radio" name="payment_gateway" id="PayGOV" value="PayGOV"> PayGOV-->
                                </div>
                                <div class="form-group">
                                    <label class="col-4 form-control-label text-xs-right"></label>
                                    <!-- <input autocomplete="off" type="checkbox" name="term_condition"  id="term_condition" value="I accept the terms and conditions">  -->
                                    <input autocomplete="off" type="checkbox" name="term_condition" class="InvoiceRequired AdvanceRequired ProformaRequired"  id="term_condition"> 
                                    I accept the 
                                    <a href="http://cpri.res.in/terms-and-condition-payment" target="_blank"><span style="color:blue">terms and conditions</span></a>
                                </div>

<?php

$count = $this->Pay_online_model->get_data_count();
$count++;
//$pi_no = 'CPRI/'.$acronym.'/'.$acronym1.'/'.date('Y').'/'.'RC/'.$count;
// $pi_no = 'CPRI/' . date('Y') . '/' . 'PD/' . $count;
$pi_no = 'CPRI/' . date('Y') . '/' . 'PD/';
?>
                                <input autocomplete="off" type="hidden" name="reference_id" id="reference_id" value="<?php echo $pi_no; ?>">

                            </div>





                            <div class="response"></div>

                        </div>
                        </div>
                        <div class="form-group row mb-3" id="submit_button">
                            <div class="col-10 col-offset-2 text-xs-center">
                                <input autocomplete="off" type="submit" name="submit"  id ="submit_id" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </article>
<?php //include_once "footer.php"; ?>
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#proforma_invoice_no_div').hide();
                $('#advance_no_div').hide();
                $('#invoice_no_div').hide();
                $('#payment_div').hide();
                $('#submit_button').hide();
                $('#payment_made_against').change(function () {
                    if ($('#payment_made_against').val() == 'Proforma Invoice') {
                        $('#proforma_invoice_no_div').show();
                        $('#payment_div').show();
                        $('#submit_button').show();
                        $('#invoice_no_div').hide();
                        $('#advance_no_div').hide();
                        $('.btn-primary').prop('disabled', false)
                    } else if ($('#payment_made_against').val() == 'Invoice') {
                        $('#proforma_invoice_no_div').hide();
                        $('#invoice_no_div').show();
                        $('#payment_div').show();
                        $('#submit_button').show();
                        $('#advance_no_div').hide();
                        $('.btn-primary').prop('disabled', false)
                    } else if($('#payment_made_against').val() == 'Advance'){
                        $('#proforma_invoice_no_div').hide();
                        $('#invoice_no_div').hide();
                        $('#advance_no_div').show();
                        $('#payment_div').show();
                        $('#submit_button').show(); 
                        // $('.btn-primary').prop('disabled', true)
                    }else {
                     
                        $('#proforma_invoice_no_div').hide();
                        $('#advance_no_div').hide();
                        $('#invoice_no_div').hide();
                        $('#payment_div').hide();
                        $('#submit_button').hide();
                    }
                });
            });
        </script>
    </container>
  <!-- footer -->
<footer>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <!-- <h5 class="fw-bold">Head Office</h5> -->
                  <div class="region region-footer-2">
    <div class="block block-views first last odd" id="block-views-footer-links-block-8">

      
  <div class="view view-footer-links view-id-footer_links view-display-id-block_8 view-dom-id-bbb2428792f776599c5b248fc606442b">
        
  
  
      <div class="view-content">
        <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
      
  <div class="views-field views-field-field-footer-left-body">        <div class="field-content"><p><span style="font-size:16px"><strong>Head Office</strong></span></p>
<p>CENTRAL POWER RESEARCH INSTITUTE<br />
(A Government of India Society, Ministry Of Power)<br />
Prof. Sir C.V. Raman Road. Post Box No: 8066,<br />
Sadasiva Nagar (P.O), Bengaluru, India, Pincode: 560 080,<br />
IPPBX: 82778 92280/81,82,83,......94,95. <br />
Fax: +91(80)-2360-1213</p>
<p>This Website belongs to Central Power Research Institute,<br />
Ministry of Power, Government of India</p>
</div>  </div>  </div>
    </div>
  
  
  
  
  
  
</div>
</div>
  </div>
            </div>
            <div class="col-md-4">
                  <div class="region region-footer-3">
    <div class="block block-views first last odd" id="block-views-footer-links-block-7">

      
  <div class="view view-footer-links view-id-footer_links view-display-id-block_7 view-dom-id-b69fc353eae2976d9be4641253e28df6">
        
  
  
      <div class="view-content">
        <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
      
  <div class="views-field views-field-body">        <div class="field-content"><!--------<p><iframe height="450" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d10505179.481777279!2d72.74563302929674!3d22.733859226844494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1scpri%20centers%20near%20India!5e0!3m2!1sen!2sin!4v1599722782387!5m2!1sen!2sin" style="border:0;" width="400"></iframe><!--<iframe frameborder="0" height="450" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14009.132357700493!2d77.3548543!3d28.6212765!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x835b495a334f02c1!2sCentral%20Power%20Research%20Institute!5e0!3m2!1sen!2sin!4v1616153589061!5m2!1sen!2sin" style="border:0;" width="600"></iframe></p>------></div>  </div>  </div>
    </div>
  
  
  
  
  
  
</div>
</div>
  </div>
            </div>
            <div class="col-md-4">
                  <div class="region region-footer-4">
    <div class="block block-views first odd" id="block-views-footer-links-block-9">

      
  <div class="view view-footer-links view-id-footer_links view-display-id-block_9 view-dom-id-535b99dea7fcba336ac439516e2d90ff">
        
  
  
      <div class="view-content">
        <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
      
  <div class="views-field views-field-field-footer-right-body">        <div class="field-content"><p>Contents on this website is published and managed by the Central Power Research Institute, Ministry of Power, Government of India. For any query regarding this website please contact the <a href="/content/web-information-manager" title="Web Information Manager"><strong>Web Information Manager (click here).</strong></a></p>
<p> </p>
</div>  </div>  </div>
    </div>
  
  
  
  
  
  
</div>
</div>
<div class="block block-visitors even" id="block-visitors-0">

      
  <div class="item-list"><ul><li class="first last">Total Visitors: 3104032</li>
</ul></div>
</div>
<div class="block block-views last odd" id="block-views-footer-links-block-6">

      
  <div class="view view-footer-links view-id-footer_links view-display-id-block_6 view-dom-id-1c645b6afc17425df5ec7e5ed7ab998b">
        
  
  
      <div class="view-content">
        <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
      
  <div class="views-field views-field-php">        <span class="field-content">Last Updated: 15-11-2022 12:35:20</span>  </div>  
  <div class="views-field views-field-field-footer-icon-1">        <div class="field-content"><img typeof="foaf:Image" src="https://cpri.inroad.in/sites/default/files/WhatsApp%20Image%202020-05-21%20at%203.05.30%20PM%20%281%29.jpeg" width="85" height="46" alt="W series 1" /></div>  </div>  
  <div class="views-field views-field-field-footer-icon-2-">        <div class="field-content"><img typeof="foaf:Image" src="https://cpri.inroad.in/sites/default/files/WhatsApp%20Image%202020-05-21%20at%203.05.30%20PM.jpeg" width="85" height="46" alt="W series 1" /></div>  </div>  
  <div class="views-field views-field-field-footer-icon-3">        <div class="field-content"><img typeof="foaf:Image" src="https://cpri.inroad.in/sites/default/files/WhatsApp%20Image%202020-05-21%20at%203.05.30%20PM%20%281%29_0.jpeg" width="85" height="46" alt="W series 2" /></div>  </div>  
  <div class="views-field views-field-field-footer-icon-4">        <div class="field-content"><img typeof="foaf:Image" src="https://cpri.inroad.in/sites/default/files/WhatsApp%20Image%202020-05-21%20at%203.05.30%20PM_0.jpeg" width="85" height="46" alt="W series 3" /></div>  </div>  </div>
    </div>
  
  
  
  
  
  
</div>
</div>
  </div>

                <div class="footer-img d-flex flex-wrap">
                    <div class="img">
                          <div class="region region-footer-8">
    <div class="block block-views first last odd" id="block-views-footer-links-block-4">

      
  <div class="view view-footer-links view-id-footer_links view-display-id-block_4 view-dom-id-88d524ee16fdd9ae1bc299022846bb3b">
        
  
  
      <div class="view-content">
        <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
      
  <div class="views-field views-field-field-copyright-text">        <div class="field-content">© Copyright 2020 Central Power Research Institute. All rights reserved.</div>  </div>  </div>
    </div>
  
  
  
  
  
  
</div>
</div>
  </div>
                    </div>

                </div>
            </div>

            <div class="col-md-12 text-center">
                <div class="footer-bottom-links">
                      <div class="region region-footer-9">
    <div class="block block-views first last odd" id="block-views-footer-links-block-3">

      
  <div class="view view-footer-links view-id-footer_links view-display-id-block_3 view-dom-id-57fe10283251fff3e7c1fdb8de2e4a11">
        
  
  
      <div class="view-content">
        <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
      
  <div class="views-field views-field-php">        <span class="field-content">| <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Terms of Use" href="/terms-use">Terms of Use</a> | 
    <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="|Privacy Policy"  href="/privacy-policy">Privacy Policy</a> | 
    <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="|Disclaimer"  href="/disclaimer">Disclaimer</a> | 
    <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="|Help"  href="/help">Help</a> | 
    <a  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Copyright Policy"  href="/copyright-policy">Copyright Policy</a> | 
    <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Website Policies"  href="/website-policies">Website Policies</a> |
    <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hyper Linking Policy "  href="/hyper-linking-policy">Hyper Linking Policy</a> |
    <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Broken Links Policy "  href="/broken-links-policy">Broken Links Policy</a> |
    <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Screen Reader "  href="/screen-reader-access">Screen Reader</a> |
    <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="ContingencyPlan "  href="/contingency-plan">Contingency Plan</a> |  
    <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Website Monitoring Plan"  href="/website-monitoring-plan">Website Monitoring Plan</a> |
    </span>  </div>  </div>
    </div>
  
  
  
  
  
  
</div>
</div>
  </div>

                </div>
            </div>
        </div>
    </div>

</footer>
<!-- <script src="https://cpri.inroad.in/sites/all/themes/zen/new/js/jquery-.min.js"></script> -->
<script src="https://cpri.inroad.in/sites/all/themes/zen/new/js/bootstrap.bundle.min.js"></script>
<!-- <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script> -->
<!-- <script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script> -->


<style>
    .top-nav span.field-content {
        white-space: nowrap;
    }

    .top-nav .views-row.views-row-1.views-row-odd.views-row-first.views-row-last {
        display: flex;
        align-items: center;
    }

    .top-nav .views-field-nothing a {
        color: #fff;
        text-decoration: none;
        line-height: 2;
        margin-left: 0.5rem;
    }
</style>

<script>
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $(this).find(".dropdown-menu").first().stop(true, true).slideDown(150);
            },
            function () {
                $(this).find(".dropdown-menu").first().stop(true, true).slideUp(105);
            }
        );



    });

</script>  



<script>
$(document).ready(function() {
 $("#edit-date-time--2-datepicker-popup-0").datepicker();
 $("#edit-date-time--2-datepicker-popup-0").on('change', function(){
         var date = Date.parse($(this).val());
        if(date){
         $('#edit-date-time--2-datepicker-popup-0-error').css('display','none');
         $(this).removeClass('error');
        }
    });
   $('.form-item-date-time label').css('float','left');
   

    $('#edit-program-name').removeAttr('maxlength');
    $('#enrollment-my-form--2 #edit-program-name--2, #enrollment-my-form #edit-program-name').css('width','90%'); 
   $('.dropdown-menu.sub-menu').css('display','none');
   $('.dropdown-menu.sub-menu-h').css('display','none');
   $('.dropdown-menu.sub-menu').parent().addClass('program-menu');
   $('.dropdown-menu.sub-menu-h').parent().addClass('program-menu menu-h');
   $("li.program-menu").on("mouseover",function()
   {   
      $('ul.dropdown-menu.sub-menu').css('display','block');
      $('ul.dropdown-menu.sub-menu-h').css('display','block');
   });   
   $("li.program-menu").on("mouseout",function()
   {   
      $('ul.dropdown-menu.sub-menu').css('display','none');
      $('ul.dropdown-menu.sub-menu-h').css('display','none');
   });
   
   $('a.easy-breadcrumb_segment-title').addClass('inactiveLink');
   // $t=$( "#content div.messages" ).hasClass("status");
   // if($t!=''){
   //       $( "#content div.messages.error" ).css('display','none');
   // }

   });

//Request for new program and enroll program 
$(document).ready(function(){
   ///captcha 
               $('div.form-item-date-time div:eq( 3 )').css('display','none')
   //Request for new form checkbox
   $('#edit-training-area--2 input').on('change',function(e){
      var t = $(this).val();
      if(t == 'Other' || t == 'अन्य'){
         $('#form-item-other-training-area,#edit-other-training-area--2,.form-item-other-training-area').css('display','block');
      }
      else{
         $('#edit-other-training-area--2,#edit-other-training-area--2,.form-item-other-training-area').css('display','none');
      }
   });
   
       var ntpc_emps = $('input[name="ntpc_employee"]:checked').val();
       if(ntpc_emps == 'Yes' || ntpc_emps == 'हाँ'){
       $('.ntpc_emp').css('display','block');
       $('.ntpc_emp_hide').css('display','none');
      }
       if(ntpc_emps == 'No' || ntpc_emps == 'नहीं'){
       $('.ntpc_emp').css('display','none');
       $('.ntpc_emp_hide').css('display','block');
      }

      var consent_prog = $('input[name="consent_program"]:checked').val();
       if(consent_prog == 'Yes' || consent_prog == 'हाँ' ){
         //alert('ew');
         $('label.text-name').css('display','block');
         $('.form-item-other-answer-previously').css('display','block');
      }
       if(consent_prog == 'No' || consent_prog == 'नहीं' ){
         //alert('rrrrr');
          $('label.text-name').css('display','block');
         $('.form-item-other-answer-previously').css('display','block');
      }
   

   $('<span class="form-required" title="This field is required.">*</span>').insertAfter('.form-item-candidate-emp-number label');
   $('<span class="form-required" title="This field is required.">*</span>').insertAfter('.form-item-candidate-designation label');
   $('<span class="form-required" title="This field is required.">*</span>').insertAfter('.form-item-candidate-project label');
    $('.form-item-candidate-emp-number label').removeAttr('style');
         
   $('input[name="ntpc_employee"]').on('change',function(e){
      var t = $(this).val();
      if(t == 'Yes' || t == 'हाँ'){
         $("input[name=consent_program][value='No']").attr('checked', 'checked');
         $('.ntpc_emp,.form-item-candidate-emp-number label').css('display','block');
         $('.ntpc_emp_hide').css('display','none');
         $('label.text-name').css('display','block');
         $('.form-item-candidate-emp-number label').removeAttr('style');
         $('input[name="candidate_emp_number"]').attr("required", "true");
         $('input[name="candidate_designation"]').attr("required", "true");
         $('input[name="candidate_project"]').attr("required", "true");
         $( '<span class="form-required" title="This field is required.">*</span>').insertAfter( $( ".form-item-candidate-emp-number > </label>" ) );
         $('<span class="form-required" title="This field is required.">*</span>').insertAfter('.form-item-candidate-emp-number label');
         $('<span class="form-required" title="This field is required.">*</span>').insertAfter('.form-item-candidate-designation label');
         $('<span class="form-required" title="This field is required.">*</span>').insertAfter('.form-item-candidate-project label');
         $('.form-item-candidate-emp-number label').empty();
         $('.form-item-candidate-designation label').empty();
         $('.form-item-candidate-project label').empty();
         var consent_prog = $('input[name="consent_program"]:checked').val();
          if(consent_prog == 'Yes' || consent_prog == 'हाँ' ){
            $('label.text-name').css('display','block');
            $('.form-item-other-answer-previously').css('display','block');
         }
          if(consent_prog == 'No'){
             $('label.text-name').css('display','block');
            $('.form-item-other-answer-previously').css('display','none');
         }
      }
      else{
         //alert('ttttt');
         $('.ntpc_emp,.form-item-candidate-emp-number label').css('display','none');
         $('.ntpc_emp_hide').css('display','block');
         $('label.text-name').css('display','block');
         $("input[name=consent_program][value='Yes']").attr('checked', 'checked');
         
      }
      

   });

   $('input[name="consent_program"]').on('change',function(e){
      var t = $(this).val();
      if(t == 'Yes' || t == 'हाँ'){
         $('input[name="other_answer_previously"]').attr("required", "true");
         $('input[name="other_answer_previously"]').css('display','block');
         $('.form-item-answer-previously').css('display','block');
         $('label.text-name').css('display','block');
         $('.form-item-other-answer-previously').css('display','block');
      }else{
         $('input[name="other_answer_previously"]').attr("required", "false");
         $('input[name="other_answer_previously"]').css('display','none');
         $('.form-item-answer-previously').css('display','none');
         $('label.text-name').css('display','none');
         $('.form-item-other-answer-previously').css('display','none');
         
      }
   });
   //Request for a new program Form Validation
   $(function() {
      $('#request-new-program-my-form,#request-new-program-my-form--2').validate( {    
         rules: {
            training_area:"required",

            other_training_area:{
               required: true,
               alphanumeric_space: true
             }, 

 
            program_name:{
               required: true, 
               lettersonly:true
            },

            ntpc_employee:"required",
            candidate_name:{
               required: true, 
               lettersonly:true
            },
            candidate_emp_number:{
               required: true
            },
            candidate_designation:{
               required: true, 
               lettersonly:true
            },
            candidate_project:{
               required: true
            },
            required_level:{
               required: true, 
               alphanumeric: true,
               maxlength: 2         
            },
   
             candidate_email:{
               required: true, 
               email:true     
            },

             candidate_phone:{
               required: true, 
               minlength: 10,
               digits:true       
            },

            program_objective:{
               required: true,
               lettersonly:true
            },
            consent_program:{
               required: true
            },
      
            answer_previously:{
               required: true
            },

            other_answer_previously:{
               required: true,
               alphanumeric_space:true
             },
            participants_number:{
               required: true, 
               minlength: 2,
               digits:true
            },
            captcha_response:{
               required: true
            },
            days:{
               required: true, 
               minlength: 1,
               digits:true
            },
            faculty:{
               required: true, 
               lettersonly:true
            },
            location:{
               required: true, 
               alphanumeric_space:true
            },
            'date_time[date]':"required",           
            validDate:true          
         }
         , messages: {

            training_area:"Please select your training area",

             other_training_area:{
                         required: "Please select your other training area",
                         alphanumeric_space: "Enter only letters,number,dashes and spaces"
            },
            program_name:{
                        required: "Please enter program name",
                        lettersonly: "Enter only letters"
            },
            ntpc_employee:"Please select your employee type",
            candidate_emp_number:{
                        required: "Please enter employee number"
                     },
            candidate_name:{
                        required: "Please enter candidate name",
                        lettersonly: "Enter only letters"
                     },

            candidate_designation:{required: "Please enter candidate name",
                        lettersonly: "Enter only letters"
                     },
            candidate_project:{required: "Please enter project name",
                        lettersonly: "Enter only letters"
                     },
             required_level:{
                         required: "Please enter required level",
                         alphanumeric: "Enter only letters and number",
                         maxlength: "Upto 2 character can be entered"
            },
            candidate_email:{
                        required: "Please enter email",
                        email: "Enter valid email"
                     }, 
            candidate_phone:{
                           required: "Please enter valid mobile number",
                           minlength: "Enter minimum 10 digits",
                           digits: "Enter only digits"
                     },
             program_objective:{
                         required: "Please enter program objective",
                         lettersonly: "Enter only letters"
            },
            consent_program:{
                         required:"Please select your consent program"
            },
            
            answer_previously:{
                         required:"Please select your previous answer"
            },

            other_answer_previously:{
                         required:"Please enter your consent program details",
                          alphanumeric_space: "Enter only letters,number,dashes and spaces"
            },
            participants_number:{
                         required: "Please enter participants number",
                         minlength:"Minimum 10 people",
                         digits: "Enter only digits"
            },
            
            days:{
                  required: "Please enter number of days",
                  minlength:"Minimum 1 digit",
                  digits: "Enter only digits"
            },
            faculty:{
               required:"Please enter your faculty suggested",
               lettersonly: "Enter only letters"
            },
            location:{
               required:"Please enter your location",
                alphanumeric_space: "Enter only letters,number,dashes and spaces"
            },
            captcha_response:{
                     required: "Please enter the captcha."
            },
            
            'date_time[date]':"Please enter program date",
            validDate:"Please enter correct date format"
         },

      });      
   });   

   $.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) ||/^[a-z\d]+$/i.test(value);
    }, "Username must contain only letters, numbers");

    $.validator.addMethod("alphanumeric_space", function(value, element) {
        return this.optional(element) ||/^[a-z\d\-_\s]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");

   $.validator.addMethod("lettersonly", function(value, element) {
   return this.optional(element) || /^[a-z\s]+$/i.test(value);
   }, "Only alphabetical characters");
      
   $.validator.addMethod("validDate", function(value, element) {
        return this.optional(element) || moment(value,"dd/md/YYYY").isValid();
    }, "Please enter a valid date in the format dd/md/YYYY");

      
      $("#edit-submit-request").click(function () {
            if (!$("#request-new-program-my-form,#request-new-program-my-form--2").validate()) {
                   return false;
               } else {
                   $("#request-new-program-my-form,#request-new-program-my-form--2").submit()
               }
           });
      
   $("#edit-reset").on('click',function(){
      $('#request-new-program-my-form,#request-new-program-my-form--2')[0].reset();
   });
   
}); //end of document.ready

$(document).ready(function(){ 
      
    //Request for a Enrollment Form Validation
    $('#enrollment-my-form--2,#enrollment-my-form').validate( {      
        rules: {
            name:{
                required: true, 
            lettersonly: true       
         },
         email:{
                required: true, 
            email:true
            },
            address:{
                alphanumeric_space: true
         },
          city:{
                required: true, 
            lettersonly: true       
         },
         mobile:{
                required: true,
            minlength: 10,
            digits:true
         },
         fax:{
                alphanumeric: true
         },
         designation:{
                lettersonly: true
         },
         project:{
                alphanumeric_space: true
         },
         employee_no:{
                required: true,
                alphanumeric: true, 
                minlength: 1
            },
            other_select_organization:{
                required: true,
                alphanumeric_space: true
            },
            sponsoring_authority:{
                alphanumeric_space: true
         },
         comments:{
                alphanumeric_space: true
         },
         captcha_response:{
                required: true
            }            
        }
        , messages: {
            
             name:{
            required: "Please enter valid name",
            lettersonly: "Enter only letters"
         }, 
         email:{
            required: "Please enter email",
            email: "Enter valid email"
         },
         address:{
               alphanumeric_space: "Enter only letters,number,dashes and spaces"
         },
          city:{
            required: "Please enter valid city",
            lettersonly: "Enter only letters"
         }, 
         mobile:{
               required: "Please enter valid mobile number",
               minlength: "Enter minimum 10 digits",
               digits: "Enter only digits"
         },
         fax:{
               alphanumeric: "Enter only letters and number"
         },
         designation:{
               lettersonly: "Enter only letters"
         },
         project:{
               alphanumeric_space: "Enter only letters,number,dashes and spaces"
         },
         employee_no:{
                  required: "Please enter employee number",
                  alphanumeric: "Enter only letters and number",
                  minlength:"Minimum 1 digit"
         },
         other_select_organization:{
                  required: "Please enter organization details",
                  alphanumeric_space: "Enter only letters,number,dashes and spaces"
         },
         sponsoring_authority:{
               alphanumeric_space: "Enter only letters,number,dashes and spaces"
         },
         comments:{
               alphanumeric_space: "Enter only letters,number,dashes and spaces"
         },
         captcha_response:{
                  required: "Please enter the captcha."
         },
         /* days:{
               required: "Please enter participants number",
               minlength:"Minimum 1 digit",
               digits: "Enter only digits"
         }, */

      },
      
    });
   $.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) ||/^[a-z\d]+$/i.test(value);
    }, "Username must contain only letters, numbers");
    $.validator.addMethod("alphanumeric_space", function(value, element) {
        return this.optional(element) ||/^[a-z\d\-_\s]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");
   $.validator.addMethod("lettersonly", function(value, element) {
   return this.optional(element) || /^[a-z\s]+$/i.test(value);
   }, "Only alphabetical characters");
      
   $("#edit-submit-enroll").click(function () {
            if (!$("#enrollment-my-form,#enrollment-my-form--2").validate()) {
                return false;
            } else {
                $("#enrollment-my-form,#enrollment-my-form--2").submit();
            }
        });

   $("#edit-reset--2").click(function() {
          $(this).closest('form').find("input:text:not('.ignore'), textarea").val("");
   });
   jQuery(document).on('click', 'a', function(){
         var base_uri = '/';
         var a_href = jQuery(this).attr('href');
         var a_href_arr = a_href.split('/');
         if((a_href_arr[0] == 'http:' || a_href_arr[0] == 'https:') && a_href.indexOf(base_uri) === -1){
            var cnf = confirm('This link will take you to an external website.');
            if(cnf)
               return true;
            else
               return false;
         }
      });
   
   $( "#block-views-about-pmi-block .field-content p a" ).last().addClass('emails');
   $( "#block-views-about-pmi-block .field-content ul" ).last().addClass('emails');
   $( "#block-views-contact-us-block .field-content .detail address:nth-last-child(3)" ).addClass('emails');
   $( "#block-views-contact-us-block .field-content .detail address:nth-last-child(1)" ).addClass('emails');
   $( "#block-views-reach-us-block .content p:nth-last-child(4)" ).addClass('emails');
   $( "#block-views-rli-block .content .row p:nth-last-child(1)" ).addClass('emails');
   $( "#block-views-rli-block-3 .rli .row div table:nth-last-child(6)" ).addClass('emails');
   $("form").attr('autocomplete', 'off');
   $( ".our_programmes ul.prog-list li").css('list-style','none');
   $( ".faculty-box ul.detail li label a" ).addClass('emails');
   $( "#block-views-contact-us-block address.emails p a" ).addClass('emails');
   $( "ul.emails a" ).addClass('emails');
   $( "p.emails a" ).addClass('emails');


});

//To change emails a tag to span tag
$(document).ready(function(){
var has_class=$( "a" ).hasClass( "emails" );
   if(true){
      var $span = $("a.emails");
   $span.replaceWith(function () {
       return $('<span/>', {
           class: 'emails',
           html: this.innerHTML
       });
   });

   }  
   
});
//Email flooding control
$(window).load(function(){

   
    //$(".detail label a, .fd tr.emails td, footer p.emails a, .contact_us address.emails p a,.view-about-pmi ul.emails li a,.view-about-pmi .field-content p a.emails,#block-views-rli-block .content .row p.emails, .emails a").each(function() {
      $("span.emails,p.emails").each(function() {
        var text = $(this).html();
        var text_arr = text.split('.');
        var text_arr_len = text_arr.length;
        for(var i = 0; i < text_arr_len; i++)
          text = text.replace('.', '[dot]');
        $(this).html(text.replace('@', '[at]'));
        //$(this).attr('href', 'javascript://');
      $('span.emails').removeAttr('href');
    })
   $("#anonymous-subscriptions-form input[type='submit']").addClass('btn');
   $("#node-40 .links li a").css({'text-decoration':'underline','color':'#2D5FA4'});
   $('#comments').hide();
   $('#node-40 .links li a').on('click', function(e) {
      $('#comments').toggle(); //you can list several class names 
      e.preventDefault();
    });

      
});
   

/*function to restrict special char in textbox and textarea*/
$(function(){
   $('input[type=text], textarea').not($('input[name="custom_search"]')).keyup(function()
   {
      var yourInput = $(this).val();
      re = /[`~!#$%^&*|+\=?;:\'\"<>\{\}\[\]\\\/]/gi;
      var isSplChar = re.test(yourInput);
      if(isSplChar)
      {
         var no_spl_char = yourInput.replace(/[`~!#$%^&*|+\=;:\'\"<>\{\}\[\]\\\/]/gi, '');
         $(this).val(no_spl_char);
      }
   });
});

</script>

<script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#unit_id').on('change', function () {
                                                    var unit_id = $(this).val();
                                                 
                                                    if (unit_id == '')
                                                    {
                                                        $('#department_id').prop('disabled', true);
                                                    } else {
                                                        $('#department_id').prop('disabled', false);
                                                        $.ajax({
                                                            url: "<?php echo base_url() ?>Laboratories/get_departments",
                                                            type: "POST",
                                                            data: {'unit_id': unit_id},
                                                            datatype: 'json',
                                                            //contentType : 'application/txt',
                                                            success: function (data) {
                                                                $('#department_id').html(data);
                                                            },
                                                            error: function (jqXHR, exception) {
                                                                var msg = '';
                                                                if (jqXHR.status === 0) {
                                                                    msg = 'Not connect.\n Verify Network.';
                                                                } else if (jqXHR.status == 404) {
                                                                    msg = 'Requested page not found. [404]';
                                                                } else if (jqXHR.status == 500) {
                                                                    msg = 'Internal Server Error [500].';
                                                                } else if (exception === 'parsererror') {
                                                                    msg = 'Requested JSON parse failed.';
                                                                } else if (exception === 'timeout') {
                                                                    msg = 'Time out error.';
                                                                } else if (exception === 'abort') {
                                                                    msg = 'Ajax request aborted.';
                                                                } else {
                                                                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                                                                }
                                                                alert(msg);
                                                            },
                                                        });
                                                    }
                                                });



                                                $('#unit_id1').on('change', function () {
                                                    var unit_id = $(this).val();
                                                  
                                                 if (unit_id == '')
                                                 {
                                                     $('#department_id1').prop('disabled', true);
                                                 } else {
                                                     $('#department_id1').prop('disabled', false);
                                                     $.ajax({
                                                         url: "<?php echo base_url() ?>Laboratories/get_departments",
                                                         type: "POST",
                                                         data: {'unit_id': unit_id},
                                                         datatype: 'json',
                                                         //contentType : 'application/txt',
                                                         success: function (data) {
                                                            console.log(data);
                                                             $('#department_id1').html(data);
                                                         },
                                                         error: function (jqXHR, exception) {
                                                             var msg = '';
                                                             if (jqXHR.status === 0) {
                                                                 msg = 'Not connect.\n Verify Network.';
                                                             } else if (jqXHR.status == 404) {
                                                                 msg = 'Requested page not found. [404]';
                                                             } else if (jqXHR.status == 500) {
                                                                 msg = 'Internal Server Error [500].';
                                                             } else if (exception === 'parsererror') {
                                                                 msg = 'Requested JSON parse failed.';
                                                             } else if (exception === 'timeout') {
                                                                 msg = 'Time out error.';
                                                             } else if (exception === 'abort') {
                                                                 msg = 'Ajax request aborted.';
                                                             } else {
                                                                 msg = 'Uncaught Error.\n' + jqXHR.responseText;
                                                             }
                                                             alert(msg);
                                                         },
                                                     });
                                                 }
                                                })
                                            });




                                 // 06-01-2023 validation for TDS AMOUT Deduction
                                   $("#paymentForm").on('submit',function(e){ 
                                        var paymentAg =  $('#payment_made_against').val();
                                        console.log(paymentAg+'Hiiii')
                                        const flag=[];
                                        if(paymentAg==='Proforma Invoice')
                                        {
                                          $.each(this,function(i,element){
                                             if(element.value==='' && $('#'+element.id).attr('class').includes('ProformaRequired')){
                                                $('#'+element.id).focus()
                                                e.preventDefault();
                                                flag.push(false)
                                                return false
                                             }

                                           })


                                      
                                        }else if(paymentAg==='Invoice')
                                        {
         
                                           $.each(this,function(i,element){

                                             if(element.value==='' && $('#'+element.id).attr('class').includes('InvoiceRequired')){
                                             	$('#'+element.id).focus()
                                                e.preventDefault();
                                                flag.push(false)
                                                return false
                                             }

                                           })

                                        }
                                        else{

                                           $.each(this,function(i,element){
                                             if(element.value==='' && $('#'+element.id).attr('class').includes('AdvanceRequired')){
                                                $('#'+element.id).focus()
                                                e.preventDefault();
                                                flag.push(false)
                                                return false
                                             }
                                           })
                                        }

                                        // Check Box validation for at the time of submit Button 

                                          if(flag.length===0){
                                             const checkBox = document.getElementById('term_condition');
                                            if(!checkBox.checked) {
                                             alert('Please accept the terms and conditions');
                                             $('#term_condition').focus();
                                              e.preventDefault();
                                                return false

                                            }
                                          }

                            

                                     });

                                     $("#mobile_no1").keydown(function(event) {
                                         k = event.which;
                                         if ((k >= 96 && k <= 105) ||(k >= 48 && k <= 57)|| k == 8) {
                                           if ($(this).val().length == 10) {
                                             if (k == 8) {
                                               return true;
                                             } else {
                                               event.preventDefault();
                                               return false;

                                             }
                                           }
                                         } else {
                                           event.preventDefault();
                                           return false;
                                         }

                                       });

                                        $("#mobile_no").keydown(function(event) {
                                         k = event.which;
                                         console.log(k);
                                         if ((k >= 96 && k <= 105) ||(k >= 48 && k <= 57)|| k == 8) {
                                           if ($(this).val().length == 10) {
                                             if (k == 8) {
                                               return true;
                                             } else {
                                               event.preventDefault();
                                               return false;

                                             }
                                           }
                                         } else {
                                           event.preventDefault();
                                           return false;
                                         }

                                       });

                                        </script>

<style>
   div div.col-md-12.ntpc_emp_hide{padding-right: 0px !important;padding-left: 0px !important}
</style>
</body>
</html>
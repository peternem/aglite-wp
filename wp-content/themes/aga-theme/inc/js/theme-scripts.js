/*! Agalite WP Theme  - v0.1.0 - 2019-10-03
 * http://agalite.com
 * Copyright (c) 2019; * Licensed GPLv2+ */

jQuery(document).ready(function(){function wpex_staticheader(){var header_height=jQuery(".navbar").outerHeight();if(jQuery("#page").css({paddingTop:header_height}),jQuery("#wpadminbar").length){var admin_height=jQuery("#wpadminbar").outerHeight();jQuery(".navbar").css({position:"fixed",top:admin_height})}}wpex_staticheader(),jQuery(window).resize(function(){wpex_staticheader()}),jQuery(window).bind("orientationchange",function(event){var header_height=jQuery(".navbar").outerHeight();if(jQuery("#page").css({paddingTop:header_height}),jQuery("#wpadminbar").length){var admin_height=jQuery("#wpadminbar").outerHeight();jQuery(".navbar").css({position:"fixed",top:admin_height})}}),jQuery(".fscf-div-clear .fscf-div-field-left").addClass("form-group"),jQuery(".fscf-div-field .fscf-input-text").addClass("form-control"),jQuery(".fscf-div-field .fscf-input-textarea").addClass("form-control"),jQuery(".comment-reply-link").addClass("btn btn-sm btn-default"),jQuery("#submit, button[type=submit], button, html input[type=button], input[type=reset], input[type=submit]").addClass("btn btn-default"),jQuery(".widget_rss ul").addClass("media-list"),jQuery(".postform").addClass("form-control"),jQuery("table#wp-calendar").addClass("table table-striped"),jQuery("#submit, .tagcloud, button[type=submit], .comment-reply-link, .widget_rss ul, .postform, table#wp-calendar").show("fast"),jQuery(function(){jQuery(".pop").click(function(e){jQuery("#imagemodal .imagepreview").attr("src",jQuery(this).attr("data-img-url")),jQuery("#imagemodal .modal-title").html(jQuery(this).attr("data-img-alt")),jQuery("#imagemodal").modal("show")})}),jQuery(window).scroll(function(){100<jQuery(this).scrollTop()?jQuery(".scroll-to-top").fadeIn():jQuery(".scroll-to-top").fadeOut()}),jQuery(".scroll-to-top").click(function(){return jQuery("html, body").animate({scrollTop:0},800),!1}),jQuery(function(){jQuery(".carousel-caption a[href*=#]:not([href=#]), .jumbo-caption a[href*=#]:not([href=#])").click(function(){if("".pathname.replace(/^\//,"")===this.pathname.replace(/^\//,"")&&"".hostname===this.hostname){var target=jQuery(this.hash);if((target=target.length?target:jQuery("[name="+this.hash.slice(1)+"]")).length)return jQuery("html,body").animate({scrollTop:target.offset().top-50},1e3),!1}}),jQuery(".opt-jumpmenu a[href*=#]:not([href=#])").click(function(){if("".pathname.replace(/^\//,"")===this.pathname.replace(/^\//,"")&&"".hostname===this.hostname){var target=jQuery(this.hash);if((target=target.length?target:jQuery("[name="+this.hash.slice(1)+"]")).length)return jQuery("html,body").animate({scrollTop:target.offset().top-125},1e3),!1}})})});
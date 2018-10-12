<?php
/**
 * Crypto News hooks
 *
 * @package Crypto_News
 */

/**
 * General
 *
 * @see  crypto_news_header_widget_region()
 * @see  crypto_news_get_sidebar()
 */
add_action( 'crypto_news_sidebar',        'crypto_news_get_sidebar',          10 );


/**
 * Header
 * 
 */

add_action( 'crypto_news_header', 'crypto_news_site_branding', 10 );
add_action( 'crypto_news_header', 'crypto_news_header_banner', 20 );
add_action( 'crypto_news_header', 'crypto_news_primary_navigation', 30 );


/**
 * Posts
 *
 * @see  crypto_news_loop_posts()
 * @see  crypto_news_paging_nav()
 * @see  crypto_news_single_post_header()
 * @see  crypto_news_single_post_thumbnail()
 * @see  crypto_news_post_content()
 * @see  crypto_news_post_nav()
 * @see  crypto_news_display_comments()
 * @see  crypto_news_single_post_meta_before()
 * @see  crypto_news_single_post_meta_after()
 */
add_action( 'crypto_news_loop_post', 'crypto_news_loop_posts', 10 );
add_action( 'crypto_news_loop_after', 'crypto_news_paging_nav', 10 );
add_action( 'crypto_news_single_post', 'crypto_news_single_post_header', 10 );
add_action( 'crypto_news_single_post', 'crypto_news_single_post_thumbnail',30 );
add_action( 'crypto_news_single_post', 'crypto_news_post_content', 40 );
add_action( 'crypto_news_single_post_bottom', 'crypto_news_post_nav', 10 );
add_action( 'crypto_news_single_post_bottom', 'crypto_news_display_comments', 20 );
add_action( 'crypto_news_single_post_before_title', 'crypto_news_single_post_meta_before', 10 );
add_action( 'crypto_news_single_post_after_title', 'crypto_news_single_post_meta_after', 10 );

/**
 * Pages
 *
 * @see  crypto_news_page_header()
 * @see  crypto_news_page_content()
 * @see  crypto_news_display_comments()
 */
add_action( 'crypto_news_page',       'crypto_news_page_header',          10 );
add_action( 'crypto_news_page',       'crypto_news_page_content',         20 );
add_action( 'crypto_news_page_after', 'crypto_news_display_comments',     10 );


/**
 * Footer
 *
 * @see  crypto_news_footer_widgets()
 * @see  crypto_news_credit()
 */
add_action( 'crypto_news_footer', 'crypto_news_footer_widgets', 10 );
add_action( 'crypto_news_footer', 'crypto_news_credit',         20 );
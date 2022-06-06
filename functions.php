<?php

//+++++++++++++++++++++++++++++++++++++++++
//ヘッダー整理
//jQuery
function load_script(){
wp_enqueue_script('jquery');
wp_enqueue_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js', array(), '2.2.3');
}
add_action('init', 'load_script');

remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'rest_output_link_wp_head');
remove_action( 'wp_head','wp_oembed_add_discovery_links');
remove_action( 'wp_head','wp_oembed_add_host_js');

add_filter( 'show_admin_bar', '__return_false' );
//+++++++++++++++++++++++++++++++++++++++++
//エディタ関連
function add_my_assets_to_block_editor() {
    wp_enqueue_style( 'my-gutenberg-style', get_stylesheet_directory_uri() . '/assets/css/my-gutenberg-style.css');
}
add_action( 'enqueue_block_editor_assets', 'add_my_assets_to_block_editor' );
//+++++++++++++++++++++++++++++++++++++++++
//アイキャッチサムネイル
add_theme_support('post-thumbnails');
add_image_size('size600',600,600,true);
//画像挿入時にドメイン部分を削除する
function del_domain_from_image_url( $url ) {
    if ( preg_match( '/^http(s)?:\/\/[^\/\s]+(.*)$/', $url, $match ) ) {
        $url = $match[2];
    }
    return $url;
}
add_filter( 'wp_get_attachment_url', 'del_domain_from_image_url' ); //画像取得時にドメイン部分を削除
add_filter( 'attachment_link', 'del_domain_from_image_url' );
//+++++++++++++++++++++++++++++++++++++++++
//固定ページ抜粋追加
add_post_type_support( 'page', 'excerpt' );
remove_filter( 'the_excerpt', 'wpautop' );
//+++++++++++++++++++++++++++++++++++++++++
//続きを読む
function change_excerpt_mblength($length) {
	return 100;
}
add_filter('excerpt_mblength', 'change_excerpt_mblength');
function new_excerpt_more($more) {
  return '…';
}
add_filter('excerpt_more', 'new_excerpt_more');
//+++++++++++++++++++++++++++++++++++++++++
//投稿変更
function Change_menulabel() {
	global $menu;
	global $submenu;
	$name = '新着情報';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name.'一覧';
	$submenu['edit.php'][10][0] = '新しい'.$name;
}
function Change_objectlabel() {
	global $wp_post_types;
	$name = '新着情報';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('追加', $name);
	$labels->add_new_item = $name.'の新規追加';
	$labels->edit_item = $name.'の編集';
	$labels->new_item = '新規'.$name;
	$labels->view_item = $name.'を表示';
	$labels->search_items = $name.'を検索';
	$labels->not_found = $name.'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );
//+++++++++++++++++++++++++++++++++++++++++
//カスタム投稿
add_action( 'init', 'create_post_type' );
function create_post_type() {
	//イベント
  register_post_type( 'exhi', /* post-type */
    array(
      'label' => 'イベント',
      'public' => true,
      'has_archive' => true,
      'menu_position' =>5,
      'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'excerpt' )
    )
  );
	//原料紹介
  register_post_type( 'material', /* post-type */
    array(
      'label' => '原料紹介',
      'public' => true,
      'has_archive' => true,
      'menu_position' =>5,
      'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'excerpt' )
    )
  );
}//END
//+++++++++++++++++++++++++++++++++++++++++
//ショートコードphpファイルの呼び出し
function my_php_Include($params = array()) {
 extract(shortcode_atts(array('file' => 'default'), $params));
	 ob_start();
	 include(STYLESHEETPATH . "/$file.php");
	 return ob_get_clean();
}
add_shortcode('myphp', 'my_php_Include');
//ショートコード固定ページ呼び出し
function get_page_shortcode( $atts ){
  $param = shortcode_atts(
    				array('slug' => ''),
						$atts
					);
	ob_start();
	$page_info = get_page_by_path( $param['slug'] );
	$page = get_post($page_info);
	ob_end_clean();
	return do_shortcode( $page->post_content );
	//return $page->post_content;
}
add_shortcode( 'custom_sc', 'get_page_shortcode' );
//+++++++++++++++++++++++++++++++++++++++++
//ショートコード：テーマ内画像呼び出し
function my_img_shortcode() {
    return get_template_directory_uri();
}
add_shortcode('img', 'my_img_shortcode');
//+++++++++++++++++++++++++++++++++++++++++
//WordPress の投稿スラッグを自動的に生成する
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );
//+++++++++++++++++++++++++++++++++++++++++
//ページャー
function my_pagination() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
  return;
echo '<div class="pager">';
echo paginate_links( array(
  'base'=> str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
  'format'=> '',
  'current'=> max( 1, get_query_var('paged') ),
  'total'=> $wp_query->max_num_pages,
  'prev_next' => false,
  'mid_size'=> 2
) );
echo '</div>';
}
//+++++++++++++++++++++++++++++++++++++++++
//表示数
function custom_parse_query( $query ) {
  if ( !is_admin() ) { // 管理画面は除く
    if ( get_query_var( 'post_type' ) == 'material' ) {
        $query->set( 'posts_per_page', -1 );
    }
  }
}
add_filter( 'parse_query', 'custom_parse_query' );
//+++++++++++++++++++++++++++++++++++++++++
//ターム名：リンクなし
function get_the_term_list_nolink( $id = 0, $taxonomy, $before = '', $sep = '', $after = '' ) {
 $terms = get_the_terms( $id, $taxonomy );
 if ( is_wp_error( $terms ) )
 return $terms;
 if ( empty( $terms ) )
 return false;
 foreach ( $terms as $term ) {
 $term_names[] = $term->name ;
 }
 return $before . join( $sep, $term_names ) . $after;
}
//+++++++++++++++++++++++++++++++++++++++++
// 編集エディターのデフォルトをテキストエディタで表示する
add_filter( 'wp_default_editor', create_function('', 'return "html";') );
//+++++++++++++++++++++++++++++++++++++++++
//1件目の記事取得
function isFirst(){
    global $wp_query;
    return ($wp_query->current_post === 0);
}
//+++++++++++++++++++++++++++++++++++++++++
//スマホ判別
function is_mobile(){
    $useragents = array(
		'iPhone',          // iPhone
		'iPod',            // iPod touch
		'Android',         // 1.5+ Android
		'dream',           // Pre 1.5 Android
		'CUPCAKE',         // 1.5+ Android
		'blackberry9500',  // Storm
		'blackberry9530',  // Storm
		'blackberry9520',  // Storm v2
		'blackberry9550',  // Storm v2
		'blackberry9800',  // Torch
		'webOS',           // Palm Pre Experimental
		'incognito',       // Other iPhone browser
		'webmate'          // Other iPhone browser
	);
	$pattern = '/'.implode('|', $useragents).'/i';
	return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

?>
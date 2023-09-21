<?php
/**
 * @package Nexgen Core
 */

function nxg_elementor_is_edit_mode() {

	if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
		return true;

	} else {
		return false;
	}
}

function nxg_get_post_types() {

	$nxg_post_types = array(
		'post'      => 'Post',
		'portfolio' => 'Portfolio',
		'page'      => 'Page',
		'product'   => 'Product',
	);

	return $nxg_post_types;
}

function nxg_get_orderby_options() {

	$orderby = array(
		'ID'            => 'Post ID',
		'author'        => 'Post Author',
		'title'         => 'Title',
		'date'          => 'Date',
		'modified'      => 'Last Modified Date',
		'parent'        => 'Parent Id',
		'rand'          => 'Random',
		'comment_count' => 'Comment Count',
		'menu_order'    => 'Menu Order',
	);

	return $orderby;
}

function nxg_get_categories( $post_type ) {

	if ( $post_type === 'portfolio' ) {
		
		$cat_args   = array( 'taxonomy' => 'nexgen-portfolio-category' );
		$categories = get_categories( $cat_args );

	} else {
		$categories = get_categories();
	}
	
	foreach ( $categories as $category ) {

		$id = esc_attr( $category->term_id );
		$cat[$id] = esc_html( $category->name );
	}
	
	if ( isset( $cat ) ) {
		return $cat;
	}
}

function nxg_get_line_icons() {

	return array(
		'user' => __( 'user', 'nexgen-core' ),
		'people' => __( 'people', 'nexgen-core' ),
		'user-female' => __( 'user-female', 'nexgen-core' ),
		'user-follow' => __( 'user-follow', 'nexgen-core' ),
		'user-following' => __( 'user-following', 'nexgen-core' ),
		'user-unfollow' => __( 'user-unfollow', 'nexgen-core' ),
		'login' => __( 'login', 'nexgen-core' ),
		'logout' => __( 'logout', 'nexgen-core' ),
		'emotsmile' => __( 'emotsmile', 'nexgen-core' ),
		'phone' => __( 'phone', 'nexgen-core' ),
		'call-end' => __( 'call-end', 'nexgen-core' ),
		'call-in' => __( 'call-in', 'nexgen-core' ),
		'call-out' => __( 'call-out', 'nexgen-core' ),
		'map' => __( 'map', 'nexgen-core' ),
		'location-pin' => __( 'location-pin', 'nexgen-core' ),
		'direction' => __( 'direction', 'nexgen-core' ),
		'directions' => __( 'directions', 'nexgen-core' ),
		'compass' => __( 'compass', 'nexgen-core' ),
		'layers' => __( 'layers', 'nexgen-core' ),
		'menu' => __( 'menu', 'nexgen-core' ),
		'list' => __( 'list', 'nexgen-core' ),
		'options-vertical' => __( 'options-vertical', 'nexgen-core' ),
		'options' => __( 'options', 'nexgen-core' ),
		'arrow-down' => __( 'arrow-down', 'nexgen-core' ),
		'arrow-left' => __( 'arrow-left', 'nexgen-core' ),
		'arrow-right' => __( 'arrow-right', 'nexgen-core' ),
		'arrow-up' => __( 'arrow-up', 'nexgen-core' ),
		'arrow-up-circle' => __( 'arrow-up-circle', 'nexgen-core' ),
		'arrow-left-circle' => __( 'arrow-left-circle', 'nexgen-core' ),
		'arrow-right-circle' => __( 'arrow-right-circle', 'nexgen-core' ),
		'arrow-down-circle' => __( 'arrow-down-circle', 'nexgen-core' ),
		'check' => __( 'check', 'nexgen-core' ),
		'clock' => __( 'clock', 'nexgen-core' ),
		'plus' => __( 'plus', 'nexgen-core' ),
		'minus' => __( 'minus', 'nexgen-core' ),
		'close' => __( 'close', 'nexgen-core' ),
		'event' => __( 'event', 'nexgen-core' ),
		'exclamation' => __( 'exclamation', 'nexgen-core' ),
		'organization' => __( 'organization', 'nexgen-core' ),
		'trophy' => __( 'trophy', 'nexgen-core' ),
		'screen-smartphone' => __( 'screen-smartphone', 'nexgen-core' ),
		'screen-desktop' => __( 'screen-desktop', 'nexgen-core' ),
		'plane' => __( 'plane', 'nexgen-core' ),
		'notebook' => __( 'notebook', 'nexgen-core' ),
		'mustache' => __( 'mustache', 'nexgen-core' ),
		'mouse' => __( 'mouse', 'nexgen-core' ),
		'magnet' => __( 'magnet', 'nexgen-core' ),
		'energy' => __( 'energy', 'nexgen-core' ),
		'disc' => __( 'disc', 'nexgen-core' ),
		'cursor' => __( 'cursor', 'nexgen-core' ),
		'cursor-move' => __( 'cursor-move', 'nexgen-core' ),
		'crop' => __( 'crop', 'nexgen-core' ),
		'chemistry' => __( 'chemistry', 'nexgen-core' ),
		'speedometer' => __( 'speedometer', 'nexgen-core' ),
		'shield' => __( 'shield', 'nexgen-core' ),
		'screen-tablet' => __( 'screen-tablet', 'nexgen-core' ),
		'magic-wand' => __( 'magic-wand', 'nexgen-core' ),
		'hourglass' => __( 'hourglass', 'nexgen-core' ),
		'graduation' => __( 'graduation', 'nexgen-core' ),
		'ghost' => __( 'ghost', 'nexgen-core' ),
		'game-controller' => __( 'game-controller', 'nexgen-core' ),
		'fire' => __( 'fire', 'nexgen-core' ),
		'eyeglass' => __( 'eyeglass', 'nexgen-core' ),
		'envelope-open' => __( 'envelope-open', 'nexgen-core' ),
		'envelope-letter' => __( 'envelope-letter', 'nexgen-core' ),
		'bell' => __( 'bell', 'nexgen-core' ),
		'badge' => __( 'badge', 'nexgen-core' ),
		'anchor' => __( 'anchor', 'nexgen-core' ),
		'wallet' => __( 'wallet', 'nexgen-core' ),
		'vector' => __( 'vector', 'nexgen-core' ),
		'speech' => __( 'speech', 'nexgen-core' ),
		'puzzle' => __( 'puzzle', 'nexgen-core' ),
		'printer' => __( 'printer', 'nexgen-core' ),
		'present' => __( 'present', 'nexgen-core' ),
		'playlist' => __( 'playlist', 'nexgen-core' ),
		'pin' => __( 'pin', 'nexgen-core' ),
		'picture' => __( 'picture', 'nexgen-core' ),
		'handbag' => __( 'handbag', 'nexgen-core' ),
		'globe-alt' => __( 'globe-alt', 'nexgen-core' ),
		'globe' => __( 'globe', 'nexgen-core' ),
		'folder-alt' => __( 'folder-alt', 'nexgen-core' ),
		'folder' => __( 'folder', 'nexgen-core' ),
		'film' => __( 'film', 'nexgen-core' ),
		'feed' => __( 'feed', 'nexgen-core' ),
		'drop' => __( 'drop', 'nexgen-core' ),
		'drawer' => __( 'drawer', 'nexgen-core' ),
		'docs' => __( 'docs', 'nexgen-core' ),
		'doc' => __( 'doc', 'nexgen-core' ),
		'diamond' => __( 'diamond', 'nexgen-core' ),
		'cup' => __( 'cup', 'nexgen-core' ),
		'calculator' => __( 'calculator', 'nexgen-core' ),
		'bubbles' => __( 'bubbles', 'nexgen-core' ),
		'briefcase' => __( 'briefcase', 'nexgen-core' ),
		'book-open' => __( 'book-open', 'nexgen-core' ),
		'basket-loaded' => __( 'basket-loaded', 'nexgen-core' ),
		'basket' => __( 'basket', 'nexgen-core' ),
		'bag' => __( 'bag', 'nexgen-core' ),
		'action-undo' => __( 'action-undo', 'nexgen-core' ),
		'action-redo' => __( 'action-redo', 'nexgen-core' ),
		'wrench' => __( 'wrench', 'nexgen-core' ),
		'umbrella' => __( 'umbrella', 'nexgen-core' ),
		'trash' => __( 'trash', 'nexgen-core' ),
		'tag' => __( 'tag', 'nexgen-core' ),
		'support' => __( 'support', 'nexgen-core' ),
		'frame' => __( 'frame', 'nexgen-core' ),
		'size-fullscreen' => __( 'size-fullscreen', 'nexgen-core' ),
		'size-actual' => __( 'size-actual', 'nexgen-core' ),
		'shuffle' => __( 'shuffle', 'nexgen-core' ),
		'share-alt' => __( 'share-alt', 'nexgen-core' ),
		'share' => __( 'share', 'nexgen-core' ),
		'rocket' => __( 'rocket', 'nexgen-core' ),
		'question' => __( 'question', 'nexgen-core' ),
		'pie-chart' => __( 'pie-chart', 'nexgen-core' ),
		'pencil' => __( 'pencil', 'nexgen-core' ),
		'note' => __( 'note', 'nexgen-core' ),
		'loop' => __( 'loop', 'nexgen-core' ),
		'home' => __( 'home', 'nexgen-core' ),
		'grid' => __( 'grid', 'nexgen-core' ),
		'graph' => __( 'graph', 'nexgen-core' ),
		'microphone' => __( 'microphone', 'nexgen-core' ),
		'music-tone-alt' => __( 'music-tone-alt', 'nexgen-core' ),
		'music-tone' => __( 'music-tone', 'nexgen-core' ),
		'earphones-alt' => __( 'earphones-alt', 'nexgen-core' ),
		'earphones' => __( 'earphones', 'nexgen-core' ),
		'equalizer' => __( 'equalizer', 'nexgen-core' ),
		'like' => __( 'like', 'nexgen-core' ),
		'dislike' => __( 'dislike', 'nexgen-core' ),
		'control-start' => __( 'control-start', 'nexgen-core' ),
		'control-rewind' => __( 'control-rewind', 'nexgen-core' ),
		'control-play' => __( 'control-play', 'nexgen-core' ),
		'control-pause' => __( 'control-pause', 'nexgen-core' ),
		'control-forward' => __( 'control-forward', 'nexgen-core' ),
		'control-end' => __( 'control-end', 'nexgen-core' ),
		'volume-1' => __( 'volume-1', 'nexgen-core' ),
		'volume-2' => __( 'volume-2', 'nexgen-core' ),
		'volume-off' => __( 'volume-off', 'nexgen-core' ),
		'calendar' => __( 'calendar', 'nexgen-core' ),
		'bulb' => __( 'bulb', 'nexgen-core' ),
		'chart' => __( 'chart', 'nexgen-core' ),
		'ban' => __( 'ban', 'nexgen-core' ),
		'bubble' => __( 'bubble', 'nexgen-core' ),
		'camrecorder' => __( 'camrecorder', 'nexgen-core' ),
		'camera' => __( 'camera', 'nexgen-core' ),
		'cloud-download' => __( 'cloud-download', 'nexgen-core' ),
		'cloud-upload' => __( 'cloud-upload', 'nexgen-core' ),
		'envelope' => __( 'envelope', 'nexgen-core' ),
		'eye' => __( 'eye', 'nexgen-core' ),
		'flag' => __( 'flag', 'nexgen-core' ),
		'heart' => __( 'heart', 'nexgen-core' ),
		'info' => __( 'info', 'nexgen-core' ),
		'key' => __( 'key', 'nexgen-core' ),
		'link' => __( 'link', 'nexgen-core' ),
		'lock' => __( 'lock', 'nexgen-core' ),
		'lock-open' => __( 'lock-open', 'nexgen-core' ),
		'magnifier' => __( 'magnifier', 'nexgen-core' ),
		'magnifier-add' => __( 'magnifier-add', 'nexgen-core' ),
		'magnifier-remove' => __( 'magnifier-remove', 'nexgen-core' ),
		'paper-clip' => __( 'paper-clip', 'nexgen-core' ),
		'paper-plane' => __( 'paper-plane', 'nexgen-core' ),
		'power' => __( 'power', 'nexgen-core' ),
		'refresh' => __( 'refresh', 'nexgen-core' ),
		'reload' => __( 'reload', 'nexgen-core' ),
		'settings' => __( 'settings', 'nexgen-core' ),
		'star' => __( 'star', 'nexgen-core' ),
		'symbol-female' => __( 'symbol-female', 'nexgen-core' ),
		'symbol-male' => __( 'symbol-male', 'nexgen-core' ),
		'target' => __( 'target', 'nexgen-core' ),
		'credit-card' => __( 'credit-card', 'nexgen-core' ),
		'paypal' => __( 'paypal', 'nexgen-core' ),
		'social-tumblr' => __( 'social-tumblr', 'nexgen-core' ),
		'social-twitter' => __( 'social-twitter', 'nexgen-core' ),
		'social-facebook' => __( 'social-facebook', 'nexgen-core' ),
		'social-instagram' => __( 'social-instagram', 'nexgen-core' ),
		'social-linkedin' => __( 'social-linkedin', 'nexgen-core' ),
		'social-pinterest' => __( 'social-pinterest', 'nexgen-core' ),
		'social-github' => __( 'social-github', 'nexgen-core' ),
		'social-google' => __( 'social-google', 'nexgen-core' ),
		'social-reddit' => __( 'social-reddit', 'nexgen-core' ),
		'social-skype' => __( 'social-skype', 'nexgen-core' ),
		'social-dribbble' => __( 'social-dribbble', 'nexgen-core' ),
		'social-behance' => __( 'social-behance', 'nexgen-core' ),
		'social-foursqare' => __( 'social-foursqare', 'nexgen-core' ),
		'social-soundcloud' => __( 'social-soundcloud', 'nexgen-core' ),
		'social-spotify' => __( 'social-spotify', 'nexgen-core' ),
		'social-stumbleupon' => __( 'social-stumbleupon', 'nexgen-core' ),
		'social-youtube' => __( 'social-youtube', 'nexgen-core' ),
		'social-dropbox' => __( 'social-dropbox', 'nexgen-core' ),
		'social-vkontakte' => __( 'social-vkontakte', 'nexgen-core' ),
		'social-steam' => __( 'social-steam', 'nexgen-core' ),
	);
}
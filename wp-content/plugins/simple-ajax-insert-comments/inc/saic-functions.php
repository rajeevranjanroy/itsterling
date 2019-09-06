<?php

/* --------------------------------------------------------------------
   Función que Inserta el Enlace para Mostrar y Ocultar Comentarios
-------------------------------------------------------------------- */

add_shortcode('simple-comments', 'display_saic');
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode', 11);

function display_saic($atts = '') {
	global $post, $user_ID, $user_email;
	$options = get_option('saic_options');
	$icon_link = $options['icon-link'];
	$width_comments = (int) $options['width_comments'];
	$only_registered = isset($options['only_registered']) ? $options['only_registered'] : false;
	$text_link = 'Show Comments';
	
	//Shortcode Attributes
	extract(shortcode_atts(array(
		'post_id' => $post->ID,
		'get' => (int) $options['num_comments'],
		'style' => $style = $options['theme'],
		'border' => isset($options['border']) ? $options['border'] : 'true',
		'form' => $options['display_form']
    ), $atts));
		
	$num = get_comments_number($post_id);//Solo comentarios aprovados
	
	switch($num){
		case 0:
			$text_link = str_replace('#N#','<span>'.$num.'</span>',$options['text_0_comments']);
			$title_link = str_replace('#N#',$num,$options['text_0_comments']);
			break;
		case 1:
			$text_link = str_replace('#N#','<span>'.$num.'</span>',$options['text_1_comment']);
			$title_link = str_replace('#N#',$num,$options['text_1_comment']);
			break;
		default:
			$text_link = str_replace('#N#','<span>'.$num.'</span>',$options['text_more_comments']);
			$title_link = str_replace('#N#',$num,$options['text_1_comment']);
			break;
	}
	
	$data = "<div class='saic-wrapper saic-{$style}";
	if( $border == 'true' ) $data.= " saic-border";
	$data .= "' style='overflow: hidden;";
	if( $width_comments ) $data.= " width: {$width_comments}px; ";
	$data .= "'>";
		
		// ENLACE DE MOSTRAR COMENTARIOS
		$data .= "<div class='saic-wrap-link'>";
			$data .= "<div class='saic-style-link'>";
				$data .="<a id='saic-link-{$post_id}' class='saic-link saic-icon-link saic-icon-link-{$icon_link}' href='?post_id={$post_id}&amp;comments={$num}&amp;get={$get}' title='{$title_link}'>{$text_link}</a>";
			$data .= "</div><!--.saic-style-link-->";
		$data .= "</div><!--.saic-wrap-link-->";
		
		// CONTENEDOR DE LOS COMENTARIOS
		$data .= "<div id='saic-wrap-commnent-{$post_id}' class='saic-wrap-comments' style='display:none;'>";
		if ( post_password_required() ) { 
			$data .= '<p style="padding: 8px 15px;">This post is password protected. Enter the password to view comments</p>';
		} else {
			if(comments_open($post_id) && $form == 'true'){
				$data .= "<div id='saic-wrap-form-{$post_id}' class='saic-wrap-form";
				if( !is_user_logged_in() ) $data.= " saic-no-login";
				$data .= "'>";
					$data .= "<div class='saic-current-user-avatar'>";
						$data .= get_avatar($user_email, $size= '28');
					$data .= "</div>";
					$data .= "<div id='saic-container-form-{$post_id}' class='saic-container-form saic-clearfix'>";
					if( $only_registered == 'true' && !is_user_logged_in() ){
						$data .= "<p>{$options['text_only_registered']} ".sprintf(__("Please %s login %s to comment", 'SAIC' ),"<a href='".wp_login_url(get_permalink())."'>","</a>")."</p>";
					} else {
						
						//Formulario
						$data .= get_comment_form_SAIC($post_id);
					}
					$data .= "</div><!--.saic-container-form-->";
				$data .= "</div><!--.saic-wrap-form-->";
				
			} // end if comments_open
			$data .= "<div id='saic-comment-status-{$post_id}'  class='saic-comment-status'></div>";
			$data .= "<ul id='saic-container-comment-{$post_id}' class='saic-container-comments'></ul>";
			$data .= "<div class='saic-holder-{$post_id} saic-holder'></div>";
			
		} // end if post_password_required
		
		$data .= "</div><!--.saic-wrap-comments-->";
		
	$data .= "</div><!--.saic-wrapper-->";
	
	return $data;
}


/* --------------------------------------------------------------------
   Función para extraer el formulario de comentarios
-------------------------------------------------------------------- */
function get_comment_form_SAIC($post_id = null) {
	global $id;
	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;
	$options = get_option('saic_options');
	// Captcha
	$captcha = '';
	if($options['display_captcha'] == 'all' || ( $options['display_captcha'] == 'non-registered') && !is_user_logged_in() ){
		$captcha .= "<div class='saic-captcha' id='saic-captcha-{$post_id}'>";
			$captcha .= "<span class='saic-captcha-text'></span>";
			$captcha .= "<input type='text' maxlength='2' id='saic-captcha-value-{$post_id}' class='saic-captcha-value saic-input'/>";
		$captcha .= "</div><!--.saic-captcha-->";
	} else {
		$captcha .= "<div style='padding-top:10px;'></div>";
	}
	// Media Buttons
	$media_btns = '';
	$email_field = '<p class="comment-form-email"><input name="email" value="anonymous@wordpress.com" type="hidden" class="saic-input" placeholder="e-mail" /></p>';
	$website_field = '';
	if($options['display_media_btns'] == 'true'){
		$media_btns = '<div class="saic-media-btns"><a class="saic-modal-btn" id="saic-modal-image" href="?post_id='.$post_id.'&amp;action=image" title="Insert image">image</a><a class="saic-modal-btn" id="saic-modal-video" href="?post_id='.$post_id.'&amp;action=video" title="Insert video">video</a><a class="saic-modal-btn saic-last" id="saic-modal-url" href="?post_id='.$post_id.'&amp;action=url" title="Insert link">link</a></div>';
	}
	if($options['display_email'] == 'true'){
		$email_field = '<p class="comment-form-email"><input id="email" name="email" type="text" aria-required="true" class="saic-input" placeholder="e-mail" /><span class="saic-required">*</span><span class="saic-error-info saic-error-info-email">The entered E-mail is invalid.</span></p>';
	}
	if($options['display_website'] == 'true'){
		$website_field = '<p class="comment-form-url"><input id="url" name="url" type="text" value="" placeholder="Website"  /></p>';
	}
	
	$fields =  array(
		'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" aria-required="true" class="saic-input" placeholder="Name" /><span class="saic-required">*</span><span class="saic-error-info saic-error-info-name">Enter your name</span></p>',
		'email'  => $email_field,
		'url'    => $website_field,
	);
	$args = array(
		'title_reply'=> '',
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'logged_in_as' => '',
		'id_form' => 'commentform-'.$post_id,
		'id_submit' => 'submit-'.$post_id,
		'label_submit' => 'Send',
		'fields' => apply_filters( 'comment_form_default_fields', $fields),
		'comment_field' => '<div class="saic-wrap-textarea"><textarea id="saic-textarea-'.$post_id.'" class="waci_comment saic-textarea autosize-textarea" name="comment" aria-required="true" placeholder="Write comment"></textarea><span class="saic-required">*</span><span class="saic-error-info saic-error-info-text">'.__('2 characters minimum', 'SAIC').'.</span>'.$media_btns.$captcha.'</div>'
	);
	$form = "";
	$form = "<div id='respond-{$post_id}' class='respond clearfix'>";
		$form .= "<form action='".site_url( '/wp-comments-post.php' )."' method='post' id='".$args['id_form']."'>";
			if ( !is_user_logged_in() ) {
				foreach ( (array) $args['fields'] as $name => $field ) {
					$form.= apply_filters( "comment_form_field_{$name}", $field );
				}
			}
			$form.= $args['comment_field'];
			$form.= "<p class='form-submit'>";
				//Prueba para evitar Spam
				$form .= '<span class="saic-hide">'.__( "Do not change these fields following", "SAIC" ).'</span><input type="text" class="saic-hide" name="name" value="saic"><input type="text" class="saic-hide" name="nombre" value=""><input type="text" class="saic-hide" name="form-saic" value="">';
			
				$form.= "<input name='submit' id='".$args['id_submit']."' value='".$args['label_submit']."' type='submit' />";
				$form .= get_comment_id_fields( $post_id );
			$form .= "</p>";
			if ( current_user_can( 'unfiltered_html' ) ) {
				$form .= wp_nonce_field( 'unfiltered-html-comment_' . $post_id,'_wp_unfiltered_html_comment', false, false );
				/*$form .= "<script>(function(){if(window===window.parent){document.getElementById('_wp_unfiltered_html_comment_disabled').name='_wp_unfiltered_html_comment';}})();</script>\n";*/
			}
		$form .= "</form>";
	$form .= "<div class='clear'></div></div>";
	return $form;
}
/* --------------------------------------------------------------------
   Función para evitar Spam
-------------------------------------------------------------------- */
add_action('pre_comment_on_post', 'remove_spam_SAIC');
function remove_spam_SAIC($comment_post_ID){
	// Si el comentario se ha enviado desde este plugin
	if(isset($_POST['form-saic'])){
		// Si los campos ocultos no se han modificado
		if($_POST['name'] != 'saic' || $_POST['nombre'] != ''){
			wp_die( __('<strong>ERROR</strong>: Your comment has been detected as Spam!') );
		}
	}
}


/* --------------------------------------------------------------------
   Función que Inserta un Nuevo Cometario
-------------------------------------------------------------------- */
add_action('comment_post', 'ajax_comment_SAIC', 20, 2);
function ajax_comment_SAIC($comment_ID, $comment_status){
	// Si el comentario se ejecutó con AJAX
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		//Comprobamos el estado del comentario
		switch($comment_status){
			//Si el comentario no está aprobado 'hold = 0'
			case "0":
				//Notificamos al moderador
				if( get_option('comments_notify') == 1 ){
					wp_notify_moderator($comment_ID);
				}
				
			//Si el comentario está aprobado 'approved = 1'
			case "1":
				// Obtenemos los datos del comentario
				$comment = get_comment($comment_ID);
				//Obtenemos HTML del nuevo comentario
				ob_start(); // Activa almacenamiento en bufer 
				$args = array();
				$depth = 0;
				get_comment_HTML_SAIC($comment,$args, $depth);
				$commentData =  ob_get_clean();// Obtiene el contenido del búfer actual y elimina el búfer de salida actual.
				
				//Notificamos al autor del post de un nuevo comentario
				//get_option('moderation_notify');
				if( get_option('comments_notify') == 1 ){
					wp_notify_postauthor($comment_ID, $comment->comment_type);
				}
				echo $commentData;
				break;
			default:
				echo "error";
		}
	exit;
	}
}
/* --------------------------------------------------------------------
   Función que obtiene Comentarios
-------------------------------------------------------------------- */
add_action('wp_ajax_get_comments', 'get_comments_SAIC');
add_action('wp_ajax_nopriv_get_comments', 'get_comments_SAIC');

function get_comments_SAIC(){
	global $post, $id;
	$nonce = $_POST['nonce'];
    if (!wp_verify_nonce($nonce, 'saic-nonce')){
		die ( 'Busted!');
	}
	$options = get_option('saic_options');
	$post_id = (int) isset($_POST['post_id']) ? $_POST['post_id']: $post->ID;
	$get = (int) isset($_POST['get']) ? $_POST['get'] : $options['num_comments'];
	$post = get_post($post_id);
	$numComments = $post->comment_count;
	$authordata = get_userdata($post->post_author);
	$orderComments = $options['order_comments'];
	$default_order = get_option('comment_order');
	
	
	if($orderComments == 'likes'){
		//Asignamos Campo Personalizado 'saic-likes_count' a todos los comentarios
		foreach (get_comments('post_id='.$post_id) as $comment){
			$comment_id = $comment->comment_ID;
			$likes_count = get_comment_meta($comment_id, 'saic-likes_count', true);
			update_comment_meta($comment_id, 'saic-likes_count', $likes_count);
		}
		$comments_args = array(
			'post_id' => $post_id,
			'number' => $get,//Número Máximo de Comentarios a Cargar
			'meta_key' => 'saic-likes_count',
			'order' => 'DESC',//Orden de los Comentarios
			'orderby' => 'meta_value_num',
			'status' => 'approve',//Solo Comentarios Aprobados
		);
	} else {
		$offset = 0;
		if( ($default_order == 'desc' && $orderComments == 'DESC') ||
			($default_order == 'asc' && $orderComments == 'ASC') ){
				$offset = $numComments - $get;
		}
		
		if($default_order == 'desc' && $orderComments == 'DESC'){
			$orderComments = 'ASC';
			$offset = $numComments - $get;
		}
		else if($default_order == 'desc' && $orderComments == 'ASC'){
			$orderComments = 'DESC';
		}
		//Fix Offset
		if($offset < 0)
			$offset = 0;
			
		$comments_args = array(
			'post_id' => $post_id,
			'number' => $get,//Número Máximo de Comentarios a Cargar
			'order' => $orderComments,//Orden de los Comentarios
			'orderby' => 'comment_date',//Orden de los Comentarios
			'offset' => $offset,//Desplazamiento desde el último comentario
			'status' => 'approve',//Solo Comentarios Aprobados
		);
	}
	
	$comments = get_comments($comments_args);
	
	ob_start(); // Activa almacenamiento en bufer 
	
	//Display the list of comments
	wp_list_comments(array(
		'callback'=> 'get_comment_HTML_SAIC'
	), $comments);
	
	// Obtiene el contenido del búfer actual y elimina el búfer de salida actual.
	
	$listComment =  ob_get_clean();
	
	echo $listComment;
	
	die(); // this is required to return a proper result
	
}

/* --------------------------------------------------------------------
   Función que extrae HTML de un Comentario
-------------------------------------------------------------------- */
function get_comment_HTML_SAIC($comment,$args, $depth){
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	$commentPostID = $comment->comment_post_ID;
	$commentContent = convert_smilies($comment->comment_content);
	$commentID = $comment->comment_ID;
	$commentDate = $comment->comment_date;
	$autorID = $comment->user_id;
	$autorEmail = $comment->comment_author_email;
	$autorName = $comment->comment_author;
	$autorUrl = $comment->comment_author_url;
	$userFirstName = get_user_meta( $autorID, 'first_name', true);
	if($userFirstName) $autorName = $userFirstName;
	
	$options = get_option('saic_options');
	$date_format = $options['date_format'];
	$rating_btns = $options['display_rating_btns'];
	?>
	<li <?php comment_class('saic-item-comment'); ?> id="saic-item-comment-<?php comment_ID(); ?>">
    	<div id="saic-comment-<?php comment_ID(); ?>" class="saic-comment">
            <div class="saic-comment-left">
                <div class="saic-comment-avatar">
                    <?php echo get_avatar($autorEmail, $size= '28');?>
                </div><!--.saic-comment-avatar-->
            </div><!--.saic-comment-left-->
            <div class="saic-comment-right">
                <div class="saic-comment-content">
                    <div class="saic-comment-info">
                        <a href="<?php echo comment_author_link_SAIC($autorName, $autorUrl);?>" class="saic-commenter-name" title="<?php echo $autorName;?>"><?php echo $autorName;?></a><span class="saic-comment-time"> <?php if($date_format == 'date_fb') { echo get_time_since_SAIC($commentDate);} else echo get_comment_date('m/j/Y', $commentID);?></span><a href="?comment_id=<?php comment_ID();?>&amp;post_id=<?php echo $commentPostID;?>" class="saic-reply-link" id="saic-reply-link-<?php comment_ID();?>">Reply</a>
                    </div><!--.saic-comment-info-->
                    <div class="saic-comment-text">
                        <span class="saic-comment-text"><?php echo $commentContent;?></span>
                    </div><!--.saic-comment-text-->
                    <?php 
					if($rating_btns == 'true'){
						comment_rating_content_SAIC($commentID);
					}
					?>
                </div><!--.saic-comment-content-->
                
            </div><!--.saic-comment-right-->
        
        </div><!--.saic-comment-->
        	
		<!--</li>-->
       
	<?php
}

/* --------------------------------------------------------------------
   Función que retorna el link que un usuario escribió en los comentarios
-------------------------------------------------------------------- */
function comment_author_link_SAIC($autorName = '1', $autorUrl = '#'){
	if ( username_exists( $autorName ) ){
		$user_link = $autorUrl;
		if(is_bp_active_SAIC()){
			$user = get_user_by('login',$autorName);
			$user_link = bp_core_get_user_domain($user->ID);
		}
	} else {
		$user_link = $autorUrl;
	}
	return $user_link;
}

/* --------------------------------------------------------------------
   Función que comprueba si Buddypress está activo
-------------------------------------------------------------------- */
function is_bp_active_SAIC(){
	if(class_exists( 'BuddyPress' ))
		return true;
	else
		return false;
}

/* --------------------------------------------------------------------
   Función para insertar automaticamente el Plugín
-------------------------------------------------------------------- */
$options = get_option('saic_options');
if($options['auto_show'] == 'true') {
	function auto_show_SAIC($content) {
		$content = $content.display_saic();
    	return $content;
	}
	add_filter('the_content','auto_show_SAIC');
}

/* --------------------------------------------------------------------
   Función que Verifica si una URL de un video de YouTube o Vimeo es válido y retorna el Video
-------------------------------------------------------------------- */

add_action('wp_ajax_verificar_video_SAIC', 'verificar_video_SAIC');
add_action('wp_ajax_nopriv_verificar_video_SAIC', 'verificar_video_SAIC');

function verificar_video_SAIC(){
	if ( isset($_POST['url_video']) && trim($_POST['url_video']) != ''){
		$video_player = '';
		$post_url_video = trim($_POST['url_video']);
		$tipo_video = get_tipo_video_SAIC($post_url_video);
		$id_video = get_id_video_SAIC($post_url_video,$tipo_video);
		if($id_video != 'error url' && $id_video != 'error url youtube' && $id_video != 'error url vimeo'){
			$video_player = get_embed_video_SAIC($id_video,$tipo_video,540,250);
		}
		else {
			$id_video = 'error id video';
		}
	}
	else {
		$post_url_video = '';
	}
	/* Si no hay URL o la URL es inválida */
	if($post_url_video == '' || $id_video == 'error id video'){
		$response = 'error';
	} else {
		$response = $video_player;
	}
		
	echo $response;
	exit;
}
/* --------------------------------------------------------------------
   Función que Devuelve el Tipo de Video desde una URL
-------------------------------------------------------------------- */
function get_tipo_video_SAIC($url_video){
	$is_youtube_url = '/^(?:https?:\/\/)?(?:www\.)?(youtube\.com\/|youtu\.be\/)/';
	$is_vimeo_url = '/^(?:https?:\/\/)?(?:www\.)?(vimeo\.com\/)/';
	if( preg_match($is_youtube_url,$url_video) ){		return "youtube";}
	else if( preg_match($is_vimeo_url,$url_video) ) {	return "vimeo";}
	else {										return "desconocido";}
}

/* --------------------------------------------------------------------
   Función que Devuelve el Id de un Video de YouTube o Vimeo
-------------------------------------------------------------------- */
function get_id_video_SAIC($url_video, $tipo_video){
	$id_video = '';
	$filter_youtube = '/^.*(youtu.be\/|v\/|\/u\/\w\/|embed\/|watch\?)\??v?=?([^#\&\?]*).*/';
	$filter_vimeo = '/^.*(vimeo\.com\/|groups\/[A-z]+\/videos\/|channels\/staffpicks\/)(\d+)$/';
	switch($tipo_video){
		case "youtube":
			$is_valid_url = preg_match($filter_youtube, $url_video, $url_array);
			if ($is_valid_url && strlen($url_array[2]) == 11 ){
				$id_video = $url_array[2];
				return $id_video;
			}
			else { return "error url youtube";}
			break;
		case "vimeo":
			$is_valid_url = preg_match($filter_vimeo, $url_video, $url_array);
			if ( $is_valid_url ){
				$id_video = $url_array[2];
				return $id_video;
			}
			else { return "error url vimeo";}
			break;
		default:
			return "error url";
			break;
	}
}

/* --------------------------------------------------------------------
   Función que Retorna el Reproductor de un Video de Youtube o Vimeo
-------------------------------------------------------------------- */
function get_embed_video_SAIC($id_video,$tipo_video,$width=610,$height=280,$autoplay=0){
	$video_player = '';
	if($tipo_video == 'youtube'){
		$video_player = '<iframe class="ytplayer" type="text/html" width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$id_video.'?autoplay='.$autoplay.'" allowfullscreen frameborder="0">
</iframe>';
	}
	elseif($tipo_video == 'vimeo'){
		$video_player	= '<iframe width="'.$width.'" height="'.$height.'"  src="http://player.vimeo.com/video/'.$id_video.'?title=0&amp;autoplay='.$autoplay.'&amp;byline=0&amp;portrait=0&amp;color=3D95D3" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';
		
	}
	return $video_player;
}


/* --------------------------------------------------------------------
   Función que permite más tags HTML en los comentarios
-------------------------------------------------------------------- */
//add_action('comment_post', 'more_tags_html_SAIC');
add_filter('preprocess_comment','more_tags_html_SAIC');
function more_tags_html_SAIC($data) {
	global $allowedtags;
	$allowedtags['p'] = array();
	$allowedtags["img"] = array(
		"src" => array(),
		"height" => array(),
		"width" => array(),
		"alt" => array(),
		"title" => array(),
	);
	$allowedtags["iframe"] = array(
		"src" => array(),
		"height" => array(),
		"width" => array(),
		"class" => array(),
		"type" => array(),
		"frameborder" => array(),
	);
	$allowedtags["object"] = array(
		"height" => array(),
		"width" => array()
	);
	$allowedtags["param"] = array(
		"name" => array(),
		"value" => array()
	);
	$allowedtags["embed"] = array(
		"src" => array(),
		"type" => array(),
		"allowfullscreen" => array(),
		"allowscriptaccess" => array(),
		"height" => array(),
		"width" => array()
	);
	return $data;
}

/* --------------------------------------------------------------------
   Contenido para Calificar Comentarios
-------------------------------------------------------------------- */
function comment_rating_content_SAIC($comment_id = 0){
	$options = get_option('saic_options');
	$likes_count = (int) get_comment_meta($comment_id, 'saic-likes_count', true);
	$likes_class = 'saic-rating-neutral';
	
	if($likes_count < 0){
		$likes_class = 'saic-rating-negative';
	}
	else if($likes_count > 0){
		$likes_class = 'saic-rating-positive';
	}
	?>
	<div class="saic-comment-rating">
        <a class="saic-rating-link saic-rating-like" href="?comment_id=<?php echo $comment_id;?>&amp;method=like" title="Like"></a>
        <span title="Likes" class="saic-rating-count <?php echo $likes_class?>"><?php echo $likes_count;?></span>
        <a class="saic-rating-link saic-rating-dislike" href="?comment_id=<?php echo $comment_id;?>&amp;method=dislike" title="Unlike"></a>
	</div><!--.saic-comment-rating-->
	<?php
}

/* --------------------------------------------------------------------
   Recibe la acción desde jQuery Ajax para Votar un Comentario
-------------------------------------------------------------------- */
add_action('wp_ajax_comment_rating', 'comment_rating_process_SAIC');
add_action('wp_ajax_nopriv_comment_rating', 'comment_rating_process_SAIC');

function comment_rating_process_SAIC() {
	$nonce = $_POST['nonce'];
    if (!wp_verify_nonce($nonce, 'saic-nonce')){
		die ( 'Busted rated!');
	}
	
	if(isset($_POST['comment_id']) && is_numeric($_POST['comment_id'])) {
		$comment_id = (int)$_POST['comment_id'];
		$action = $_POST['method'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$current_user = wp_get_current_user();
		$user_id = (int) $current_user->ID;
		$can_vote = false;
		$success = false;
		$voted_IP = checkVotedIP_SAIC($comment_id, $ip);
		$voted_user = checkVotedUser_SAIC($comment_id, $user_id);
		$voted_action = checkVotedAction_SAIC($comment_id, $ip, $action);
		
		//Si la IP actual ya votó
		if($voted_IP){
			//Comprobamos que la acción actual es contraria "like/dislike"
			if(!$voted_action) {
				$can_vote = true;
			}
			//si la IP ya fue registrada, pero se trata de otro usuario
			else if(!$voted_user && is_user_logged_in()){
				$can_vote = true;
			}
		}
		//si nunca a votado
		else {
			$can_vote = true;
		}
		if($can_vote) {
			//se procede a realizar la votación
			makeTheVote_SAIC($comment_id, $ip, $current_user, $action);
		} else {
			$likes_count = get_comment_meta($comment_id, 'saic-likes_count', true);
			
			$result = array(
				'success' => $success,
				'likes' => $likes_count,
				'message' => ''
			);
			echo json_encode($result);
		}	
	}
	exit;
}
/* --------------------------------------------------------------------
   Función que realiza un Post Like a un Post
-------------------------------------------------------------------- */
function makeTheVote_SAIC($comment_id, $ip, $current_user, $action){
	$user_id = (int) $current_user->ID;
	$user_name = $current_user->user_login;
	
	$likes_count = get_comment_meta($comment_id, 'saic-likes_count', true);
	$likes_IP = getVotedIP_SAIC($comment_id);
	$likes_action = getVotedIP_SAIC($comment_id);
	$likes_IP[$ip] = time();
	$likes_action[$ip] = $action;
	
	
	//Actualizamos 'Likes por IP y Acción' del comentario
	update_comment_meta($comment_id, 'saic-likes_IP', $likes_IP);
	update_comment_meta($comment_id, 'saic-likes_action', $likes_action);
	
	// Si la acción de Like
	if($action == 'like') {
		//Sumamos un 'Like' al comentario
		update_comment_meta($comment_id, 'saic-likes_count', ++$likes_count);
		
		//Actualizamos 'saic-likes_comment' del Usuario
		$likes_comment = getCommentLikeUser_SAIC();
		$likes_comment = array_diff($likes_comment, array($comment_id));
		$likes_comment = array_values($likes_comment);
		$likes_comment[] = $comment_id;
		update_user_meta($user_id, 'saic-likes_comment', $likes_comment);
	}
		
	else {
		//Restamos un 'Like' al comentario
		update_comment_meta($comment_id, 'saic-likes_count', --$likes_count);
		
		//Actualizamos 'saic-dislikes_comment' del Usuario
		$dislikes_comment = getCommentDislikeUser_SAIC();
		$dislikes_comment = array_diff($dislikes_comment, array($comment_id));
		$dislikes_comment = array_values($dislikes_comment);
		$dislikes_comment[] = $comment_id;
		update_user_meta($user_id, 'saic-dislikes_comment', $dislikes_comment);
		
	}
	//Mostramos el resultado
	$success = true;
	$result = array(
		'success' => $success,
		'likes' => $likes_count,
		'message' => ''
	);
	echo json_encode($result);
}

/* --------------------------------------------------------------------
   Función que comprueba si un Usuario ya ha votado
-------------------------------------------------------------------- */
function checkVotedUser_SAIC($comment_id, $user_id = '') {
	$likes_comment = getCommentLikeUser_SAIC();
	if(!empty($user_id)) {
		$likes_comment = getCommentLikeUser_SAIC($user_id);
	}
	if( in_array($comment_id, array_values($likes_comment)) ){
		return true;
	}
	return false;
	
}
/* --------------------------------------------------------------------
   Función que obtiene el Campo Personalizado 'saic-likes_comment' de un Usuario
-------------------------------------------------------------------- */
function getCommentLikeUser_SAIC($user_id = '') {
    if (empty($user_id)){
		$current_user = wp_get_current_user();
		$user_id = (int) $current_user->ID;
	}
	$user_likes_comment = get_user_meta($user_id, 'saic-likes_comment');
	$likes_comment = $user_likes_comment[0];
	if(!is_array($likes_comment)) {
		$likes_comment = array();
	}
    return $likes_comment;
}
/* --------------------------------------------------------------------
   Función que obtiene el Campo Personalizado 'saic-dislikes_comment' de un Usuario
-------------------------------------------------------------------- */
function getCommentDislikeUser_SAIC($user_id = '') {
    if (empty($user_id)){
		$current_user = wp_get_current_user();
		$user_id = (int) $current_user->ID;
	}
	$user_dislikes_comment = get_user_meta($user_id, 'saic-dislikes_comment');
	$dislikes_comment = $user_dislikes_comment[0];
	if(!is_array($dislikes_comment)) {
		$dislikes_comment = array();
	}
    return $dislikes_comment;
}


/* --------------------------------------------------------------------
   Función que comprueba si una IP ya ha votado
-------------------------------------------------------------------- */
function checkVotedIP_SAIC($comment_id, $ip = ''){
	if($ip == '' ) {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	$likes_IP = getVotedIP_SAIC($comment_id);
	if( in_array($ip, array_keys($likes_IP)) ){
		return true;
	} else {
		return false;
	}
}

/* --------------------------------------------------------------------
   Función que obtiene todas la IP que han votado un Comentario
-------------------------------------------------------------------- */
function getVotedIP_SAIC($comment_id){
	$meta_IP = get_comment_meta($comment_id, 'saic-likes_IP');
	$likes_IP = $meta_IP[0];
	if(!is_array($likes_IP)) {
		$likes_IP = array();
	}
    return $likes_IP;
}
/* --------------------------------------------------------------------
   Función que comprueba la última acción de un voto "like/dislike"
-------------------------------------------------------------------- */
function checkVotedAction_SAIC($comment_id, $ip = '', $action){
	if($ip == '' ) {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	$meta_action = get_comment_meta($comment_id, 'saic-likes_action');
	$action_IP = $meta_action[0];
	if(!is_array($action_IP)) {
		$action_IP = array();
	}
	if($action == $action_IP[$ip])
		return true;
	return false;
}


/* --------------------------------------------------------------------
   Tiempo en que se ha publicado un Comentario
-------------------------------------------------------------------- */
function get_time_since_SAIC($time = ''){
	if($time == ''){
		$time_since_posted = make_time_since_SAIC( get_the_time( 'U' ), current_time( 'timestamp' ) );
	}
	else {
		$time_since_posted = make_time_since_SAIC( $time, current_time( 'timestamp' ) );
	}
	return $time_since_posted;
}
/* --------------------------------------------------------------------
   Retorna la diferencia entre dos tiempos, función						   					   bp_core_time_since() de budypress modificada
-------------------------------------------------------------------- */
function make_time_since_SAIC($older_date, $newer_date = false){
	$unknown_text   = 'sometime';
	$right_now_text = 'right now';
	$ago_text       = '%s ago';
	
	//Time Periods
	$chunks = array(
		array( 60 * 60 * 24 * 365 , 'year','years'),
		array( 60 * 60 * 24 * 30 , 'month', 'months'  ),
		array( 60 * 60 * 24 * 7, 'week', 'weeks' ),
		array( 60 * 60 * 24 , 'day', 'days'  ),
		array( 60 * 60 ,'hour', 'hours' ),
		array( 60 , 'min', 'mins'),
		array( 1, 'sec', 'secs')
	);

	if ( !empty( $older_date ) && !is_numeric( $older_date ) ) {
		$time_chunks = explode( ':', str_replace( ' ', ':', $older_date ) );
		$date_chunks = explode( '-', str_replace( ' ', '-', $older_date ) );
		$older_date  = gmmktime( (int) $time_chunks[1], (int) $time_chunks[2], (int) $time_chunks[3], (int) $date_chunks[1], (int) $date_chunks[2], (int) $date_chunks[0] );
	}

	$newer_date = ( !$newer_date ) ? strtotime( current_time( 'mysql', true ) ) : $newer_date;

	// Diferencia en segundos
	$since = $newer_date - $older_date;

	// Si algo salió mal y terminamos con una fecha negativa
	if ( 0 > $since ) {
		$output = $unknown_text;

	/**
	 * Solo mostraremos dos bloques de tiempo, ejemplo:
	 * x años, xx meses
	 * x días, xx horas
	 * x horas, xx minutos
	 */
	} else {
		for ( $i = 0, $j = count( $chunks ); $i < $j; ++$i ) {
			$seconds = $chunks[$i][0];
			$count = floor( $since / $seconds );
			if ( 0 != $count ) {
				break;
			}
		}
		// Si el evento ocurrió hace 0 segundos
		if ( !isset( $chunks[$i] ) ) {
			$output = $right_now_text;
		} else {
			$output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
			if ( $i + 2 < $j ) {
				$seconds2 = $chunks[$i + 1][0];
				$name2    = $chunks[$i + 1][1];
				$count2   = floor( ( $since - ( $seconds * $count ) ) / $seconds2 );
				if ( 0 != $count2 ) {
					$output .= ( 1 == $count2 ) ? _x( ',', 'Separator in time since', 'buddypress' ) . ' 1 '. $name2 : _x( ',', 'Separator in time since', 'buddypress' ) . ' ' . $count2 . ' ' . $chunks[$i + 1][2];
				}
			}
			if ( ! (int) trim( $output ) ) {
				$output = $right_now_text;
			}
		}
	}
	if ( $output != $right_now_text ) {
		$output = sprintf( $ago_text, $output );
	}

	return $output;
}

?>
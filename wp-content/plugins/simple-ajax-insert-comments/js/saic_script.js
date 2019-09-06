jQuery(document).ready(function($){
	$(this).find(':submit').removeAttr("disabled");
	SAIC = {
		ajaxurl: SAIC_WP.ajaxurl,
		nonce: SAIC_WP.saicNonce,
		textCounter: SAIC_WP.textCounter,
		textCounterNum: (SAIC_WP.textCounterNum!='') ? SAIC_WP.textCounterNum: 300,
		jpages: SAIC_WP.jpages,
		numPerPage: (SAIC_WP.jPagesNum!='') ? SAIC_WP.jPagesNum : 10,
		widthWrap: (SAIC_WP.widthWrap!='') ? SAIC_WP.widthWrap : '',
		autoLoad: SAIC_WP.autoLoad,
	}
	
	// ADAPTAR ANCHO DEL CONTENEDOR
	$('.saic-wrapper').each(function() {
		restoreWidth($(this));
	});
	$(window).resize(function() {
		$('.saic-wrapper').each(function() {
			restoreWidth($(this));
		});
	}); 
	
	function restoreWidth($this) {
		var $widthWrap = SAIC.widthWrap ? parseInt(SAIC.widthWrap,10) : $this.innerWidth();
		if($widthWrap >= 290 ) {
			$this.find('.saic-wrap-textarea').width($widthWrap - 132);
			$this.find('iframe').attr('height','250px');
		} else {
			$this.find('.saic-wrap-textarea').css('width', '100%');
			$this.find('iframe').attr('height','160px');
		} 
	}
	
	// CAPTCHA
	if($('.saic-captcha').length){
		$n1 = captcha_SAIC(8)['n1'];
		$n2 = captcha_SAIC(8)['n2'];
		$textCaptcha =  $n1 + ' + ' + $n2;
		$('.saic-captcha-text').html($textCaptcha + ' = ');
	}
	
	// OBTENER COMENTARIOS
	
	$(document).delegate('a.saic-link','click',function(e){
		e.preventDefault();
		var $postID = $(this).attr('id').replace('saic-link-','');
		var $numComments = $(this).attr('href').split('=')[2].replace('&get','');
		var $numGetComments = $(this).attr('href').split('=')[3];
		ajaxGetComments_SAIC($postID, $numComments, $numGetComments);
		
		// LIMITAR COMENTARIOS ANIDADOS
		var intervalReplyLink = setInterval(function(){
			if($('li.saic-item-comment.depth-3').length){
				$('li.saic-item-comment.depth-3').find('a.saic-reply-link').remove();
				if(!$('li.saic-item-comment.depth-3').find('a.saic-reply-link').length){
					clearInterval(intervalReplyLink);
				}
			}
		},1000);
		return false;
	});
	// CARGAR COMENTARIOS AUTOMÁTICAMENTE
	
	if(SAIC.autoLoad == 'true' && $('a.saic-link').length ){
		$('a.saic-link').each(function() {
		 	$(this).click();
    	});
	}
	
	// RESPONDER COMENTARIOS
	
	//Mostrar - Ocultar Link Responder Comentarios
	$('.saic-wrapper').delegate('li.saic-item-comment','mouseover',function(e){
		e.stopPropagation();
		$(this).find('.saic-reply-link:first').show();
	});
	$('.saic-wrapper').delegate('li.saic-item-comment','mouseout',function(e){
		e.stopPropagation();
		$(this).find('.saic-reply-link').hide();
	});
	$('.saic-wrapper').delegate('.saic-reply-link','click', function (e) {
		e.preventDefault();
		var $commentID = $(this).attr('id').replace('saic-reply-link-','');
		var $postID = $(this).attr('href').split('=')[2];
		var $form = $('#commentform-'+$postID);
		var $author = $('#saic-comment-'+$commentID).find('a.saic-commenter-name').text();
		$form.find('#comment_parent').val($commentID);
		$form.find('.saic-textarea').val('').attr('placeholder','Reply comment from '+$author + ', Press ESC to cancel').focus();
		//scroll
		scrollThis_SAIC($form);
		
		$(document).keyup(function(tecla){
			if(tecla.which == 27){
				$form.find('#comment_parent').val('0');
				$form.find('.saic-textarea').attr('placeholder','Write a comment');
			}
    	});
		return false;
	});
	
	// VALIDAR COMENTARIO
	$commentForm = $('.saic-container-form').find('form');
	$commentForm.submit(function(){
		$(this).find(':submit').attr("disabled", "disabled");
		$('input, textarea').removeClass('saic-error');
		var $formID = $(this).attr('id');
		var $postID = $formID.replace('commentform-','');
		var $form = $('#commentform-' + $postID);
		var $link = $('#saic-link-'+$postID);
		var $numComments = $link.attr('href').split('=')[2];
		var $validForm = true;
		
		// VALIDAR COMENTARIO
		var $content = $form.find('textarea').val().replace(/\s+/g,' ');
		//Si el comentario tiene menos de 2 caracteres no se enviará
		if($content.length < 2){
			$form.find('.saic-textarea').addClass('saic-error');
			$form.find('.saic-error-info-text').show();
			setTimeout(function(){$form.find('.saic-error-info-text').fadeOut(500)},2500);
			$(this).find(':submit').removeAttr('disabled');
			return false;
		}
		else {
			// VALIDAR CAMPOS DE TEXTO
			if($(this).find('input#email').length){
				var $author = $(this).find('input#author');
				var $authorVal = $author.val().replace(/\s+/g,' ');
				var $authorRegEx = /^[^?&%$=\/]{2,30}$/i;
				var $emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i;
				var $email = $(this).find('input#email');
				var $emailVal = $email.val().replace(/\s+/g, '');
				$email.val($emailVal);
				if( $authorVal == 0 || !$authorRegEx.test($authorVal)) {
					$author.addClass('saic-error');
					$form.find('.saic-error-info-name').show();
			setTimeout(function(){$form.find('.saic-error-info-name').fadeOut(500)},3000);
					$validForm = false;
				} 
				if( !$emailRegEx.test($emailVal) ){
					$email.addClass('saic-error');
					$form.find('.saic-error-info-email').show();
			setTimeout(function(){$form.find('.saic-error-info-email').fadeOut(500)},3000);
					$validForm = false;
				}
				if(!$validForm){
					$(this).find(':submit').removeAttr('disabled');
					return false;
				}
			}
			
			// VALIDAR CAPTCHA
			if( $('.saic-captcha').length ){
				var $captcha = $('#saic-captcha-value-'+$postID);
				if( $captcha.val() != ($n1 + $n2) ){
					$validForm = false;
					$captcha.addClass('saic-error');
					$n1 = captcha_SAIC(8)['n1'];
					$n2 = captcha_SAIC(8)['n2'];
					$textCaptcha =  $n1 + ' + ' + $n2;
					$('.saic-captcha-text').html($textCaptcha + ' = ');
					$captcha.val('');
					$(this).find(':submit').removeAttr('disabled');
					return false;
				}
				else {
					$validForm = true;
					$n1 = captcha_SAIC(8)['n1'];
					$n2 = captcha_SAIC(8)['n2'];
					$textCaptcha =  $n1 + ' + ' + $n2;
					$('.saic-captcha-text').html($textCaptcha + ' = ');
					$captcha.val('');
				}
			}
			
			//Si el formulario está validado
			if($validForm){
				
				$(this).find(':submit').removeAttr('disabled');
				$commentID = parseInt($form.find('input#comment_parent').val(),10);
				
				//Insertamos un nuevo comentario
				if($commentID == 0){
					insertComment_SAIC($postID,$numComments);
				} else {
					//Insertamos un Comentario de Respuesta
					insertCommentReply_SAIC($postID, $commentID, $numComments);
				}
				
			} else {
				$(this).find(':submit').removeAttr('disabled');
			}
		}
		return false;
	});//end submit
	
	
	// Textarea Counter Plugin 
	if(typeof jQuery.fn.textareaCount == 'function' && SAIC.textCounter == 'true'){
		$('.saic-textarea').each(function(){
			var textCount = {
				'maxCharacterSize': SAIC.textCounterNum,
				'originalStyle': 'saic-counter-info',
				'warningStyle': 'saic-counter-warn',
				'warningNumber': 20,
				'displayFormat': '#left'
			};
			$(this).textareaCount(textCount);
		});
	}
	
	// PlaceHolder Plugin
	if(typeof jQuery.fn.placeholder == 'function') {
		$('.saic-wrap-form input, .saic-wrap-form textarea, #saic-modal input, #saic-modal textarea').placeholder();
	}
	// Autosize Plugin
	if(typeof jQuery.fn.autosize == 'function') {
		$('textarea.autosize-textarea').autosize({
			className:'autosize-textarea'
		});
	}
	
	function insertCommentReply_SAIC($postID, $commentID, $numComments ){
		var $postID = String($postID);
		var $numComments = String($numComments);
		var $link = $('#saic-link-'+$postID);
		var $commentForm = $('#commentform-'+$postID);
		var $statusDiv = $('#saic-comment-status-'+$postID);
		var $commentDiv = $('#saic-item-comment-'+$commentID);
		var $commentForm = $('#commentform-'+$postID);
		var $formData = $commentForm.serialize();//obtenemos los datos
		var $formUrl = $commentForm.attr('action');
		$statusDiv.html('<div class="saic-loading saic-loading-2"></div>').show();
		
		$.ajax({
			type: 'post',
			url: $formUrl,
			data: $formData,
			success: function(data, textStatus){
				if(data != "error"){
					$statusDiv.html('<p class="saic-ajax-success">Thanks for answering the comment!</p>');
					if($link.find('span').length){
						$numComments = String(parseInt($numComments,10)+1);
						$link.find('span').html($numComments);
					}
					if(!$commentDiv.find('ul').length){
						$commentDiv.append('<ul class="children"></ul>');
					}
					$wrapChild = $commentDiv.find('ul');
					//Agregamos el nuevo comentario a la lista
					$wrapChild.append(data);
					//Limpiamos el Area de Texto
					$commentForm.find('.saic-textarea').val('').removeAttr('style').css('width', '100%').attr('placeholder','Write a comment');
					$commentForm.find('#comment_parent').val('0');
					//scroll
					setTimeout(function(){scrollThis_SAIC($commentDiv.find('ul li').last())},1000);
					
				}
				else {
					$statusDiv.html('<p class="saic-ajax-success-2">Error in processing your form.</p>');
				}
				
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				$statusDiv.html('<p class="saic-ajax-error" >You might have left one of the fields blank, or duplicate comments.</p>');
			},
			complete: function(jqXHR, textStatus){
				setTimeout(function(){$statusDiv.fadeOut(600)},3000);
				//activamos el boton enviar
				$commentForm.find(':submit').removeAttr('disabled');
			}
		});//end ajax
		return false;
		
	}
	
	function insertComment_SAIC($postID,$numComments){
		var $postID = String($postID);
		var $numComments = String($numComments);
		var $link = $('#saic-link-'+$postID);
		var $commentForm = $('#commentform-'+$postID);
		var $statusDiv = $('#saic-comment-status-'+$postID);
		var $containerComment = $('ul#saic-container-comment-'+$postID);
		var $formData = $commentForm.serialize();//obtenemos los datos
		var $formUrl = $commentForm.attr('action');
		$.ajax({
			type: 'post',
			url: $formUrl,
			data: $formData,
			beforeSend: function (){
						$statusDiv.html('<div class="saic-loading saic-loading-2"></div>').show();
			},
			success: function(data, textStatus){
				if(data != "error"){
					$statusDiv.html('<p class="saic-ajax-success">Thanks for your comment!</p>');
					if($link.find('span').length){
						$numComments = String(parseInt($numComments,10)+1);
						$link.find('span').html($numComments);
					}
				}
				else {
					$statusDiv.html('<p class="saic-ajax-success-2">Error in processing your form.</p>');
				}
				//Agregamos el nuevo comentario a la lista
				$containerComment.prepend(data).show();
				//Actualizamos el Paginador
				jPages_SAIC($postID,SAIC.numPerPage,true);
				//Limpiamos el Area de Texto
				$commentForm.find('.saic-textarea').val('').removeAttr('style').css('width', '100%');
				//actualizamos ancho del contenedor
				$('.saic-wrapper').each(function() {
					restoreWidth($(this));
				});
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				$statusDiv.html('<p class="saic-ajax-error" >You might have left one of the fields blank, or duplicate comments.</p>');
			},
			complete: function(jqXHR, textStatus){
				setTimeout(function(){$statusDiv.fadeOut(600)},3000);
				//activamos el boton enviar
				$commentForm.find(':submit').removeAttr('disabled');
			}
		});//end ajax
		return false;
	}
	
	function ajaxGetComments_SAIC($post_id, $numComments, $numGetComments){
		var $postID = String($post_id);
		var $numComments = parseInt($numComments,10);
		var $link = $('#saic-link-'+$postID);
		var $wrapComment = $("div#saic-wrap-commnent-"+$postID);
		$wrapComment.slideToggle(200);
		if($("ul#saic-container-comment-"+$postID).length){
			var $containerComment = $("ul#saic-container-comment-"+$postID);
			var $statusDiv = $('#saic-comment-status-'+$postID);
			var $content = $containerComment.html().replace(/\s+/g,'');
			if($content == '' && $numComments > 0){
				jQuery.ajax({
					type: "POST",
					dataType: "html",
					url: SAIC.ajaxurl,
					data: { 
						action: 'get_comments',
						post_id: $postID,
						get : $numGetComments,
						nonce: SAIC.nonce
					},
					beforeSend: function (){
						$statusDiv.html('<div class="saic-loading saic-loading-2"></div>').show();
					},
					success: function(data){
						$statusDiv.html('').hide();
						$containerComment.html(data).show();//Mostramos los Comentarios
						//Insertamos Paginación de Comentarios
						jPages_SAIC($postID,SAIC.numPerPage);
						//actualizamos ancho del contenedor
						$('.saic-wrapper').each(function() {
							restoreWidth($(this));
						});
					}//end success
				});//end jQuery.ajax
			}//end if
			else {
				//$containerComment.show();
			}	
		}
		return false;
	}//end function	
	
	$('.saic-modal-btn').on('click', function(e){
		e.preventDefault();
		var $postID = $(this).attr('href').split('=')[1].replace('&action','');
		var $action = $(this).attr('href').split('=')[2];
		$('body').append('<div id="saic-overlay"></div>');
		$("#saic-overlay").css({'opacity' : 0.2,'z-index': 900000});
		$('body').append('<div id="saic-modal"></div>');
		$modalHtml = '<div id="saic-modal-wrap"><span id="saic-modal-close"></span><div id="saic-modal-header"><h3 id="saic-modal-title">Título</h3></div><div id="saic-modal-content"><p>Hola</p></div><div id="saic-modal-footer"><a id="saic-modal-ok-'+ $postID +'" class="saic-modal-ok saic-modal-btn" href="#">Accept</a><a class="saic-modal-cancel saic-modal-btn" href="#">Cancel</a></div></div>';
		$("#saic-modal").append($modalHtml).fadeIn(250);
		
		switch($action){
			case 'url':
				$('#saic-modal').removeClass().addClass('saic-modal-url');
				$('#saic-modal-title').html('Insert link');
				$('#saic-modal-content').html('<input type="text" id="saic-modal-url-link" class="saic-modal-input" placeholder="Url link"/><input type="text" id="saic-modal-text-link" class="saic-modal-input" placeholder="Text to display"/>');
				break;
				
			case 'image':
				$('#saic-modal').removeClass().addClass('saic-modal-image');
				$('#saic-modal-title').html('Insert Image');
				$('#saic-modal-content').html('<input type="text" id="saic-modal-url-image" class="saic-modal-input" placeholder="Url image"/><div id="saic-modal-preview"></div>');
				break;
				
			case 'video':
				$('#saic-modal').removeClass().addClass('saic-modal-video');
				$('#saic-modal-title').html('Insert video');
				$('#saic-modal-content').html('<input type="text" id="saic-modal-url-video" class="saic-modal-input" placeholder="Url video youtube or vimeo"/><div id="saic-modal-preview"></div>');
				$('#saic-modal-footer').prepend('<a id="saic-modal-verifique-video" class="saic-modal-verifique saic-modal-btn" href="#">Check video</a>');
				break;
		}
	});//
	//acción Ok
	$(document).delegate('.saic-modal-ok','click',function(e){
		e.preventDefault();
		$('#saic-modal input, #saic-modal textarea').removeClass('saic-error');
		var $action = $('#saic-modal').attr('class');
		var $postID = $(this).attr('id').replace('saic-modal-ok-','');
		switch($action){
			case 'saic-modal-url':
				processUrl_SAIC($postID);
				break;
			case 'saic-modal-image':
				processImage_SAIC($postID);
				break;
			case 'saic-modal-video':
				processVideo_SAIC($postID);
				break;
		}
		return false;
	});
	//eliminamos errores
	$(document).delegate('#saic-modal input, #saic-modal textarea','focus',function(e){
		$(this).removeClass('saic-error');
	});
	
	function processUrl_SAIC($postID){
		var $ok = true;
		var $urlField = $('#saic-modal-url-link');
		var $textField = $('#saic-modal-text-link');
		var $textAreaID = 'saic-textarea-'+$postID;
		if($urlField.val().length < 1){
			$ok = false;
			$urlField.addClass('saic-error');
		}
		if($textField.val().length < 1){
			$ok = false;
			$textField.addClass('saic-error');
		}
		if($ok){
			var $urlVal = $urlField.val().replace(/https?:\/\//gi,'');
			var $link = '<a href="http://'+ $urlVal +'" title="'+ $textField.val() +'" rel="nofollow" target="_blank">'+ $textField.val() +'</a>';
			insertInTextArea_SAIC($textAreaID, $link);
			closeModal_SAIC();
		}
		return false;
	}
	function processImage_SAIC($postID){
		var $ok = true;
		var $urlField = $('#saic-modal-url-image');
		var $textAreaID = 'saic-textarea-'+$postID;
		if($urlField.val().length < 1){
			$ok = false;
			$urlField.addClass('saic-error');
		}
		if($ok){
			var $urlVal = $urlField.val();
			var $image = '<img src="'+ $urlVal +'" />';
			insertInTextArea_SAIC($textAreaID, $image);
			closeModal_SAIC();
		}
		return false;
	}
	//vista previa de imagen
	$(document).delegate('#saic-modal-url-image','change',function(e){
		setTimeout(function(){
			$('#saic-modal-preview').html('<img src="'+ $('#saic-modal-url-image').val() +'" />');
		},200);
	});
	
	function processVideo_SAIC($postID){
		var $ok = true;
		var $urlField = $('#saic-modal-url-video');
		var $textAreaID = 'saic-textarea-'+$postID;
		if(!$('#saic-modal-preview').find('iframe').length){
			$ok = false;
			$('#saic-modal-preview').html('<p class="saic-modal-error">Please check the video url</p>');
		}
		if($ok){
			var $video = '<p>'+$('#saic-modal-preview').html()+'</p>';
			insertInTextArea_SAIC($textAreaID, $video);
			closeModal_SAIC();
		}
		
		return false;
	}
	//vista previa de video
	$(document).delegate('#saic-modal-verifique-video','click',function(e){
		e.preventDefault();
		var $urlVideo = $('#saic-modal-url-video');
		var $urlVideoVal = $urlVideo.val().replace(/\s+/g,'');
		$urlVideo.removeClass('saic-error');
		$(this).attr('id','');//desactivamos el enlace
		
		if($urlVideoVal.length < 1){
			$urlVideo.addClass('saic-error');
			$('.saic-modal-video').find('a.saic-modal-verifique').attr('id','saic-modal-verifique-video');//activamos el enlace
			return false;
		}
		
		var data = 'url_video=' + $urlVideoVal;
		$.ajax({
			url: SAIC.ajaxurl,
			data: data+'&action=verificar_video_SAIC',
			type: "POST",
			dataType: "html",
			beforeSend: function (){
				$('#saic-modal-preview').html('<div class="saic-loading saic-loading-2"></div>');
			},
			success: function (data) {
				if(data!='error'){
					$('#saic-modal-preview').html(data);
				} else {
					$('#saic-modal-preview').html('<p class="saic-modal-error">Invalid video url</p>');
				}
			},
			error: function (xhr) {
				$('#saic-modal-preview').html('<p class="saic-modal-error">Failed to process, try again</p>');
			},
			complete: function(jqXHR, textStatus){
				$('.saic-modal-video').find('a.saic-modal-verifique').attr('id','saic-modal-verifique-video');//activamos el enlace
			}
		});//end ajax
	});
	
	function closeModal_SAIC(){
		$('#saic-overlay, #saic-modal').remove();
		return false;
	}
	//acción cancelar
	$(document).delegate('#saic-modal-close, .saic-modal-cancel','click',function(e){
		e.preventDefault();
		closeModal_SAIC();
		return false;
	});
	
	function jPages_SAIC(post_id,$numPerPage,$destroy){
		//Si existe el plugin jPages y está activado
		if(typeof jQuery.fn.jPages == 'function' && SAIC.jpages == 'true'){
			var $postID = String(post_id);
			var $idList = 'saic-container-comment-'+$postID;
			var $holder = 'div.saic-holder-'+$postID;
			var $numComments = jQuery('#'+$idList+' > li').length;
			if($numComments > $numPerPage) {
				if($destroy){
					jQuery('#'+$idList).children().removeClass('animated jp-hidden');
				}
				jQuery($holder).show().jPages({
					containerID: $idList,
					previous : "← previous",
					next : "next →",
					perPage: parseInt($numPerPage,10),
					minHeight: false,
					keyBrowse: true,
					direction: "forward",
					animation: "fadeIn",
				});
			}//end if
		}//end if
		return false;
	}
	
	function captcha_SAIC($max){
		if(!$max) $max = 5;
		var $values = new Array(2);
		$values['n1'] = Math.floor (Math.random() * $max + 1);
		$values['n2'] = Math.floor (Math.random() * $max + 1);
		return $values;
	}
	function scrollThis_SAIC($this){
		var $This = $this.attr("id");
		var $position = $('#'+$This).offset().top;
		var $scrollThis = Math.abs($position - 200);
		$('html,body').animate({scrollTop: $scrollThis},'slow');
		return false;
	}
	
	function insertInTextArea_SAIC($fieldID,$value) {
		//Get textArea HTML control 
		var $fieldID = document.getElementById($fieldID);
		
		//IE
		if (document.selection) {
			$fieldID.focus();
			var sel = document.selection.createRange();
			sel.text = $value;
			return;
		}
		//Firefox, chrome, mozilla
		else if ($fieldID.selectionStart || $fieldID.selectionStart == '0') {
			var startPos = $fieldID.selectionStart;
			var endPos = $fieldID.selectionEnd;
			var scrollTop = $fieldID.scrollTop;
			$fieldID.value = $fieldID.value.substring(0, startPos) + $value + $fieldID.value.substring(endPos, $fieldID.value.length);
			$fieldID.focus();
			$fieldID.selectionStart = startPos + $value.length;
			$fieldID.selectionEnd = startPos + $value.length;
			$fieldID.scrollTop = scrollTop;
		}
		else {
			$fieldID.value += textArea.value;
			$fieldID.focus();
		}
	}
	
	// LIKE COMMENTS
	$('.saic-wrapper').delegate('a.saic-rating-link','click', function (e) {
		e.preventDefault();
		var $commentID = $(this).attr('href').split('=')[1].replace('&method','');
		var $method = $(this).attr('href').split('=')[2];
		commentRating_SAIC($commentID,$method);
		return false;
	})
	function commentRating_SAIC($commentID,$method){
		var $ratingCount = $('#saic-comment-'+$commentID).find('.saic-rating-count');
		var $currentLikes = $ratingCount.text();
		jQuery.ajax({
			type: 'POST',
			url: SAIC.ajaxurl,
			data: { 
				action: 'comment_rating',
				comment_id: $commentID,
				method : $method,
				nonce: SAIC.nonce
			},
			beforeSend: function (){
				$ratingCount.html('').addClass('saic-rating-loading');
			},
			success: function(result){
				var data = $.parseJSON(result);
				if(data.success == true){
					$ratingCount.html(data.likes).attr('title',data.likes + ' Likes');
					if(data.likes < 0){
						$ratingCount.removeClass().addClass('saic-rating-count saic-rating-negative');
					}
					else if(data.likes > 0){
						$ratingCount.removeClass().addClass('saic-rating-count saic-rating-positive');
					}
					else {
						$ratingCount.removeClass().addClass('saic-rating-count saic-rating-neutral');
					}
				} else {
					$ratingCount.html($currentLikes);
				}
			},
			error: function (xhr) {
				$ratingCount.html($currentLikes);
			},
			complete: function(data){
				$ratingCount.removeClass('saic-rating-loading');
			}//end success
			
		});//end jQuery.ajax
	}
	
});//end ready





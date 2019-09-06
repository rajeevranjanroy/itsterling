/*
    Author: http://codecanyon.net/user/sike?ref=sike
*/
jQuery(document).ready(function ($) {
    var media_frame, _currentInput;
    var _this = $(this);
    jQuery('#tumblr_upload_thumbs').on('click', _uploadThumbs);
    var _imageNumWillAdded = 0;
    function _uploadThumbs(event){
        if ( media_frame ) {
            media_frame.remove();
        }
        media_frame = wp.media.frames.media_frame = wp.media({
            className: 'media-frame media-frame',
            frame: 'select',
            multiple: true,
            title: 'Select image for the Gallery (support multiple images)',
            library: {
                type: 'image'
            },
            button: {
                text:  'Use the image(s)'
            }
        });

        media_frame.on('select', function(){
            var media_attachment = media_frame.state().get('selection').first().toJSON();
            var selection = media_frame.state().get('selection');
            _imageNumWillAdded = selection.length;
            selection.map(function(attachment, i){
                  attachment = attachment.toJSON();
                  _addContentViaImage(attachment.url, i);
            });
        });

        media_frame.open();
        return false;
    }



    jQuery('#photoset-admin-container').find('.upload_thumb').on('click', { from: "thumb" }, _uploadcSingle);
    jQuery('#photoset-admin-container').find('.upload_image').on('click', { from: "image" }, _uploadcSingle);
    function _uploadcSingle(event){
        if ( media_frame ) {
            media_frame.remove();
        }
        var _from = event.data.from;
        media_frame = wp.media.frames.media_frame = wp.media({
            className: 'media-frame media-frame',
            frame: 'select',
            multiple: false,
            title: 'Choose Image',
            library: {
                type: 'image'
            },
            button: {
                text:  'Use the image'
            }
        });

        _currentInput = jQuery(event.target).prev('input');
        media_frame.on('select', function(){
            var media_attachment = media_frame.state().get('selection').first().toJSON();
            _currentInput.val(media_attachment.url);
            // console.log('this', _currentInput.parent().parent());
            if(_from=="thumb")_currentInput.parent().parent().find('.admin-thumb-img').attr('src', media_attachment.url);
        });

        media_frame.open();
        return false;
    }

    var _firstItem = '<li class="thumb-item"><div class="admin-thumb-container"><img src="" class="admin-thumb-img" alt="thumbnail" /></div> <div class="item-container"><input type="text" class="thumb-url widefat" name="thumb_url" data-name="thumb_url" value="" /> <a class="upload_thumb button" href="#">Browse</a></div> <a class="remove-item" href="#" title="Remove this thumbnail"></a> </li> ';

    function _addContentViaImage(img, i){
        if(img!=""){
            // var _firstItem = $('#photoset-admin-container').find('.thumb-item').first();
            var _itemTemplate = $(_firstItem).clone(true);
            _itemTemplate.find('input.thumb-url').val(img);
            _itemTemplate.find('.admin-thumb-img').attr('src', img);
            $('#photoset-admin-container').append(_itemTemplate);
        }
        $('#photoset-save-btn').show();
        if(i>=_imageNumWillAdded-1){
            $('#photoset-admin-container').find('.upload_thumb').on('click', { from: "thumb" }, _uploadcSingle);
            $('#photoset-admin-container').find('.upload_image').on('click', { from: "image" }, _uploadcSingle);
        }

        _resetItemName();

    }

    function _enableSort(){
        $('#photoset-admin-container').sortable({
            items: '.thumb-item',
            axis: 'y',
            cursor: 'move',
            update: _resetItemName
        });
    }
    _enableSort();
    _resetItemName();


    function _resetItemName(){
        jQuery('.thumb-item').each(function(index) {
            var _item = $(this);
            $(this).find('.thumb-num').html(index+1);
            var _itemBack = $(this).find('.item-back');
            var _backInput = _itemBack.find('input');
            var _backTextarea = _itemBack.find('textarea');
            if(_backTextarea.val()!=""||_backInput.val()!=""){
                _itemBack.show();
                _itemBack.prev('.toggle-back').html('Hide Back Side &#8593;');
            }
            if(index>0) $('#photoset-save-btn').show();
            $(this).find('.item-container').each(function() {
                $(this).find('input').each(function() {
                    var _name = $(this).data('name')+'['+index+'][]';
                    $(this).attr('name', _name);
                })
                $(this).find('textarea').each(function() {
                    var _name = $(this).data('name')+'['+index+'][]';
                    $(this).attr('name', _name);
                })

            });
            $(this).find('.item-back').each(function() {
                $(this).find('input').each(function() {
                    var _name = $(this).data('name')+'['+index+'][]';
                    $(this).attr('name', _name);
                })
                $(this).find('textarea').each(function() {
                    var _name = $(this).data('name')+'['+index+'][]';
                    $(this).attr('name', _name);
                })
            });


        });
    }


    function _enableRemoveThumb(){
        jQuery('.remove-item').on('click', function(event) {
            event.preventDefault();
            $(this).parent('li').animate({
                opacity: 0},
                300, function() {
                    $(this).remove();
                    _resetItemName();
            });
            return false;
        });
    }
    _enableRemoveThumb();

});

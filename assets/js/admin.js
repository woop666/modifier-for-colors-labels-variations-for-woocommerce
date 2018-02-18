/**
 * Admin
 *
 */
jQuery(function($){

    $(document).on('dclv_colorpicker', function(){
        $('[data-type="colorpicker"]').each(function(){
            $(this).wpColorPicker();
        });
    }).trigger('dclv_colorpicker');

    $(document).on('dclv_two_colorpicker', function(){
        $('[data-type="two_colorpicker"]').each(function(){
            $(this).wpColorPicker();
        });
    }).trigger('dclv_two_colorpicker');

    $(document).on('two_colorpicker_in_circular', function(){
        $('[data-type="two_colorpicker_in_circular"]').each(function(){
            $(this).wpColorPicker();
        });
    }).trigger('two_colorpicker_in_circular');

    $(document).on('dclv_upload', function(){
        $('[data-type="image"]').each(function(){
            var button = $("<input type='button' name='' id='term-value_button' class='button' value='Upload' />");
            button.insertAfter(this);

            //image uploader
            var _custom_media = true,
                _orig_send_attachment = wp.media.editor.send.attachment;

            button.on('click', function(e) {
                var send_attachment_bkp = wp.media.editor.send.attachment;
                var button = $(this);
                var id = button.attr('id').replace('_button', '');
                _custom_media = true;
                wp.media.editor.send.attachment = function(props, attachment){
                    if ( _custom_media ) {
                        $("#"+id).val(attachment.url);
                    } else {
                        return _orig_send_attachment.apply( this, [props, attachment] );
                    }
                };

                wp.media.editor.open(button);
                return false;
            });
        });
    }).trigger('dclv_upload');
});
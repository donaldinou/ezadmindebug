(function( $ ) {
    jQuery(document).ready(function($) {     
        setInterval( function() {
            jQuery('.file-container').each( function() {
                var id = jQuery(this).children('.file_id').text();
                var filesize = jQuery(this).children('.file_filesize').text();
                jQuery.ez( 'admindebug::tail::' + id + '::' + filesize, {}, _callBack );
            });
            return false;
        }, 2000 );
        
        function _callBack( data ) {
            if ( data && data.content !== '' ) {
                var id = data.content.id;
                var content = data.content.content;
                var filesize = data.content.filesize;
                console.log(jQuery('.file-container[title="'+id+'"]').html());
                console.log(jQuery('.file-container[title="'+id+'"]').children('.filesize').html());
                jQuery('.file-container[title="'+id+'"]').children('.file_filesize').text(filesize);
                jQuery('.file-container[title="'+id+'"]').children('.file_content').append(content.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ '<br/>' +'$2'));
            }
        }
    });
})(jQuery);
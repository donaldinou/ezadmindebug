(function( $ ) {
    jQuery(document).ready(function($) {     
        jQuery('.flref').live('click', function() {
            var id = jQuery(this).attr('id').split('_');
            if (id[2]) {
                jQuery('input[name^=FileList]').attr('checked', false);
                jQuery('#file_list_'+id[2]).attr('checked', true);
                jQuery('#form_admin_debug_view').submit();
            }
        });
    });
})(jQuery);
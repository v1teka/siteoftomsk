$(document).ready(function() {
    $('.btn-comment-change').click(function() {
        $.post(
            $(this).data('href'),
            {
                'id' : $(this).data('id'),
                '_token' : $(this).data('token'),
                'message' : $('#message_' + $(this).data('id')).val()
            },
            function( data ) {
                if(data['result'])
                    toastr[data['result_type']](data['result']);
            },
            'json'
        );
    });
    
    $('.checkbox-is-processed').click(function() {
        $.post(
            $(this).data('href'),
            {
                'id' : $(this).data('id'),
                '_token' : $(this).data('token'),
                'checked' : $(this).prop('checked')
            },
            function( data ) {
                if(data['result'])
                    toastr[data['result_type']](data['result']);
            },
            'json'
        );
    });

    $('.checkbox-is-published').click(function() {
        $.post(
            $(this).data('href'),
            {
                'id' : $(this).data('id'),
                '_token' : $(this).data('token'),
                'published' : $(this).prop('checked')
            },
            function( data ) {
                if(data['result'])
                    toastr[data['result_type']](data['result']);
            },
            'json'
        );
    });
});

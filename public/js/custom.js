/**
 * Created by franklyn on 10/07/17.
 */

jQuery(document).ready(function ($){

    // change of language
    $('.languageSwitcher').click(function (e){
        e.preventDefault();
        var locale = $(this).attr('datatype');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:   '/language',
            type:  'post',
            data: {
                locale: locale,
                _token: _token
            },
            datatype: 'json',
            success: function (data){},
            error: function (data){},
            beforeSend: function (data){},
            complete: function (data){
                console.info(data);
                window.location.reload(true);
            }
        });
        console.info(locale);
        console.info(_token);
    });
});
$(function (){
    $('body').on('click', '.btn-action-delete', function (){
        let url = $(this).data('url')
        let $removeRow = $(this).parents('tr')
        $('#alert_action_result').hide()
        $.ajax({
            type: 'GET',
            url: url,
        }).done(function(result) {
            $removeRow.remove()
            $('#alert_action_result').show().children('.message').text(result.message)
            setTimeout(function (){
                $('#alert_action_result').hide()
            }, 3000)
        }).fail(function(response) {
            console.log(response.message)
        })
    })
})

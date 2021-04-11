
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
            $('#alert_action_result').removeClass('alert-danger').not('.alert-success').addClass('alert-success').show().children('.message').text(result.message)
            $('html, body').animate({scrollTop: $('#alert_action_result').offset().top - 20})
            setTimeout(function (){
                $('#alert_action_result').hide()
            }, 3000)
        }).fail(function(response) {
            console.log(response.message)
        })
    })

    $('#form_search_product').on('submit', function (e) {
        e.preventDefault()
        // $('.card-form').addClass('loading')
        const post_url = $(this).attr('action')
        let $categoryId = $('select[name ="category_id"]').val();
        $('.alert-errors').remove()
        $.ajax({
            type: 'GET',
            url: post_url,
            data: {category_id: $categoryId},
        }).done(function (result) {
            if(result){
                let  dataTables = result.dataTables;
                if(dataTables !== undefined){
                    $('#product_datas').html(dataTables);
                }
            }
            $('.card-form').removeClass('loading')
        }).fail(function () {
            $('.card-form').removeClass('loading')
            $('#alert_action_result').removeClass('alert-success').not('.alert-danger').addClass('alert-danger').show().children('.message').text('server error')
            setTimeout(function (){
                $('#alert_action_result').hide()
            }, 3000)
        })
    })
})

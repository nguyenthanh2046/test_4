$(function () {
    $('input').on('change', function () {
        $(this).removeClass('is-invalid')
        $(this).parent().parent().find('.text-error').remove()
    })

    $('#categories_form').on('submit', function (e) {
        e.preventDefault()
        $('.card-form').addClass('loading')
        const post_url = $(this).attr('action')
        const form_data = $(this).serialize()
        $('.alert-errors').remove()
        $.ajax({
            type: 'POST',
            url: post_url,
            data: form_data,
        }).done(function (result) {
            let redirectUrl = result.redirect_url
            if (redirectUrl !== undefined) {
                return location.href = result.redirect_url;
            }
        }).fail(function (response) {
            let errors = response.responseJSON.errors || response.responseJSON
            $('.text-error').remove()
            $('input').removeClass('is-invalid')
            $('select').parent().removeClass('is-invalid')
            $('select').parent().find('.text-error').remove()

            $.each(errors, function (i, item) {
                let errorMessage = '<span class="text-danger text-error">' + item + '</span>'
                $('input[name ="' + i + '"]').addClass('is-invalid')
                $('input[name ="' + i + '"]').parent().append(errorMessage)
            })
            $('.card-form').removeClass('loading')
        })
    })
})

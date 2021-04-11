$(function () {

//-------------------------format text money
    $.fn.inputFilter = function(inputFilter) {
        return this.on('input keydown keyup mousedown mouseup select contextmenu drop', function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value
                this.oldSelectionStart = this.selectionStart
                this.oldSelectionEnd = this.selectionEnd
            } else if (this.hasOwnProperty('oldValue')) {
                this.value = this.oldValue
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd)
            } else {
                this.value = ''
            }
        })
    }

    $('.text-money').inputFilter(function(value) {
        return /^\d*$/.test(value)
    })

    function addCommas(nStr) {
        nStr += ''
        x = nStr.split('.')
        x1 = x[0]
        x2 = x.length > 1 ? '.' + x[1] : ''
        var rgx = /(\d+)(\d{3})/
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2')
        }
        return x1 + x2
    }


    $(".text-money").on('keyup change click', function () {
    	var oldValue = $(this).val().split(',');
        let newValue = addCommas(oldValue)
    	if(Number(oldValue)  === 0){
            newValue = ''
        }
    	$(this).val(newValue)
    })

//----------------------------------------------Validate form
    $('.custom-file-input').on('change', function () {
        var fileName = $(this).val().split('\\').pop()
        $(this).siblings('.custom-file-label').addClass('selected').html(fileName)
    })

    $('input').on('change', function () {
        $(this).removeClass('is-invalid')
        $(this).parent().find('.text-error').remove()
    })

    $('select').on('change', function() {
        if ($(this).val() > 0) {
            $(this).parent().removeClass('is-invalid')
            $(this).parent().find('.text-error').remove()
        }
    })

//--------------------------------------------submit form
    $('#products_form').on('submit', function (e) {
        e.preventDefault()
        $('.card-form').addClass('loading')
        const post_url = $(this).attr('action')
        const formData = new FormData(this);

        $('.alert-errors').remove()
        $.ajax({
            type: 'POST',
            url: post_url,
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
        }).done(function (result) {
            let redirectUrl = result.redirect_url
            if (redirectUrl !== undefined) {
                return location.href = result.redirect_url;
            }
            $('.card-form').removeClass('loading')
        }).fail(function (response) {
            let errors = response.responseJSON.errors || response.responseJSON
            $('.text-error').remove()
            $('input').removeClass('is-invalid')
            $('select').parent().removeClass('is-invalid')
            $('select').parent().find('.text-error').remove()

            $.each(errors, function (i, item) {
                let errorMessage = '<span class="text-danger text-error">' + item + '</span>'
                if (i == 'category_id') {
                    $('select[name ="' + i + '[]"]').parent().addClass('is-invalid').append(errorMessage)
                }
                $('input[name ="' + i + '"]').addClass('is-invalid')
                $('input[name ="' + i + '"]').parent().append(errorMessage)
            })
            $('.card-form').removeClass('loading')
        })
    })
})

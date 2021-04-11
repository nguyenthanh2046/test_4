$(function () {
//------------------------------------------select category
    $('#select_category').select2({
        placeholder: " ",
        allowClear: true,
        ajax: {
            url: $('#select_category').data('url'),
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                }
            },
            processResults(data) {
                return {
                    results: $.map(data.items, function (item) {
                        let text = item[Object.keys(item).pop()]
                        return {
                            text: text,
                            id: item.id,
                        }
                    }),
                }
            },
            cache: true,
        },
    })
})

$(document).ready(function(){
    $('.add-to-cart').click((e)=> {
        let self = $(e.currentTarget);
        let id = self.data("id");
        $('.product-added').show();

        setInterval(function(){
            $('.product-added').hide();
            }, 3000);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: `/add-to-cart/${id}`,
            data: {
                'id': id
            },
            dataType: 'json',
            success: function (response) {
                console.log(response);
            }
        });
    });

    $('.remove-from-cart').click((e)=> {
        let self = $(e.currentTarget);
        let id = self.data("id");
        console.log('remove');
        $(self).closest('tr').remove();
        $('.product-removed').show();

        setInterval(function(){
            $('.product-removed').hide();
        }, 3000);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: `/remove-from-cart/${id}`,
            data: {
                'id': id
            },
            dataType: 'json',
            success: function (response) {
                console.log(response);
            }
        });
    });
});

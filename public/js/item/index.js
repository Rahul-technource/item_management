$('#add-item').validate({

    rules: {
        item_name: "required",
    },
    messages: {
        item_name: "Item Name is required",
    },

    errorPlacement: function(error, element) {
        var name = $(element).attr("id");
        error.appendTo($("#" + name + "_validate"));
    },
    submitHandler: function(form) {
            var formData = new FormData(form);
            $.ajax({
                type: "POST",
                url: base_url + '/add',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {                
                    if (data.code == 200) {
                        toastr.success(data.message);
                        $("#add-item")[0].reset();
                        $('.main-section').html(data.view)
                        return false;
                    } else {
                        toastr.error(data.message);
                        $("#add-item")[0].reset();
                        return false;
                    }
                }
            });
        }
        // form.submit();
});

$(document).on('click','.add-button',function(e){
    event.preventDefault();
    var selected = [];
    $('.selected').each(function(){
        if($(this).hasClass('selected_li'))
        {
          selected.push($(this).attr('data-id'));
        }    
    })
    if(selected.length == 0)
    {
        toastr.error('Noting to Add')
        return false;
    }
    $.ajax({
        type: "POST",
        url: base_url + '/addselected',
        data:{
          selected:selected,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {                
            if (data.code == 200) {
                toastr.success(data.message);
                $('.main-section').html(data.view)
                return false;
            } else {
                toastr.error(data.message);
                return false;
            }
        }
    });
});

$(document).on('click','.remove-button',function(e){
    event.preventDefault();
    var selected = [];
    $('.unselected').each(function(){
        if($(this).hasClass('selected_li'))
        {
          selected.push($(this).attr('data-id'));
        }    
    })
    if(selected.length == 0)
    {
        toastr.error('Noting to Remove')
        return false;
    }
    $.ajax({
        type: "POST",
        url: base_url + '/removeselected',
        data:{
          selected:selected,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {                
            if (data.code == 200) {
                toastr.success(data.message);
                $('.main-section').html(data.view)
                return false;
            } else {
                toastr.error(data.message);
                return false;
            }
        }
    });
});


$(document).on('click','li',function(){

    $('.unselected').each(function(){
        if($(this).hasClass('selected_li'))
        {
          $(this).removeClass('selected_li');
        }    
    })


    $('.selected').each(function(){
        if($(this).hasClass('selected_li'))
        {
          $(this).removeClass('selected_li');
        }    
    })

    if($(this).hasClass('selected_li'))
    {
        $(this).removeClass('selected_li')
    }
    else
    {
        $(this).addClass('selected_li')
    }
});
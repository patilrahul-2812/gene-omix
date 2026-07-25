    /* Only Numbers */
    $('.only_numbers').keyup(function(e)
    {
        if (/\D/g.test(this.value))
        {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });

    /* Upper Case Character */
    $('.uppercase').keyup(function(){
        this.value = this.value.toUpperCase();
    });

    /* All Chechkbox Check */
    $('.check_all').on('change', function(){
        $('.checkboxes:checkbox').prop('checked', $(this).prop('checked'));
    });

    $(document).on('change', '.checkboxes', function() {
        if ($(this).is(':checked'))
        {
            if ($('.checkboxes:checked').length == $('.checkboxes').length)
            {
                $('.check_all').prop('checked', true);
            }
            else
            {
                $('.check_all').prop('checked', false);
            }
        }
        else
        {
            $('.check_all').prop('checked', false);
        }
    });

    /* Status Change Code */
    $(document).on("change", ".on_off", function(){

        var status_id = $(this).val();
        var status = 0;

        if($(this).is(":checked")) {
            status=1;
        }

        $.ajax({
            url:status_url,
            method:"GET",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{status_id:status_id,status:status},
            success:function(data){
                if (data.status==true) {
                    var success_html=SUCCESS_MESSAGE;
                    $(".flash_messages").html(success_html.replace("FLASH_MESSAGE", data.message));

                    if ($("html, body").animate({ scrollTop: 0 }, "slow")) {
                        setTimeout(function() { $('.alert').alert('close'); }, 5000);
                    }
                }
                else
                {
                    var error_html=ERROR_MESSAGE;
                    $(".flash_messages").html(error_html.replace("FLASH_MESSAGE", data.message));
                    if ($("html, body").animate({ scrollTop: 0 }, "slow")) {
                        setTimeout(function() { $('.alert').alert('close'); }, 5000);
                    }
                }
            }
        });
    });

    //================= MULTIPLE DELETE START=================//
    $(document).on('click','.delete_records',function(){
        var data_id=[];

        $('.checkboxes').each(function(){
            if ($(this).is(":checked")) {
                data_id.push($(this).val());
            }
        });

        if (data_id.length > 0)
        {
            if (confirm("are you sure you want to delete record ?")) {
                $.ajax({
                    url:delete_url,
                    method:"GET",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{data_id:JSON.stringify(data_id)},
                    success:function(data){
                        table_id.DataTable().ajax.reload();
                        if (data.status==true)
                        {
                            var success_html=ERROR_MESSAGE;
                            $(".flash_messages").html(success_html.replace("FLASH_MESSAGE", data.message));

                            if ($("html, body").animate({ scrollTop: 0 }, "slow"))
                            {
                                setTimeout(function() { $('.alert').alert('close'); }, 5000);
                            }
                        }
                        else
                        {
                            var error_html=ERROR_MESSAGE;
                            $(".flash_messages").html(error_html.replace("FLASH_MESSAGE", data.message));

                            if ($("html, body").animate({ scrollTop: 0 }, "slow"))
                            {
                                setTimeout(function() { $('.alert').alert('close'); }, 5000);
                            }
                        }
                    }
                });
            }
        }
        else
        {
            var error_html=ERROR_MESSAGE;

            $(".flash_messages").html(error_html.replace("FLASH_MESSAGE", "Please select at least one record"));

            if ($("html, body").animate({ scrollTop: 0 }, "slow")) {
                setTimeout(function() { $('.alert').alert('close'); }, 5000);
            }

            return false;
        }
    });
    //================= MULTIPLE DELETE END=================//

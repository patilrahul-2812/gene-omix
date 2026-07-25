<script type="text/javascript">
    $(document).on('change', 'body .inputFileUpload',function(){

        var this_obj = $(this);
        var save_folder = $(this).attr("save_folder");
        var input_file_key = $(this).attr("input_file_key");
        var form_class = $(this).attr("form_class");

        var formData = new FormData($('.'+form_class)[0]);

        formData.append("save_folder", save_folder);
        formData.append("input_file_key", input_file_key);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                this_obj.parent().parent().parent().find(".progress-bar").width("0%");
                this_obj.parent().parent().parent().find(".progress-bar").text("0%");
                this_obj.parent().parent().parent().find(".progress").show();
            },
        });

        $.ajax({
            type: "POST",
            url: "{{ route('upload_single_image') }}",
            data:formData,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            dataType: 'json',
            processData: false,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        this_obj.parent().parent().parent().find(".progress-bar").width(percentComplete+"%");
                        this_obj.parent().parent().parent().find(".progress-bar").text(parseInt(percentComplete)+"%");
                    }
                }, false);
                return xhr;
            },
            success: function(data){
                if (data.status==true)
                {
                    this_obj.parent().parent().parent().find(".progress").hide();
                    this_obj.parent().parent().parent().find(".watter_image").attr("src", data.display_filename);
                    this_obj.parent().parent().parent().find(".hidden_filename").val(data.filename);
                    this_obj.parent().parent().parent().find(".hidden_delete_filename").val(data.filename);
                    this_obj.parent().parent().parent().find(".file_error").text("");
                    this_obj.parent().parent().parent().find(".remove_image").show();
                    return false;
                }
                else
                {
                    this_obj.parent().parent().parent().find(".progress").hide();
                    this_obj.parent().parent().parent().find(".file_error").text(data.message);
                    this_obj.parent().parent().parent().find(".watter_image").attr("src", data.display_filename);
                    this_obj.parent().parent().parent().find(".hidden_filename").val("");
                    this_obj.parent().parent().parent().find(".hidden_delete_filename").val("");
                    this_obj.parent().parent().parent().find(".remove_image").hide();
                    this_obj.parent().parent().parent().find(".inputFileUpload").val("");
                    return false;
                }
            },
        });
    });

    $(".remove_image").click(function(){

        var imgTable = $(this).closest('table.image-table');

        var form_class = $(this).attr("form_class");

        var formData = new FormData($('.'+form_class)[0]);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                imgTable.find(".progress-bar").width("0%");
                imgTable.find(".progress-bar").text("0%");
                imgTable.find(".progress").show();
            },
        });

        $.ajax({
            type: "POST",
            url: "{{ route('remove_single_image') }}",
            data:formData,
            mimeTypes:"multipart/form-data",
            contentType: false,
            cache: false,
            dataType: 'json',
            processData: false,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        imgTable.find(".progress-bar").width(percentComplete+"%");
                        imgTable.find(".progress-bar").text(parseInt(percentComplete)+"%");
                    }
                }, false);
                return xhr;
            },
            success: function(data){
                if (data.status==true)
                {
                    imgTable.find(".progress").hide();
                    imgTable.find(".file_error").text("");
                    imgTable.find(".watter_image").attr("src", data.display_filename);
                    imgTable.find(".hidden_filename").val("");
                    imgTable.find(".hidden_delete_filename").val("");
                    imgTable.find(".remove_image").hide();
                    imgTable.find(".inputFileUpload").val("");
                }
            },
        });
    });
</script>
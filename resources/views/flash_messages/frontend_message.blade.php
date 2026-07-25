    @if ($success_message = Session::get('success_message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ $success_message }}
        </div>
    @endif

    @if ($error_message = Session::get('error_message'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ $error_message }}
        </div>
    @endif

    <script type="text/javascript">
        var SUCCESS_MESSAGE = `<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    FLASH_MESSAGE
                                </div>`;
        var ERROR_MESSAGE = `<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ $error_message }}
                            </div>`;
    </script>
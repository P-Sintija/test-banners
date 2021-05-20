let status = false

Dropzone.options.dropzone =
    {
        autoProcessQueue: true,
        maxFilesize: 12,
        acceptedFiles: ".jpg,.png,.gif",
        timeout: 5000,

        success: function () {
            status = true
        },
        error: function () {
            status = false
        }
    }

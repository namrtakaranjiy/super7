"use strict"
window.onload = function() {
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: filebrowserUploadUrl,
        filebrowserUploadMethod: 'form'

    });
};
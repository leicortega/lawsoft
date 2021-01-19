$(function() {
    "use strict";
    // summernote editor
    $('.summernote').summernote({
        lang: 'es-ES',
        height: 280,
        focus: true,
        onpaste: function() {
            alert('You have pasted something to the editor');
        }
    });

    $('.inline-editor').summernote({
        airMode: true
    });

});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#form_enviar_respuesta').submit(function () {
    $('#btn_enviar_respuesta').html('<span class="spinner-border spinner-border-sm"></span>');

    let content = $('.note-editable').html();

    $('#content').val(content);
});

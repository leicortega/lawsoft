$('#buscar').keypress(function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        event.preventDefault(); 
        document.location.href = '/buscar/'+$('#buscar').val()
    }
});

$('#buscar1').keypress(function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        event.preventDefault(); 
        document.location.href = '/buscar/'+$('#buscar1').val()
    }
});
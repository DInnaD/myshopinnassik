$('#currency').change(function(){
    window.location = 'currency/?curr=' + $(this).val();
});
$('#fname, #lname, #bplace, #ano ,#phoneno, #emailid ,#pwd').bind('keyup', function() {
    if(allFilled()) $('#register').removeAttr('disabled');
});

function allFilled() {
    var filled = true;
    $('body input').each(function() {
        if($(this).val() == '') filled = false;
    });
    return filled;
}
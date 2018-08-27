// JavaScript Document for admin page
$(document).ready(function (e) {

    //delete Method
    $(".deletor").click(function () {
        var id = $(this).parent().parent().parent().children('.editor-overlay').children('.editor').children('.edit-form').children('.id').val();
        $.post("config/provider.php",
            {
                tag: "deletor",
                id: id
            },
            function (data, status) {
                location.reload();
            });
    });

    //add new  Method
    $(".adder").click(function () {
        $(this).parent().children('.editor-overlay').show();
    });

    //editor Method
    $('.editorr').on('click', function () {
        $(this).parent().parent().parent().children('.editor-overlay').show();
    });

    //close editor
    jQuery('.close-editor').click(function () {
        jQuery('.editor-overlay').hide();
    });

    jQuery('.close-editor').mouseenter(function () {
        jQuery(this).stop(true, true).animate({width: 35, height: 35}, {"duration": 100}, "linear");
    });

    jQuery('.close-editor').mouseleave(function () {
        jQuery(this).stop(true, true).animate({width: 30, height: 30}, {"duration": 100}, "linear");
    });


});
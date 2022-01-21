$(document).ready(function () {
    //check the kind of file selected and prompt if it isn't accepted
    $("input[type='file']").change(function (e) {
        const ext = this.value.match(/\.([^\.]+)$/)[1];
        switch (ext) {
            case 'jpg':
            case 'bmp':
            case 'png':
            case 'jpeg':
            case 'webp':
            case 'gif':
            case 'pdf':
                break;
            default:
                alert('The file type you selected is not allowed. Please, select an image (.jpg, .png, .jpeg, .webp, .bmp, .gif) or PDF file');
                this.value = '';
        }
    });

    $("#yesUploadImage").click(function () {
        $("#upload").show('slow');
    });

    $("#noImageUpload").click(function () {
        $("#upload").hide('slow');
    });

    $("#logout").click(function (event) {
        event.preventDefault();
        $("#logout-form").submit();
    })

    $('#inside-sidebar-toggle').click(
        function () {
            //alert(screen.width);

            if (screen.width > 560) {
                $('.inside-hidden-nav').css("max-width", "40%");
                $('#inside-sidebar-toggle').removeClass('hide-hidden-nav');
                $('#inside-sidebar-toggle').addClass('show-hidden-nav');
            } else {
                $('.inside-hidden-nav').css("max-width", "100%");
                $('#inside-sidebar-toggle').removeClass('hide-hidden-nav');
                $('#inside-sidebar-toggle').addClass('show-hidden-nav');
            }

        }
    );

    $('#inside-hide-nav').click(
        function () {
            $('.inside-hidden-nav').css("max-width", "0%");
            $('#inside-hide-nav').removeClass('show-hidden-nav');
            $('#inside-hide-nav').addClass('hide-hidden-nav');
        }
    );
});

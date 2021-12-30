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
});

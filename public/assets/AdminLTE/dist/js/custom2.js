$(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
        //var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        //input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload2').attr('src', e.target.result);
                //$('#imgInp').attr('value', e.target.result);
                $('#imageAfter').attr('value', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
//id de la imagen para visalizar <image>
    $("#imgInp2").change(function(){
        readURL(this);
    });
});
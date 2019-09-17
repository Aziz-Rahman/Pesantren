/*============== Custom admin for load js ===================*/           

$(function() {

    // METIS MENU 
    $('#main-menu').metisMenu();

    // LOAD APPROPRIATE MENU BAR ON SIZE SCREEN
    $(window).bind("load resize", function () {
        if ($(this).width() < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    });

    // EDITOR TINYEMCE
    tinymce.init({
        selector: ".my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste imagetools"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });

    // //sumernote
    // $('#my-editor').summernote({
    //     height: 250,                 // set editor height
    //     minHeight: null,             // set minimum height of editor
    //     maxHeight: null,             // set maximum height of editor
    //     focus: false,                 // set focus to editable area after initializing summernote
    // });

    // tinymce.init({
    //     selector: "textarea"
    // });

    $(window).load(function() {
        // Justyfied with colorbox
        // $('#data-gallery').justifiedGallery({
        //     lastRow : 'justify', 
        //     rowHeight : 70, 
        //     captions : false,
        //     rel : 'gallery1',
        //     margins : 1
        // }).on('jg.complete', function () {
        //     $(this).find('a').colorbox({
        //         maxWidth : '80%',
        //         maxHeight : '80%',
        //         previous : "previous",
        //         next : "next",
        //         opacity : 0.8,
        //         transition : 'elastic',
        //         current : ''
        //     });
        // });
    })

     // Edit/Update status santri
    $('.update-status-santri').on('click', function(){
        var no_register = $(this).prop("value");
        var stts_santri = $('#stts_santri'+no_register).val();

        if ( stts_santri == '' ) {
            alert('Status santri tidak boleh kosong !');
        } else {

            var data_updt = "stts_santri="+stts_santri;
                
            $.ajax({
                type: "POST",
                url: "update-status-santri.php?id="+no_register,
                data: data_updt,
                    success: function(response){
                        location.reload();
                       // $("#info-update").html(response);
                       console.log(response);
                    },

                    error: function(jqXHR, status, error) {
                        console.log( "Sorry, there was a problem!" );  
                    }
            }); // END: ajax
            return false;
        } // END: check data
    });

    //Pretty Photo
    // $("a[rel^='prettyPhoto']").prettyPhoto({
    //     social_tools: false
    // });

    // Data table
    $('#my-dataTables').dataTable();

});
      
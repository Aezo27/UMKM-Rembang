$().ready(function(){
    $sidebar = $('.sidebar');
    $sidebar_img_container = $sidebar.find('.sidebar-background');

    $full_page = $('.full-page');

    $sidebar_responsive = $('body > .navbar-collapse');

    window_width = $(window).width();

    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

    if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
        if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
            $('.fixed-plugin .dropdown').addClass('open');
        }

    }

    $('.fixed-plugin a').click(function(event){
      // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if($(this).hasClass('switch-trigger')){
            if(event.stopPropagation){
                event.stopPropagation();
            }
            else if(window.event){
               window.event.cancelBubble = true;
            }
        }
    });

    if($sidebar.length != 0){
        $sidebar.attr('data-active-color','green');
    }

    if($sidebar_responsive.length != 0){
        $sidebar_responsive.attr('data-color','green');
    }

    /*//////////////////////////////////////////////////////////////////
    [ Skleton loading effect ]*/
    $('#datatables').on('init.dt',function() {
        $("#datatables").removeClass('table-loader').show();
        });
    setTimeout(function(){
    $('#datatables').DataTable();
    }, 3000);

    // Tambah Review
    // Prepare the preview for profile picture
        $("#wizard-picture").change(function(){
            readURL(this);
        });

        $('.set-full-height').css('height', 'auto');

         //Function to show image before upload

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    // Select2 init
    $('.select2').select2({ width: '100%', placeholder: 'Cari...' 
    });

    /*//////////////////////////////////////////////////////////////////
    [ Unsaved Swal ]*/
    var unsaved = false;
    $('button[type="submit"]').on('click', function() {
        unsaved = false;
    });
    // Another way to bind the event
    $(window).bind('beforeunload', function() {
        if(unsaved){
            return 'Perubahan yang anda lakukan belum disimpan!';
        }
        if (CKEDITOR.currentInstance.checkDirty() === true) {
            return 'Perubahan yang anda lakukan belum disimpan!';
        }
    });

    // Monitor dynamic inputs
    $(document).on('change', ':input', function(){ //triggers change in all input fields including text type
        unsaved = true;
    });
});
/*//////////////////////////////////////////////////////////////////
[ Swal ]*/
const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                showCloseButton: true,
});

function swalModalConfirm(title, text, icon) {
    Swal.fire({
    title: title,
    text: text,
    icon: icon,
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#c8c8c8',
    confirmButtonText: 'Ya!',
    cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            alert('mantab bor!');
        }
    })
}
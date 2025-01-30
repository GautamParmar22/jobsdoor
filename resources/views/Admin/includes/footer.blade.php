<div class="container text-center py-3">
    <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
    <small class="copyright">  <i class="fas fa-copyright" style="color: #000000;"></i> {{date('Y')}} JobsDoor All Rights Reserved. </small>  
</div>
<script src="{{URL::asset('assets/admin/plugins/popper.min.js')}}"></script>
<script src="{{URL::asset('assets/admin/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Page Specific JS -->
<script src="{{URL::asset('assets/admin/js/app.js')}}"></script> 
<script src="{{URL::asset('assets/admin/js/datatables.min.js')}}"></script> 
<script src="{{URL::asset('assets/admin/js/toster.js')}}"></script><!-- Toster JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //Set sidebar menu active
        $('.nav.navbar-nav li a').each(function() {
            var CurrentUrl = document.URL;
            var CurrentUrlEnd = CurrentUrl.split('/').filter(Boolean).pop();
            var ThisUrl = $(this).attr('href');
            var ThisUrlEnd = ThisUrl.split('/').filter(Boolean).pop();
            if (ThisUrlEnd == CurrentUrlEnd) {
                $(this).closest('li').addClass('active');
                $(this).closest('ul').parent().addClass('active');
            }
        })
        toastr.options.timeOut = 2000;
        if ($('#success-msg').text() && $('#success-msg').text() != "") {
            toastr.success($('#success-msg').text());
        }
        if ($('#error-msg').text() && $('#error-msg').text() != "") {
            toastr.error($('#error-msg').text());
        }
    });
</script> 
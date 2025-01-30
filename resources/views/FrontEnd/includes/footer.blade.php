<div class="footer-top">
    <div class="container"></div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center"><span><a target="_blank" href="javascript:void(0);">© {{date('Y')}} JobsDoor. All Rights Reserved. </a></span></div>
        </div>
    </div>
</div>
<!-- <script src="{{URL::asset('assets/js/scripts.js')}}"></script> -->
<script src="{{URL::asset('assets/plugins/wow/wow.js')}}"></script><!-- WOW JS -->
<script src="{{URL::asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{URL::asset('assets/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script><!-- FORM JS -->
<script src="{{URL::asset('assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script><!-- FORM JS -->
<script src="{{URL::asset('assets/plugins/magnific-popup/magnific-popup.js')}}"></script><!-- MAGNIFIC POPUP JS -->
<script src="{{URL::asset('assets/plugins/counter/waypoints-min.js')}}"></script><!-- WAYPOINTS JS -->
<script src="{{URL::asset('assets/plugins/counter/counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script src="{{URL::asset('assets/plugins/imagesloaded/imagesloaded.js')}}"></script><!-- IMAGESLOADED -->
<script src="{{URL::asset('assets/plugins/masonry/masonry-3.1.4.js')}}"></script><!-- MASONRY -->
<script src="{{URL::asset('assets/plugins/masonry/masonry.filter.js')}}"></script><!-- MASONRY -->
<script src="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.js')}}"></script><!-- OWL SLIDER -->
<script src="{{URL::asset('assets/plugins/rangeslider/rangeslider.js')}}" ></script><!-- Rangeslider -->
<script src="{{URL::asset('assets/js/custom.js')}}"></script><!-- CUSTOM FUCTIONS  -->
<script src="{{URL::asset('assets/js/dz.carousel.js')}}"></script><!-- SORTCODE FUCTIONS  -->
<script src="{{URL::asset('assets/js/dz.ajax.js')}}"></script><!-- CONTACT JS  -->
<script src="{{URL::asset('assets/plugins/paroller/skrollr.min.js')}}"></script><!-- PAROLLER -->
<script src="{{URL::asset('assets/js/bootstrap-datepicker.js')}}"></script><!-- DATEPICKER JS  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script><!-- sweet alert JS  -->
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
        if ($('#success-msg').text() && $('#success-msg').text() != "") {
            toastr.success($('#success-msg').text());
        }
        if ($('#error-msg').text() && $('#error-msg').text() != "") {
            toastr.error($('#error-msg').text());
        }
    });
</script> 
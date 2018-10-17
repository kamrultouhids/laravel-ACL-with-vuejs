<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; {{ date("Y") }} <a class="text-bold-800 grey darken-2" href="http://google.com/"
                                                                                     target="_blank">Company Name </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
</footer>
<div id="loadingDiv"></div>

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>

<script src="{{ asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>

<script src="{{ asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>

<script src="{{ asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>

<script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>

<script src="{{ asset('app-assets/vendors/js/admin-toastr/toastr.min.js')}}"></script>

<script src="{{ asset('app-assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>

<script src="{{ asset('app-assets/vendors/js/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<script>

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    function active_menu(){
        $('a[href="' + current_url + '"]').parents('.nav-item').addClass('open');
        $('a[href="' + current_url + '"]').parent('li').addClass('active');
    }



</script>


{!! Toastr::message() !!}
@yield('custom_js')
<script>

</script>
</body>
</html>
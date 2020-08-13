    <!-- jquery
		============================================ -->
		<script src="{{ asset('webassets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('webassets/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('webassets/js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('webassets/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('webassets/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('webassets/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{ asset('webassets/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('webassets/js/jquery.scrollUp.min.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('webassets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{ asset('webassets/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{ asset('webassets/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{ asset('webassets/js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{ asset('webassets/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('webassets/js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{ asset('webassets/js/calendar/moment.min.js')}}"></script>
    <script src="{{ asset('webassets/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('webassets/js/calendar/fullcalendar-active.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('webassets/js/plugins.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('webassets/js/main.js')}}"></script>
    <!-- tawk chat JS
		============================================ -->
    <!-- <script src="{{ asset('webassets/js/tawk-chat.js')}}"></script> -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>

    <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@yield('scripts')

</body>

</html>
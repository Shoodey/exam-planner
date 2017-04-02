<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url('/') . mix('/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/jquery.slimscroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/fastclick.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>


<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>

<script>
//    $('#dataTable').DataTable({
//        "paging": true,
//        "lengthChange": true,
//        "searching": true,
//        "ordering": true,
//        "info": true,
//        "autoWidth": false
//    });
</script>
<script src="{{ asset(ispublicpath() .'plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset(ispublicpath() .'plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset(ispublicpath() .'plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script>
    $('#demo-dt-basic').dataTable({
        "responsive":true,
        "language":{
            "paginate":{
                "previous":'<i class="demo-psi-arrow-left"></i>',"next":'<i class="demo-psi-arrow-right"></i>'
            }
        }
    });
</script>
<script src="{{ asset(ispublicpath() .'js/form.js') }}"></script>

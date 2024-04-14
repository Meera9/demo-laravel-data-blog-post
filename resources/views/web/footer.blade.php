<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">&copy; <span
                id="currentYear"> </span> <a href="{{url('/')}}">Blogger</a></p></div>
</footer>

<script type="text/javascript">
        const currentYear = new Date().getFullYear();
        document.getElementById('currentYear').textContent = currentYear;
</script>

<script type="text/javascript">
    $(document).ready(function () {
        if ( document.getElementById('multiple-select-field') ) {
            $('#multiple-select-field').select2({
                theme: 'bootstrap-5'
            });
        }

        $('input[name="is_active"]').on('change', function () {
            if ( !this.checked ) {
                $(this).val('0');
            } else {
                $(this).val('1');
            }
        });
    });

</script>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<!-- Core theme JS-->
<script src="{{asset('web/js/index.js')}}"></script>

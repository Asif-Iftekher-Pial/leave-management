<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
<script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 





<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
    setTimeout(function() {
        $('#alert').slideUp();
    }, 5000);
</script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

<script>
function showSwal(mode, message) {
    const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
    });
    Toast.fire({
    icon: mode,
    title: message
    });
}

if ("{{ session('success') }}") showSwal('success', "{{ session('success') }}")
if ("{{ session('error') }}") showSwal('error', "{{ session('error') }}")
if ("{{ session('warning') }}") showSwal('warning', "{{ session('warning') }}")
</script>

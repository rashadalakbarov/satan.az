{{-- resources/views/components/alert.blade.php --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
            @if(isset($type) && $type === 'adminlte')
                // Admin panelde Toasts
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Təbriklər!',
                    autohide: true,
                    delay: 4000,
                    body: @json(session('success')),
                    width: 500
                });
            @else
                // Site tarafında SweetAlert2
                Swal.fire({
                    icon: 'success',
                    title: 'Təbriklər!',
                    text: @json(session('success')),
                    timer: 4000,
                    showConfirmButton: false
                });
            @endif
        @endif

        @if(session('error'))
            @if(isset($type) && $type === 'adminlte')
                // Admin panelde Toasts
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Oops!',
                    autohide: true,
                    delay: 4000,
                    body: @json(session('error')),
                    width: 500
                });
            @else
                // Site tarafında SweetAlert2
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: @json(session('error')),
                    timer: 4000,
                    showConfirmButton: false
                });
            @endif
        @endif
    });
</script>

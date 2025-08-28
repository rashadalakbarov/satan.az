<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(Session::has('success'))
            $(document).Toasts('create', {
                class: 'bg-success',
                title: 'Təbriklər!',
                autohide: true,
                delay: 4000,
                body: @json(session('success')),
                width: 500
            });
        @endif

        @if(Session::has('error'))
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Oops!',
                autohide: true,
                delay: 4000,
                body: @json(session('error')),
                width: 500
            });
        @endif
    });
</script>

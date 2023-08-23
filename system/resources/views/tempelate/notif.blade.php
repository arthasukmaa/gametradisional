@foreach (['success', 'danger', 'warning', 'info'] as $status)
    @if (session($status))
    <div  class="alert alert-{{ $status }} alert-dismissible fade show" role="alert">
        @if ($status == 'success')
            <i class="mdi mdi-check-all me-2"></i>
            @else
            <i class="mdi mdi-alert-circle-outline me-2"></i>
        @endif
        
        {{ session($status) }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script src="{{ url('public') }}/assets/assets/libs/jquery/dist/jquery.min.js"></script>
    <script>
        setTimeout(() => {
            $('.alert').hide().slow();
        }, 2000);
    </script>
    @endif
@endforeach
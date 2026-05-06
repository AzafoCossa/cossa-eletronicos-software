
<div>
    @if (session('order-placed'))
        <div class="alert alert-success">
            {{ session('order-placed') }}
        </div>
    @endif
</div>
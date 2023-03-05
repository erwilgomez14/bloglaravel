<div class="alert alert-{{$tipo}} alert-dismissible" role="alert">
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    <h4 class="alert-heading">Blog</h4>

    <p>
        @if (session($mensaje))
        
            {{$mensaje}}
        @endif
    </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

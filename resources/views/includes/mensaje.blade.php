@if(session("mensaje"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Blog</strong> 
    <ul>
            <li>{{ session("mensaje") }}</li>
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>    
@endif

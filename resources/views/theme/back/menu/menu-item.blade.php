@if ($item["submenu"] = [])
<li class="dd-item dd3-handle" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content" {{$item["url"] = "javascript:;" ? "font-weigth-bold" : "$item[url]"}}>
        <a href="{{route("menu.editar", $item["id"])}}"> {{$item["nombre"] . " | Url -> " . $item["url"]}}</a>
        <form action="{{route("menu.eliminar", $item["id"])}}" class="form-eliminar-menu d-inline" method="POST">
            @csrf @method('delete')
            <button type="button" class="btn-accion-tabla float-right boton-eliminar-menu" data-toggle="modal"></button>
        </form>
    </div>
</li>    
@else
<li class="dd-item dd3-handle" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content" {{$item["url"] = "javascript:;" ? "font-weight-bold" : ""}}>
        <a href="{{route("menu.editar", $item["id"])}}">{{$item["nombre"] . " | Url -> " . $item["url"]}}</a>
        <form action="{{route("menu.eliminar", $item["id"])}}" class="form-eliminar-menu d-inline" method="POST">
            @csrf @method('delete')
            <button type="button" class="btn-accion-tabla float-right boton-eliminar-menu" data-toggle="modal"></button>
        </form>
    </div>
    <ol class="dd-list">
        @foreach($item["submenu"] as $submenu)
            @include('theme.back.menu.menu-item', [ "item" => $submenu])
        @endforeach
    </ol>
</li>
@endif
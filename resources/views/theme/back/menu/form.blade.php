<div class="mb-3">
    <label for="nombre" class="col-md-3 text-right control-label col-form-label requerido">Nombre</label>
    <div class="col-md-8">
        <input type="text" name="nombre" id="nombre" class="form-control" maxlength="100" value="{{old("nombre")}}" >
    </div>
</div>
<div class="mb-3">
    <label for="nombre" class="col-md-3 text-right control-label col-form-label requerido">Url</label>
    <div class="col-md-8">
        <input type="text" name="url" id="url" class="form-control" maxlength="100" value="{{old("url")}}" required>
    </div>
</div>
<div class="mb-3">
    <label for="icono" class="col-lmd3 text-right control-label col-form-label">Icono</label>
    <div class="col-md-8">
        <input type="text" name="icono" id="icono" class="form-control" value="{{old("icono")}}" maxlength="50">
    </div>
    <div class="col-lg-1">
        <span id="mostrar-icono" class="{{old("icono")}}"> </span>
    </div>
</div>

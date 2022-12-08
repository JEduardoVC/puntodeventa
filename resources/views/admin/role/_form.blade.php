<div class="form-group">
    <label for="name">Nombre </label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
</div>
<div class="form-group">
    <label for="guard_name">Nombre a guardar </label>
    <input type="text" name="guard_name" id="guard_name" class="form-control" placeholder="Nombre a guardar" required>
</div>

<h3>Permisos especiales</h3>
<div class="form-group">
    <label>{!! Form::radio("special","all-access") !!}Acceso total</label>
    <label>{!! Form::radio("special","no-access") !!}Sin acceso</label>
</div>

<h3>Listado de permisos</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($permissions as $permission)
        <li>
            <label>
                {!! Form::checkbox("permissions[]",$permission->id, null) !!}
                {{$permission->description}}
            </label>
        </li>
        @endforeach
    </ul>
</div>

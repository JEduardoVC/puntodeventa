<div class="form-group">
    <label for="name">Nombre </label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
</div>
<div class="form-group">
    <label for="email">Email </label>
    <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
</div>
<div class="form-group">
    <label for="passwprd">Contraseña </label>
    <input type="password" name="passwprd" id="passwprd" class="form-control" placeholder="Contraseña" required>
</div>
<h3>Listado de roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($roles as $role)
        <li>
            <label>
                {!! Form::checkbox("roles[]",$role->id, null) !!}
                {{$role->name}}
            </label>
        </li>
        @endforeach
    </ul>
</div>

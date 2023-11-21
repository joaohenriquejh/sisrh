<div class="col-md-6">
    <label for="name" class="form-label">Usuário</label>
    <input type="name" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}" @if ($modo == 'show') readonly @endif>
</div>

<div class="col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password"
        {{ !isset($user->password) ? 'required' : '' }} required @if ($modo == 'show') readonly @endif>
</div>

<div class="col-md-6">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}" required @if($modo == 'show') readonly @endif>
</div>

@can('type-user')
    <div class="col-md-6">
        <label for="tipo" class="form-label">Tipo</label>
        <select name="tipo" id="tipo" class="form-select" required @if ($modo == 'show') disabled @endif>
            <option value="">--</option>
            <option value="admin" {{ isset($user->tipo) && $user->tipo == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="usuario" {{ isset($user->tipo) && $user->tipo == 'usuario' ? 'selected' : '' }}>Usuário</option>
        </select>
    </div>
@endcan

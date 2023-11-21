<div class="col-md-6">
    <label for="descricao" class="form-label">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $beneficio->descricao ?? '' }}" @if($modo == 'show') readonly @endif>
</div>

<div class="col-md-6">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-select" @if($modo == 'show') disabled @endif>
        <option value="on" @if (isset($beneficio->status)) @selected($beneficio->status == "on") @endif>on</option>
        <option value="off" @if (isset($beneficio->status)) @selected($beneficio->status == "off") @endif>off</option>
    </select>
</div>

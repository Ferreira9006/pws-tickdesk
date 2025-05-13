@extends('admin.index')
@section('content')

<div class="card mb-6">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-ballot"></i></span>
      Ver Nível de Suporte
    </p>
  </header>
  <div class="card-content">
    <div class="field">
        <label class="label">Nome</label>
        <div class="control">
            <input 
            class="input" 
            type="text" 
            name="name" 
            placeholder="Exemplo: problemas com a impressora" 
            value="{{ $level->name }}"
            disabled>
        </div>
    </div>
    <div class="field">
        <label class="label">Estado</label>
        <div class="control">
            <div class="select">
            <select name="status" value="{{ $level->status }}" disabled>
                <option value="">Selecione o estado</option>
                <option value="active" {{ $level->status == 'active'? 'selected' : '' }} >Ativo</option>
                <option value="inactive" {{ $level->status == 'inactive'? 'selected' : '' }}>Inativo</option>
            </select>
            </div>
        </div>
    </div>

    <div class="field grouped">
    <div class="control">
        <a href="{{ route('level.index') }}" type="submit" class="button green">
        Voltar
        </a>
    </div>
    </div>
  </div>
</div>

@endsection
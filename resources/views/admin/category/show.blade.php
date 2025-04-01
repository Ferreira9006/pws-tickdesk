@extends('admin.index')
@section('content')

<div class="card mb-6">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-ballot"></i></span>
      Ver Categoria
    </p>
  </header>
  <div class="card-content">
    <div class="field">
        <label class="label">Nome</label>
        <div class="control">
            <input 
            class="input" 
            type="text" 
            name="categoryName" 
            placeholder="Exemplo: problemas com a impressora" 
            value="{{ $category->name }}"
            disabled>
        </div>
    </div>
    <div class="field">
        <label class="label">Estado</label>
        <div class="control">
            <div class="select">
            <select name="categoryStatus" value="{{ $category->status }}" disabled>
                <option value="">Selecione o estado</option>
                <option value="active" {{ $category->status == 'active'? 'selected' : '' }} >Ativo</option>
                <option value="inactive" {{ $category->status == 'inactive'? 'selected' : '' }}>Inativo</option>
            </select>
            </div>
        </div>
    </div>

    <div class="field grouped">
    <div class="control">
        <a href="{{ route('admin.category.index') }}" type="submit" class="button green">
        Voltar
        </a>
    </div>
    </div>
  </div>
</div>

@endsection
@extends('admin.index')
@section('content')

<div class="card mb-6">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-ballot"></i></span>
      Inserir Categoria
    </p>
  </header>
  <div class="card-content">
    <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
      @csrf
      @method('PUT')
      <div class="field">
        <label class="label">Nome</label>
        <div class="control">
          <input class="input" type="text" name="categoryName" value="{{ $category->name }}" required>
        </div>
      </div>
      <div class="field">
        <label class="label">Estado</label>
        <div class="control">
          <div class="select">
            <select name="categoryStatus" required>
              <option value="">Selecione o estado</option>
              <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Ativo</option>
              <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inativo</option>
            </select>
          </div>
        </div>
      </div>

      <div class="field grouped">
        <div class="control">
          <button type="submit" class="button green">
            Submit
          </button>
        </div>
        <div class="control">
          <button type="reset" class="button red">
            Reset
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
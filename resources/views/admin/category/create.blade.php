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
    <form method="post" action="{{ route('admin.category.store') }}">
      @csrf
      <div class="field">
        <label class="label">Nome</label>
        <div class="control">
          <input class="input" type="text" name="categoryName" placeholder="Exemplo: problemas com a impressora">
        </div>
      </div>
      <div class="field">
        <label class="label">Estado</label>
        <div class="control">
          <div class="select">
            <select name="categoryStatus">
              <option value="active">Ativo</option>
              <option value="inactive">Inativo</option>
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

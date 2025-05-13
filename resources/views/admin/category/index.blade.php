@extends('admin.index')

@section('content')
  <a href="{{ route('category.create') }}" class="crmb-4 button blue">Nova Categoria</a>
  
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
        Categorias
      </p>
      <a href="{{ route('category.index') }}" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-content">
      <table>
        <thead>
        <tr>
          <th>Name</th>
          <th>Status</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <td data-label="Name">{{ $category->name }}</td>
            <td data-label="Status">{{ ucfirst($category->status) }}</td>
            <td data-label="Created">
              <small class="text-gray-500" title="Oct 25, 2021">{{ $category->created_at }}</small>
            </td>
            <td data-label="Updated">
              <small class="text-gray-500" title="Oct 25, 2021">{{ $category->updated_at }}</small>
            </td>
            <td class="actions-cell">
              <div class="buttons right nowrap">

                <a href="{{ route('category.show', $category->id) }}" class="button small blue --jb-modal" data-target="update-modal" type="button">
                  <span class="icon"><i class="mdi mdi-eye"></i></span>
                </a>
                <a href="{{ route('category.edit', $category->id) }}" class="button small blue --jb-modal" type="button">
                  <span class="icon"><i class="mdi mdi-pencil"></i></span>
                </a>
                <button class="button small red --jb-modal" data-target="delete-modal" type="button">
                  <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="table-pagination">
        <div class="flex items-center justify-between">
          <div class="buttons">
            <button type="button" class="button active">1</button>
          </div>
          <small>Page 1 of 1</small>
        </div>
      </div>
    </div>
  </div>
  
  <div id="delete-modal" class="modal">
    <div class="modal-background --jb-modal-close"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Aviso</p>
      </header>
      <section class="modal-card-body">
        <p>Tem a certeza que pretende <b>eliminar</b> esta categoria?</p>
        <p>Esta ação não é reversível.</p>
      </section>
      <footer class="modal-card-foot">
        <button class="button --jb-modal-close">Cancelar</button>
        @isset($category)
          <form action="{{ route('category.destroy', $category->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="button blue --jb-modal-close">Confirmar</button>
          </form>
        @endisset
      </footer>
    </div>
  </div>

@endsection
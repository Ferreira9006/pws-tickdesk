@extends('admin.index')

@section('content')
  <a href="{{ route('admin.category.create') }}" class="crmb-4 button blue">Nova Categoria</a>
  
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
        Categorias
      </p>
      <a href="{{ route('admin.category.index') }}" class="card-header-icon">
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
                <button class="button small blue --jb-modal" data-target="update-modal" type="button">
                  <span class="icon"><i class="mdi mdi-eye"></i></span>
                </button>
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

  <!--<div id="update-modal" class="modal">
    <div class="modal-background --jb-modal-close"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Sample modal</p>
      </header>
      <section class="modal-card-body">
        <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
        <p>This is sample modal</p>
      </section>
      <footer class="modal-card-foot">
        <button class="button --jb-modal-close">Cancel</button>
        <button class="button red --jb-modal-close">Confirm</button>
      </footer>
    </div>
  </div> -->
  
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
        <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
          @csrf
          @method('DELETE')
        <button class="button blue --jb-modal-close">Confirmar</button>
        </form>
      </footer>
    </div>
  </div>

@endsection
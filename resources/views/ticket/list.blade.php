@extends('welcome')
@section('content')
<div class="card mb-6">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-ballot"></i></span>
      Listar Tickets
    </p>
  </header>
  <div class="card-content">
    @if($errors->any())
      <div class="notification red">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
          <div>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    @endif

    <table>
        <thead>
        <tr>
          <th>Title</th>
          <th>Status</th>
          <th>Category</th>
          <th>Level</th>
          <th>Priority</th>
          <th>Created</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($tickets as $ticket)
          <tr>
            <td data-label="Name">{{ $ticket->title }}</td>
            <td data-label="Status">{{ $ticket->status }}</td>
            <td data-label="Category">{{ $ticket->category->name }}</td>
            <td data-label="Level">{{ $ticket->level->name }}</td>
            <td data-label="Priority">{{ $ticket->priority->name }}</td>
            <td data-label="Created">
              <small class="text-gray-500" title="Oct 25, 2021">{{ $ticket->created_at }}</small>
            </td>
            <td class="actions-cell">
              <div class="buttons right nowrap">

                <a href="" class="button blue" type="button">
                  <span class="icon">Abrir</span>
                </a>
                <a href="" class="button blue" type="button">
                  <span class="icon">Editar</span>
                </a>
                <button class="button red" type="button">
                  <span class="icon">Eliminar</span>
                </button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>

@endsection
@extends('welcome')
@section('content')
<div class="card mb-6">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-ballot"></i></span>
      Novo Ticket
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

    <form method="POST" action="{{ route('ticket.store') }}">
      @csrf
      <div class="field">
        <label class="label">Title</label>
        <div class="control">
          <input class="input" type="text" name="title" placeholder="Title" required>
        </div>
      </div>

      <div class="field">
        <label class="label">Description</label>
        <div class="control">
          <textarea class="textarea" name="description" placeholder="Description" required></textarea>
        </div>
      </div>

      <div class="field">
        <label class="label">Priority</label>
        <div class="control">
          <div class="select">
            <select name="priority_id" required>
              <option value="">Select priority</option>
              @foreach ($priorities as $priority)
                <option value="{{ $priority->id }}">{{ $priority->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="field">
        <label class="label">Category</label>
        <div class="control">
          <div class="select">
            <select name="category_id" required>
              <option value="">Select Category</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="field">
        <label class="label">Level</label>
        <div class="control">
          <div class="select">
            <select name="level_id" required>
              <option value="">Select Level</option>
              @foreach ($levels as $level)
                <option value="{{ $level->id }}">{{ $level->name }}</option>
              @endforeach
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
@extends('layouts.parent')

@section('title', 'TodoList')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">To Do List {{ Auth::user()->name }}</h5>


            {{-- button modal create To Do List --}}
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#createModalTodo">
                Add To Do List
                <i class="bi bi-plus"></i>
            </button>

            @include('todo.modal-create')
            {{-- <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>title</th>
                        <th>Description</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($todo as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->dateline }}</td>
                            <td>
                                @if ($row->status == 'TODO')
                                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                        TODO</span>
                                @elseif ($row->status == 'In Progress')
                                    <span class="badge bg-info text-dark"><i class="bi bi-exclamation-triangle me-1"></i> In
                                        Progress</span>
                                @elseif ($row->status == 'Pandding')
                                    <span class="badge bg-danger"><i class="bi bi-info-circle me-1"></i> Pandding</span>
                                @else
                                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                        TODO</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('todo.update', $row->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex">
                                        <div class="col-sm-8">
                                            <select class="form-select" aria-label="Default select example" name="status">
                                                <option selected>Select Status</option>
                                                <option value="TODO">TODO</option>
                                                <option value="In Progress">In Progress</option>
                                                <option value="Pandding">Pandding</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i
                                                class="bi bi-person-check-fill"></i></button>
                                    </div>
                                </form>
                                <form action="{{ route('todo.destroy', $row->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger mt-3"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center"> Data is Empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table> --}}
        </div>
    </div>

    @forelse ($todo as $row)
    <div class="">
        <div class="col-lg-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><span class="fw-bold text-primary-emphasis">{{ $loop->iteration }}</span>.{{ $row->title }}</h5>
                    <p class="card-text">{{ $row->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        @if ($row->status == 'TODO')
                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                TODO</span>
                        @elseif ($row->status == 'In Progress')
                            <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> In
                                Progress</span>
                        @elseif ($row->status == 'Pandding')
                            <span class="badge bg-danger"><i class="bi bi-exclamation-triangle me-1"></i> Pandding</span>
                        @else
                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                TODO</span>
                        @endif
                    </li>
                    <li class="list-group-item"><span class="badge bg-warning text-dark"><i class="bi bi-info-circle me-1"></i>
                        {{ $row->dateline }}</span></li>
                </ul>
                <div class="card-body">
                    <form action="{{ route('todo.update', $row->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="d-flex">
                            <div class="col-sm-8">
                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option selected>Select Status</option>
                                    <option value="TODO">TODO</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Pandding">Pandding</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-person-check-fill"></i></button>
                        </div>
                    </form>
                    <form action="{{ route('todo.destroy', $row->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger mt-3"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
        <div>
            <p class="text-center"> Data is Empty</p>
        </div>
    @endforelse

@endsection

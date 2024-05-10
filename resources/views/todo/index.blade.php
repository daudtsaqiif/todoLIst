@extends('layouts.parent')

@section('title', 'TodoList')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">To Do List</h5>


            {{-- button modal create To Do List --}}
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#createModalTodo">
                Add To Do List
                <i class="bi bi-plus"></i>
            </button>

            @include('todo.modal-create')

            <table class="table">
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
                            @if ($row->status == 'Todo')
                            <td><span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> {{ $row->status }}</span> </td>
                            @elseif ($row->status == 'Pandding')
                            <td><span class="badge bg-danger text-dark"><i class="bi bi-exclamation-triangle me-1"></i> {{ $row->status }}</span> </td>
                            @else
                            <td> <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> {{ $row->status }}</span> </td>
                            @endif
                            
                            <td>
                                @if ($row->status == 'Todo' || 'In Progress')
                                <form action="{{ route('todo.update', $row->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                        <button class="btn btn-warning">
                                            Do Now
                                        </button>
                                </form>
                                @elseif ($row->status == 'In Progress')
                                <form action="{{ route('todo.update', $row->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                        <button class="btn btn-warning">
                                            Do later
                                        </button>
                                        <form action="{{ route('todo.destroy', $row->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-success" type="submit">
                                                <i class="bi bi-check2-all"></i>
                                            </button>
                                        </form>
                                </form>
                                @else
                                <form action="{{ route('todo.update', $row->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                        <button class="btn btn-warning">
                                            Do Now
                                        </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center"> Data is Empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection

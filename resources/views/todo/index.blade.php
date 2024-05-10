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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($todo as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                @if ($row->status == 'Todo')
                                    <form action="{{ route('todo.update', $row->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        @if ($row->status == 'Todo')
                                            <button class="btn btn-warning">
                                                Do Now
                                            </button>
                                        @else
                                            <button class="btn btn-danger">
                                                Do it later
                                            </button>
                                        @endif
                                    </form>
                                @else
                                    <form action="{{ route('todo.update', $row->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        @if ($row->status == 'Todo')
                                            <button class="btn btn-warning">
                                                Do Now
                                            </button>
                                        @else
                                            <button class="btn btn-danger">
                                                Do it later
                                            </button>
                                        @endif
                                    </form>

                                    <form action="{{ route('todo.destroy', $row->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-success" type="submit">
                                            <i class="bi bi-check2-all"></i>
                                        </button>
                                    </form>
                                @endif

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center"> Data is Empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection

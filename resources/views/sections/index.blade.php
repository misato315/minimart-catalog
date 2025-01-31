@extends('layouts.app')

@section('title', 'Sections')

@section('content')
<main class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="fw-light mb-3 text-center">Sections</h1>

            <!-- Form -->
            <div class="mb-3">
                <form action="{{route('section.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row gx-2">
                        <div class="col">
                            <input type="text" name="name" class="form-control" placeholder="Create a task" max="50" required autofocus>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="btn_add" class="btn btn-primary w-100 fw-bold">
                                <i class="fa-solid fa-plus"></i> Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Table -->
            <table class="table table-hover table-sm align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($all_sections as $section)
                    <tr>
                        <td>{{$section->id}}</td>
                        <td>{{$section->name}}</td>
                        <td>
                            {{-- モーダルにする！ --}}
                            <form action="{{route('section.destroy',$section->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="btn_delete" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

    
@endsection
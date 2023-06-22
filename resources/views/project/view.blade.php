@extends('layouts.app')

@section('content')
    <div class="container mt-4 ">
        <div class="row justify-content-center mt-5 ">
            <div class="col-md-12 ">
                <div class="card shadow">
                    <div class="card-header">
                        <span class="fw-bold text-dark mt-1 fs-3">Project View</span>
                        <a class="btn btn-success float-end" href="/home">Back</a>
                    </div>

                    @if (Auth::user()->id == $project->user_id)
                        <div class="card m-2 p-2">
                            <form action="{{ url('project-update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $project->id }}">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Project Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                        value="{{ $project->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Project Description</label>
                                    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3">{{ $project->text }}</textarea>
                                </div>
                                <button class="btn btn-success float-end" type="submit">
                                    <ion-icon name="checkmark-done-sharp"></ion-icon> Save
                                </button>
                            </form>
                        </div>
                        <div class="card m-2 p-2">
                            <form action="" method="GET">
                                @csrf
                                <input type="hidden" name="id" value="{{ $project->id }}">
                                <label for="exampleFormControlInput1" class="form-label">Add Admin</label>
                                <div class="mb-3 d-flex">
                                    <input type="text" name="" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Admin Name">
                                    <button class="btn btn-success" type="submit">
                                        <ion-icon name="person-add"></ion-icon>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="m-2 p-2">
                            <form action="{{ url('/del-project') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $project->id }}">
                                <button class="btn btn-danger float-end" type="submit">
                                    <ion-icon name="trash-outline"></ion-icon> Delete
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="card m-2 p-2">
                            <input type="hidden" name="id" value="{{ $project->id }}">
                            <div class="mb-3">
                                <h4 class="fw-bold">{{ $project->name }}</h4>
                            </div>
                            <div class="mb-3">
                                <p class="fw-lighter ">{{ $project->text }}</p>
                            </div>
                        </div>
                    @endif

                    <div class="card m-2 p-2">
                        <label for="exampleFormControlInput1" class="form-label">Comment!</label>
                        <form action="{{ url('projects', $project->id) }}/comments" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $project->id }}">
                            <div class="mb-3 d-flex">
                                <input type="text" name="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Comment...">
                                <button class="btn btn-success" type="submit">
                                    <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                                </button>
                            </div>
                        </form>
                        <div class="">
                            @foreach ($comments as $comment)
                                @if (Auth::user()->id == $comment->user_id)
                                    <div class="d-flex mb-1">
                                        <form action="{{ url('comments-update') }}" method="POST" class="w-100">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $project->id }}">
                                            <div class="d-flex">
                                                <input type="text" name="text" class="form-control w-100"
                                                    value="{{ $comment->text }}">
                                                <button class="btn btn-warning" type="submit">
                                                    <ion-icon name="checkmark-done-circle-outline"></ion-icon>
                                                </button>
                                            </div>
                                        </form>

                                        <form action="{{ url('comment-delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $comment->id }}">
                                            <button class="btn btn-danger w-100" type="submit">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <label for="" class="border p-2 rounded mb-1 form-control">
                                        ✉️
                                        <span>
                                            {{ $comment->text }}
                                        </span>
                                    </label>
                                @endif
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection

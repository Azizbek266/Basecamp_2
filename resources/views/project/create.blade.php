@extends('layouts.app')

@section('content')
    <div class="container mt-4 " >
        <div class="row justify-content-center mt-5 ">
            <div class="col-md-12 ">
                <div class="card shadow">
                    <div class="card-header">
                        <span class="fw-bold text-dark mt-1 fs-3">Creater Project</span>
                        <a class="btn btn-success float-end" href="/home">Back</a>
                    </div>
                    
                    <div class="card m-2 p-2">
                        <form action="{{ route('project.store')}}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Project Name</label>
                                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Project Name">
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Project Description</label>
                                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3" placeholder="Project Description"></textarea>
                              </div>
                              <button type="submit" class="btn btn-success float-end"><ion-icon name="checkmark-done-sharp"></ion-icon></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
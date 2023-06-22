@extends('layouts.app')

@section('content')
    <div class="container mt-5 " >
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card shadow">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif  
                        <h5 class="fw-bold text-dark" style="color: #000; font-weight:900;">All Project</h5>
                    </div>
                    
                    <div class="overflow-scroll">
                        @foreach ($project as $item)
                        <a href={{'project/'.$item->id}} class="text-decoration-none">
                            <div class="card m-2 p-2">
                                <h5 class="fw-bolder" style="color: #000; font-weight:900;">{{$item->name}}</h4>
                                <span class="float-start" style="color: #1b1b1b; font-weight:100; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;width: 95%;">{{$item->text}}</span>
                                <div class="d-flex justify-content-end">
                                    <a href={{'project/'.$item->id}} class="btn btn-outline-success pt-2"><ion-icon name="eye-outline"></ion-icon></a> 
                                </div>
                            </div> 
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection

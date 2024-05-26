@extends('front.layouts.app')

@section('main')


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Add Subject</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subjects.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Add</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

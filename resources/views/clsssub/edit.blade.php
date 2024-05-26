@extends('front.layouts.app')

@section('main')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Class</h2>
                <form action="{{ route('clsssub.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('front.layouts.app')

@section('main')


   <section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Class</h2>
                <form action="{{ route('clsssub.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
  <br>
   </section>
@endsection

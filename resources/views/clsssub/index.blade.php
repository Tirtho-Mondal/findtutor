@extends('front.layouts.app')

@section('main')


<section class="section-3 py-5 bg-2 ">

<div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h2>Class</h2>
                    <a href="{{ route('clsssub.create') }}" class="btn btn-primary">Add </a>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        {{-- <td>{{ $category->id }}</td> --}}
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('clsssub.show', $category->id) }}" class="btn btn-info">Show</a>
                                                <a href="{{ route('clsssub.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('clsssub.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
    
</div>

</section>







@endsection













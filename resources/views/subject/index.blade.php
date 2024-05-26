@extends('front.layouts.app')

@section('main')


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Subjects</h2>
                <a href="{{ route('subjects.create') }}" class="btn btn-success mb-2">Add Subject</a>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <tr>
                       
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($jobTypes as $jobType)
                        <tr>
                          
                            <td>{{ $jobType->name }}</td>
                            <td>
                                <form action="{{ route('subjects.destroy', $jobType->id) }}" method="POST">
                                    {{-- <a href="{{ route('subject.show', $jobType->id) }}" class="btn btn-info">Show</a> --}}
                                    <a href="{{ route('subjects.edit', $jobType->id) }}" class="btn btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

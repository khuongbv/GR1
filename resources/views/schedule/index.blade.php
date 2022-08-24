@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 margin-tb">
            <div class="pull-left">
                <h2>
                    <a href="{{ route('schedule.index') }}">Schedule</a>
                </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('schedule.create') }}" title="Create a product"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
        <div class="col-lg-4 margin-tb">
            <form action="{{ route('schedule.filter') }}" method="POST" style="display: flex;">
                @csrf
                <input class="date form-control" type="text" name="filterTime" placeholder="Time">
                <button type="submit" style=" background-color:transparent;">
                    Filter
                </button>
            </form>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th style="max-width: 500px; word-wrap: break-word;">Title</th>
            <th>Time</th>
            <th>Actions</th>
        </tr>
        @foreach ($schedules as $schedule)
            <tr>
                <td style="max-width: 500px; word-wrap: break-word;">{{ $schedule->title }}</td>
                <td>{{ Carbon\Carbon::parse($schedule->time)->format('Y-m-d') }}</td>
                <td>
                    <form action="{{ route('schedule.destroy',$schedule->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('schedule.edit',$schedule->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $schedules->links() !!}

@endsection
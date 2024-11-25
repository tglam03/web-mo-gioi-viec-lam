@extends('layout.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Info</th>
                        <th>Role</th>
                        <th>Position</th>
                        <th>City</th>
                        <th>Company</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $each)
                        <tr>
                            <td>
                                <a href="{{ route("admin.$table.show", $each) }}">
                                    {{ $each->id}}
                                </a>
                            <td>
                                <img src="{{ $each->avatar }}" width="100px">
                            </td>
                            <td>
                                {{ $each->name }} - {{ $each->gender_name }}
                                <br>
                                <a href="sendmail:{{ $each->email }}">
                                    {{ $each->email }}
                                </a><br>
                                <a href="tel:{{ $each->phone }}">
                                    {{ $each->phone }}
                                </a>
                            </td>
                            <td>
                                {{--                                {{ $each->role_name }}--}}
                                @if($each->role == '0')
                                    <span class="badge badge-primary">ADMIN</span>
                                @elseif($each->role == '2' && $each->role != '0')
                                    <span class="badge badge-info">HR</span>
                                @else
                                    <span class="badge badge-success">APPLICANT</span>
                                @endif
                            </td>
                            <td>
                                {{ $each->position }}
                            </td>
                            <td>
                                {{ $each->city }}
                            </td> <td>
                                {{ optional($each->company)->name }}
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <nav>
                    <ul class="pagination pagination-rounded mb-0">
                        {{ $data->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

@endsection

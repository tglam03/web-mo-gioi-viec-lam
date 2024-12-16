@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12">
            {{-- star filter --}}
            <div class="card-body">
                <form class="form-inline" id="form-filter">
                    <div class="form-group">
                        <label for="role"> Role </label>
                        <div class="col-3">
                            <select class="form-control select-filter" id="role" name="role">
                                <option selected>All</option>
                                @foreach ($roles as $role => $value)
                                    <option value="{{ $value }}" @if ((string) $value == $selectedRole) selected @endif>
                                        {{ $role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city"> City </label>
                        <div class="col-3">
                            <select class="form-control select-filter" id="city" name="city">
                                <option selected>All</option>
                                @foreach ($cities as $city)
                                    <option @if ($city == $selectedCity) selected @endif>
                                        {{ $city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company"> Company </label>
                        <div class="col-3">
                            <select class="form-control select-filter" id="company" name="company">
                                <option selected>All</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @if ($company->id == $selectedCompany) selected @endif>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            {{-- end filter --}}
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
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $each)
                            <tr>
                                <td>
                                    <a href="{{ route("admin.$table.show", $each) }}">
                                        {{ $each->id }}
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
                                    {{ $each->role_name }}
                                    {{-- @if ($each->role == '0')
                                        <span class="badge badge-primary">ADMIN</span>
                                    @elseif($each->role == '2' && $each->role != '0')
                                        <span class="badge badge-info">HR</span>
                                    @else
                                        <span class="badge badge-success">APPLICANT</span>
                                    @endif --}}
                                </td>
                                <td>
                                    {{ $each->position }}
                                </td>
                                <td>
                                    {{ $each->city }}
                                </td>
                                <td>
                                    {{ optional($each->company)->name }}
                                </td>
                                <td>
                                    <form action="{{ route("admin.$table.destroy", $each) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Chắc chắn muốn xóa không?')"
                                            class="btn btn-danger">Delete</button>
                                    </form>
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

@push('js')
    <script>
        $(document).ready(function() {
            $(".select-filter").change(function() {
                $("#form-filter").submit();
            });
        });
    </script>
@endpush

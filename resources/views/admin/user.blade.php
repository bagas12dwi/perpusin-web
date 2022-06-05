@extends('layout.admin-layout')

@section('konten')
    <a href="/add-admin" class="btn btn-custom mb-3">Tambahkan Admin</a>

    @if ($userId == '')
        @include('components.widget.empty')
    @else
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td style="vertical-align: middle">{{ $item->username }}</td>
                        <td style="vertical-align: middle">{{ $item->email }}</td>
                        <td style="vertical-align: middle">{{ $item->role_string }}</td>
                        <td style="vertical-align: middle">{{ $item->status }}</td>
                        <td style="vertical-align: middle; width: 10%">
                            @if ($item->status_user == 0)
                                <form action="/aktif" method="post">
                                    @csrf
                                    <input type="hidden" class="form-control" value="{{ $item->id }}" id="id"
                                        name="id">
                                    <button type="submit" class="btn btn-custom">Aktifkan</button>
                                </form>
                            @else
                                <form action="/nonAktif" method="post">
                                    @csrf
                                    <input type="hidden" class="form-control" value="{{ $item->id }}" id="id"
                                        name="id">
                                    <button type="submit" class="btn btn-custom">Suspend</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

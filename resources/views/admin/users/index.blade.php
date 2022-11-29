@extends('layouts.admin')

<div class = "container mt-5">
  <h2 class="text-center">Users</h2>
  <a class="btn btn-success" href="{{ route('admin.users.create') }}">Create</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Roles</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>
              @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                  {{ $v }}
                @endforeach
              @endif
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
</div>
</div>

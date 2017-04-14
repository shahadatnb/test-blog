@extends('layouts.master')
@section('title',' | All User')
@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>All Post</h1>
			<table class="table">
				<thead>
					<tr>
						<th>Namre</th>
						<th>Email</th>
						<th>User</th>
						<th>User</th>
						<th>Author</th>
						<th>Admin</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
				<form action="{{ route('admin-assign') }}" method="post">
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
						<td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
						<td><input type="checkbox" {{ $user->hasRole('Author') ? 'checked' : '' }} name="role_author"></td>
						<td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
						{{ csrf_field() }}
						<td><button class="btn btn-primary" type="submit">Assign Role</button></td>
					</tr>
				</form>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection
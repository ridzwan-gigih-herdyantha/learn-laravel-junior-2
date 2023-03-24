@extends('layouts.main')
@section('content')
<table class="table">
    <thead class="table-dark table-striped">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $categories as $category )
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>
            <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
        </td>
        </tr>
        @endforeach
      </tbody>
</table>
@endsection
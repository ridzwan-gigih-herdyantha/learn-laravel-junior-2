@extends('layouts.main')
@section('content')
{{-- @dd($city); --}}
<table class="table">
    <thead class="table-dark table-striped">
        <div class="button btn-lg mb-3 bg-success text-white d-flex w-auto justify-start">
            <a href="/city-export" class="text-white">Export Excel</a>
        </div>
        <form action="/city-import" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file">
            <input type="submit" value="import">
        </form>
        <tr>
          <th scope="col">#</th>
          <th scope="col">City</th>
          <th scope="col">Country</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $cities as $city )
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>
            <a>{{ $city->name }}</a>
        </td>
          <td>
            <a>{{ $city->country->name }}</a>
        </td>
        </tr>
        @endforeach
      </tbody>
</table>
@endsection
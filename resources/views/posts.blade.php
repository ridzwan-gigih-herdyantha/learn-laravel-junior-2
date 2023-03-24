@extends('layouts.main')
@section('content')
<table class="table">
    <thead class="table-dark table-striped">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Excerpt</th>
          <th scope="col">Body</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $posts as $post )
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>
            <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
        </td>
          <td>{{ strip_tags(\Illuminate\Support\Str::limit($post->excerpt, 50)) }} </td>
          <td>{{ strip_tags(\Illuminate\Support\Str::limit($post->body, 120)) }}</td>
        </tr>
        @endforeach
      </tbody>
</table>
@endsection
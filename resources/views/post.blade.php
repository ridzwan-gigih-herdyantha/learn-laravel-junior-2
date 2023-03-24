@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $post->title }}
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>{!! $post->body !!}</p>
        <footer class="blockquote-footer mt-2"><a class="text-decoration-none " href="/posts"> Back to Posts </a></cite></footer>
      </blockquote>
    </div>
  </div>
</div>
</div>
</div>

@endsection
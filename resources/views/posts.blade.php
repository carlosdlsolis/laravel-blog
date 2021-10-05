@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card my-4">
                <div class="card-header">

                    <!-- Titulo de Tarjeta -->
                    <h5 class="card-title">{{ $post->title}}</h5>
                </div>

                <!-- Imagen en tarjeta -->
                <div class="card-body">
                    @if($post->iframe)
                    <div class="embed-responsive embed-responsive-16by9">
                    {!! $post->iframe !!}
                    </div>
                    @elseif ($post->image )
                    <img src="{{ $post->get_image}}" class="card-img-top">
                    @endif

                    <!-- texto de la tarjeta -->
                    <p class="card-text">
                        {{$post -> get_excerpt}}
                        <a href="{{ route('post', $post)}}"> Leer mas...</a>
                    </p>

                    <!-- Informacion usuario en tarjeta -->
                    <p class="text-muted mb-0">
                        <em>
                            &ndash; {{$post->user->name}}
                        </em>
                        {{$post->created_at->format('d M Y')}}
                    </p>
                </div>
            </div>
            @endforeach
            {{ $posts -> links()}}
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')
<div class="container mt-5">
    <h1>{{ $project->name }}</h1>
    <a href="{{route('admin.projects.index')}}" class="btn btn-outline-primary mt-3"><i class="fa-solid fa-arrow-left"></i> Torna alla lista</a>
    <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-outline-primary mt-3"><i class="fa-solid fa-pencil text-warning"></i> Modifica</a>
    <hr>
    <div class="row g-5 mt-3">

        
        @if ($project->cover_image)
        <div class="col-3">
            <img src="{{ asset('/storage/' . $project->cover_image) }}" class="img-fluid">
        </div>
        @else
        <img class="w-25" src="https://placehold.co/400">  
        @endif
       


        <div class="col-8">
            
            <div class="row">
                    <div class="col-6">
                        <p>
                            <strong>Tec</strong>
                            {!! $project->getTecBadge() !!}
                        </p>
                    </div>
                    <div class="col-6">
                        <p>
                            <strong>Categoria</strong>
                            {!! $project->getTypeBadge() !!}
                        </p>
                    </div>
            
            
                    <div class="col-6">
                        <p>
                            <strong>Slug</strong>
                            {{ $project->slug }}
                        </p>
                    </div>
            
                    <div class="col-6">
                        <p>
                            <strong>Created at</strong>
                            {{ $project->created_at }}
                        </p>
                    </div>
            
                    <div class="col-6">
                        <p>
                            <strong>Updated at</strong>
                            {{ $project->updated_at }}
                        </p>
                    </div>
                </div>
        </div>



        <div class="col-12">
            <p>
                <strong>Content</strong>
                {{ $project->content }}
            </p>
        </div>

  </div>

</div>
@endsection
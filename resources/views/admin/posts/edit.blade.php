@extends('layouts.app')

@section('content')
    <div class="container">

      <h1>Modifica il Post!</h1>
{{-- 
      @if ($errors->any())
        @foreach ($errors->all() as $error )
          <li>{{ $error }}</li>
        @endforeach
      @endif --}}

      <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Titolo</label>
          <input type="text"
          value="{{ old('title', $post->title) }}"
          name="title"
          class="form-control
          @error('title') is-invalid @enderror"
          id="title" placeholder="Titolo">
           @error('title')
             <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
          <label for="content" class="form-label">Contenuto</label>
          <textarea name="content" 
            class="form-control
            @error('content') is-invalid @enderror" 
            id="content" placeholder="Contenuto">{{ old('content', $post->content) }}
          </textarea>
          @error('content')
             <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
          <select name="category_id" id="category">
            @foreach ($categories as $category )

              <option  @if( old('category_id', $post->category_id) == $category->id ) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
              
            @endforeach
          </select>
        </div>
        @foreach ($tags as $tag)
          <input type="checkbox" name="tags[]" 
          id="tag{{ $loop->iteration }}"
          value="{{ $tag->id }}">
          <label class="mr-3" for="tag{{ $loop->iteration }}">{{ $tag->name }}</label>
        @endforeach
        <button type="submit" class="btn btn-primary d-block">Invia</button>
      </form>

      
       



    </div>

@endsection
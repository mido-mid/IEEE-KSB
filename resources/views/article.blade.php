@extends('layouts.user_layout')


@section('content')
    <div class="sub-header">
      <div class="text-box">
        <h1 class="heading-primary">

        @if($year == null)
          Articles
        @else
          Articles in {{$year}}
        @endif

        </h1>
        <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus natus sed quisquam impedit aut doloremque unde a distinctio, ipsum ex.</p>
      </div>
    </div>
  </header>
  <!-- header end -->
  <main>
    <section class="section-articles">
      <div class="container">
        <div class="row mx-5">
          <form id="articleform" action="{{route('articles')}}" method="POST" >

          @csrf
            <select id="filterdate" name="article_date" class="custom-select filter-input ml-auto">
              <option selected>Filter by year</option>
              <option value="0">All Articles</option>
              <option value="2020">2020</option>
              <option value="2019">2019</option>
              <option value="2018">2018</option>
            </select>
          </form>
        </div>
      @if(count($articles) > 0)
        <div class="row">
        @foreach($articles as $article)
          <div class="col-lg-4 col-md-12">
            <div class="card">
            @if($article->photo)
                <img src="{{ asset('images') }}/{{$article->photo->filename}}" style="width:100%;height:170px;" class="card-img-top" alt="Image of the work">
              @else
                <img src="{{ asset('images') }}/footer-img.png" style="width:100%;height:170px;" class="card-img-top" alt="Image of the work">
              @endif
              <div class="card-body">
                <h3 class="card-title">{{ \Str::limit($article->title,10) }}</h3>
                <p class="card-text paragraph">{{ \Str::limit($article->description, 100) }}</p>
                <a href="{{$article->link}}" class="button button-1 my-3"><i class="fas fa-external-link-alt mr-3"></i>read more</a>
                <p class="card-text text-right"><small class="text-muted">{{$article->date}}</small></p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      @else
        <p class="lead text-center"> No articles found</p>
      @endif
        <div class="card-footer py-4">
          <nav class="d-flex justify-content-end" aria-label="...">
            {{ $articles->links() }}
          </nav>
        </div>
      </div>
    </section>
  </main>
  @endsection

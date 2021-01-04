@extends('layouts.user_layout')


@section('content')
    @include('includes.home_picture')
    <main>
    <section class="section-who-we-are">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-12">
            <div class="text-box u-padding-top-huge">
              <h2 class="heading-secondary u-margin-bottom-huge">who we are?</h2>
              <p class="paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum fugiat quis omnis, voluptates et doloremque quaerat possimus architecto vitae quas!</p>
              <a href="{{route('about')}}" class="button button-1 u-padding-top-huge">read more</a>
            </div>
          </div>
          <div class="col-lg-7 col-md-12">
            <img src="{{ asset('images') }}/desktop-about-img.png" alt="The team" class="img-fluid">
          </div>
        </div>
      </div>
    </section>

    <section class="section-last-works">
      <div class="container">
        <div class="row u-padding-bottom-big">
          <div class="col-lg-12">
            <div class="d-flex justify-content-between">
            <h2 class="heading-secondary">last works</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-12">
            <div class="card">
              <img src="{{ asset('images') }}/footer-img.png" class="card-img-top" alt="Image of the work">
              <div class="card-body p-5">
                <h3 class="card-title"><i class="fas fa-map-marker-alt mr-3 icon"></i>kafr elsheikh, academia</h3>
                <p class="card-text paragraph">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">23/06/2020</small></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="card">
              <img src="{{ asset('images') }}/footer-img.png" class="card-img-top" alt="Image of the work">
              <div class="card-body p-5">
                <h3 class="card-title"><i class="fas fa-map-marker-alt mr-3 icon"></i>kafr elsheikh, academia</h3>
                <p class="card-text paragraph">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">23/06/2020</small></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="card">
              <img src="{{ asset('images') }}/footer-img.png" class="card-img-top" alt="Image of the work">
              <div class="card-body">
                <h3 class="card-title"><i class="fas fa-map-marker-alt mr-3 icon"></i>kafr elsheikh, academia</h3>
                <p class="card-text paragraph">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">23/06/2020</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-last-articles">
      <div class="container">
        <div class="row u-padding-bottom-big">
          <div class="col-lg-12">
            <div class="d-flex justify-content-between">
            <h2 class="heading-secondary">last articles</h2>
            <a href="{{route('articles')}}" class="button button-1">see all</a>
            </div>
          </div>
        </div>
        <div class="row">
        @foreach($articles as $article)
          <div class="col-lg-4 col-md-12">
            <div class="card">
            @if($article->photo)
              <img style="width:100%;height:180px;" src="{{ asset('images') }}/{{$article->photo->filename}}" class="card-img-top" alt="Image of the work">
            @else
              <img style="width:100%;height:180px;" src="{{ asset('images') }}/footer-img.png" class="card-img-top" alt="Image of the work">
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
      </div>
    </section>


    <section class="section-volunteers">
        <div class="container">
          <div class="row u-padding-bottom-big">
            <div class="col-lg-12">
              <div class="d-flex justify-content-between">
              <h2 class="heading-secondary">Our Web Development Team</h2>
              <a href="{{route('volunteers')}}" class="button button-1">see all</a>
              </div>
            </div>
          </div>
          <div class="row">
          @foreach($volunteers as $volunteer)
            <div class="col-lg-4 col-md-12">
              @if($volunteer->photo)
              <div class="volunteer-img-container volunteer-img-container-1" style="background-image: url('{{ asset('images') }}/{{$volunteer->photo->filename}}');">
              @else
              <div class="volunteer-img-container volunteer-img-container-1">
              @endif
                <div class="text-box-container">
                  <div class="text-box"><span class="volunteer-name">{{$volunteer->eng_name}}</span><span class="volunteer-job">{{$volunteer->role->name}}</span></div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
        </div>
    </section>
  </main>
@endsection

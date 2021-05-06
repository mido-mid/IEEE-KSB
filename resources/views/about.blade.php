@extends('layouts.user_layout')


@section('content')
<div class="sub-header">
      <div class="text-box">
        <h1 class="heading-primary">about us</h1>
        <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus natus sed quisquam impedit aut doloremque unde a distinctio, ipsum ex.</p>
      </div>
    </div>
  </header>
  <!-- header end -->

  <main>
    <section class="section-about-us">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="text-box text-center">
              <h2 class="heading-secondary pb-5">IEEE Global</h2>
              <p class="paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita modi, rem odio autem quisquam accusantium dolorem quo nisi vel laborum? Dignissimos unde voluptatem id, tempore qui animi quibusdam eveniet dolores?</p>
            </div>
          </div>
        </div>
      <div class="row">
          <div class="col-12">
              <div class="text-box text-center">
                  <h2 class="heading-secondary pb-5">IEEE Egypt Section</h2>
                  <p class="paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita modi, rem odio autem quisquam accusantium dolorem quo nisi vel laborum? Dignissimos unde voluptatem id, tempore qui animi quibusdam eveniet dolores?</p>
              </div>
          </div>
      </div>
        <div class="row">
          <div class="col-12">
            <div class="text-box text-center">
              <h2 class="heading-secondary pb-5">IEEE ksb</h2>
              <p class="paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita modi, rem odio autem quisquam accusantium dolorem quo nisi vel laborum? Dignissimos unde voluptatem id, tempore qui animi quibusdam eveniet dolores?</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="d-flex justify-content-center">
              <a href="{{ route('volunteers') }}" class="button button-1">get to know our tem</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-vision-mission">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="d-flex justify-content-center">
              <img src="{{ asset('images') }}/vision.png" class="w-25 d-block" alt="">
            </div>
          </div>
          <div class="col-12 pt-5">
            <div class="text-box">
              <h2 class="heading-secondary pb-5 text-center">vision</h2>
              <p class="paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam illo perspiciatis, cum quam nam iusto laborum natus aspernatur hic perferendis! Eius porro autem cumque exercitationem veritatis optio molestias architecto laboriosam? Iusto repudiandae ad, nostrum corporis soluta itaque animi id natus.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="d-flex justify-content-center">
              <img src="{{ asset('images') }}/mission-1.png" class="w-25 d-block" alt="">
            </div>
          </div>
          <div class="col-12 pt-5">
            <div class="text-box">
              <h2 class="heading-secondary pb-5 text-center">mission</h2>
              <p class="paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam illo perspiciatis, cum quam nam iusto laborum natus aspernatur hic perferendis! Eius porro autem cumque exercitationem veritatis optio molestias architecto laboriosam? Iusto repudiandae ad, nostrum corporis soluta itaque animi id natus.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="about-ieee">
      <div class="container">
          <div class="text-box">
              <h2 class="heading-secondary pb-5 text-center">High Board</h2>
          </div>
        @if(count($volunteers) > 0)
            <div class="row">
                @foreach($volunteers as $volunteer)
                    <div class="col-lg-3 col-md-12">
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

        @else
            <p class="lead text-center"> No volunteers found</p>
        @endif
      </div>
    </section>
  </main>



@endsection

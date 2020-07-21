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
              <h2 class="heading-secondary pb-5">who we are?</h2>
              <p class="paragraph">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita modi, rem odio autem quisquam accusantium dolorem quo nisi vel laborum? Dignissimos unde voluptatem id, tempore qui animi quibusdam eveniet dolores?</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="text-box text-center">
              <h2 class="heading-secondary pb-5">what do we do?</h2>
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
              <img src="{{ asset('images') }}/12.jpg" class="w-25 d-block" alt="">
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
        <div class="row">
          <div class="col-lg-4">
            <img src="{{ asset('images') }}/volunteer-1.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-sm-5">
            <div class="text-box">
              <p class="paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic molestiae culpa vitae veritatis aspernatur, minus illum non asperiores et sapiente odit eveniet similique, ad sint sed nobis aperiam quam accusantium fugiat enim numquam, voluptas cupiditate? Iure, corporis dolorem! Inventore vitae minus earum dolorem. Dicta, corporis exercitationem. Corrupti qui modi </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>



@endsection
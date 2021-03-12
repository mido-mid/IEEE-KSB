@extends('layouts.user_layout')


@section('content')
    <div class="sub-header">
      <div class="text-box">
        <h1 class="heading-primary">our awesome team</h1>
        <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus natus sed quisquam impedit aut doloremque unde a distinctio, ipsum ex.</p>
      </div>
    </div>
  </header>
  <!-- header end -->
  <main>
    <section class="section-our-team">
      <div class="container">
      @if(count($volunteers) > 0)
        <div class="row">
        @foreach($volunteers as $volunteer)
            <div class="col-lg-4 col-md-12" style="margin-bottom: 15px;margin-top: 15px;">
              <div class="card">
              @if($volunteer->photo)
                <img src="{{ asset('images') }}/{{$volunteer->photo->filename}}" style="width:100%;height:170px;" class="card-img-top" alt="Image of the work">
              @else
                <img src="{{ asset('images') }}/footer-img.png" style="width:100%;height:170px;" class="card-img-top" alt="Image of the work">
              @endif
                <div class="card-body">
                  <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header" id="memberOne">
                        <h3 class="mb-0">
                          <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#{{$volunteer->id}}" aria-expanded="true" aria-controls="collapseMemberOne">
                            <div class="d-flex justify-content-between">
                              <div>
                                <span class="member-name d-block text-capitalize">{{$volunteer->eng_name}}</span>
                                <span class="member-role text-capitalize d-block">{{$volunteer->role->name}}</span>
                              </div>
                              <i class="fas fa-sort-down arrow-icon"></i>
                            </div>
                          </button>
                        </h3>
                      </div>

                      <div id="{{$volunteer->id}}" class="collapse" aria-labelledby="memberOne" data-parent="#accordionExample">
                        <div class="card-body">
                          <a href="{{$volunteer->linkedin}}" target="_blank" class="d-block member-link"><i class="fab fa-linkedin-in pr-3"></i>{{$volunteer->linkedin}}</a>
                          <a href="#" class="member-link"><i class="fab fa-google-plus-g pr-3"></i>{{$volunteer->gmail}}</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
        @else
          <p class="lead text-center"> No volunteers found</p>
        @endif
        <div class="card-footer py-4">
            <nav class="d-flex justify-content-end" aria-label="...">
                {{ $volunteers->links() }}
            </nav>
          </div>
      </div>
    </section>
  </main>






  @endsection

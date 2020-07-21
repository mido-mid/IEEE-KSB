



@if(count($user_courses) > 0)

    <div id="carousel-with-lb" class="carousel slide carousel-multi-item" data-interval="false" data-ride="carousel">

        <a class="btn-floating btn-primary left-arrow" href="#carousel-with-lb" data-slide="prev"><i
            class="fas fa-chevron-left"></i></a>
        <a class="btn-floating btn-primary right-arrow" href="#carousel-with-lb" data-slide="next"><i
            class="fas fa-chevron-right"></i></a>

        <div class="carousel-inner mdb-lightbox" role="listbox">
            <div id="mdb-lightbox-ui"></div>

            <div class="course-header">
                    <h3>Resume Learning</h3>
                    <a href="{{ route('mycourses') }}">My courses</a>
                    <div class="clearfix"></div>
            </div>

            @foreach($user_courses as $course)
            <div class="course carousel-item <?php if($loop->first) echo 'active'; ?>">
            
                <div class="row">
                    <div class="col-sm-4 offset-sm-2">
                        <figure class="col-md-4 d-md-inline-block">
                                @if($course->photo)
                                <a href="{{ $url }}/courses/{{ $course->slug }}"><img src="{{ asset('images') }}/{{$course->photo->filename}}" alt="Course Photo"></a>
                                @else
                                <a href="{{ $url }}/courses/{{ $course->slug }}"><img  src="{{ asset('images') }}/default.jpg" alt="Course Photo"></a>
                                @endif
                            </a>
                        </figure>
                    </div>

                    <div class="col-sm-4">
                        <h3><a href="{{ $url }}/courses/{{ $course->slug }}">{{ \Str::limit($course->title, 25) }}</a></h3>
                        <h4>Track: <a href="{{ $url }}/tracks/{{$course->track->name}}">{{ $course->track->name }}</a></h4>
                        <h5>{{ count($course->users) }} users are learning this course</h5>
                    </div>


                </div>

            </div>

            @endforeach
        
        </div>
        
    </div>
@endif

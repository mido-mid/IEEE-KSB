
        
         <div class="container">

                <div class="famous_courses">


                    <?php $i = 0; ?>
                    @foreach($tracks as $track)
                        <h3 class="mb-0">
                            {{ $track->name }} Track
                        </h3>

                        <div class="row">
                            @foreach($track->courses()->limit(4)->get() as $course)
                                <div class="col-sm-3">
                                    <div class="card course">
                                        @if($course->photo)
                                        <a href="{{ $url }}/courses/{{ $course->slug }}"><img src="{{ asset('images') }}/{{$course->photo->filename}}" class="card-img-top" alt="Course Photo"></a>
                                        @else
                                        <a href="{{ $url }}/courses/{{ $course->slug }}"><img  src="{{ asset('images') }}/default.jpg" class="card-img-top" alt="Course Photo"></a>
                                        @endif
                                        <div class="card-body">
                                            <h6 class="card-title"><a href="{{ $url }}/courses/{{ $course->slug }}">{{ \Str::limit($course->title, 50) }}</a></h6>
                                            <span style="float:left;font-weight:bold" class="{{ $course->status == 0 ? 'text-success' : 'text-danger'}}">{{ $course->status == '0'? 'FREE' : 'PAID' }}</span>
                                            <span style="float:right">{{ count($course->users) }} users</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            
                        </div>

                        @if($i == 1)

                            <div class="famous_tracks">

                                <h4>Famous topics for you</h4>
                                <div class="tracks">

                                <ul class="list-unstyled">

                                    @foreach($famous_tracks as $track)
                                    

                                        <li><a  href="{{ $url }}/tracks/{{$track->name}}" class="btn track-name">{{ $track->name }}</a></li>


                                    
                                    @endforeach

                                    </ul>

                                </div>


                            </div>

                        @endif



                        @if($i == 2)

                            @auth

                                @if(count($recommended_courses) > 0)

                                    <div class="recommended_courses">

                                        <h4>Recomended courses for you :</h4>
                                        <div class="chosen_courses">

                                            @foreach($recommended_courses as $course)

                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="course_image">
                                                            @if($course->photo)
                                                            <a href="{{ $url }}/courses/{{ $course->slug }}"><img src="{{ asset('images') }}/{{$course->photo->filename}}" alt="Course Photo"></a>
                                                            @else
                                                            <a href="{{ $url }}/courses/{{ $course->slug }}"><img  src="{{ asset('images') }}/default.jpg" alt="Course Photo"></a>
                                                            @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm">
                                                    <div class="course_details">
                                                        <h3><a class="course_title" href="{{ $url }}/courses/{{ $course->slug }}">{{ \Str::limit($course->title, 30) }}</a></h3>
                                                        <span class="{{ $course->status == 0 ? 'text-success' : 'text-danger'}} status">{{ $course->status == '0'? 'FREE' : 'PAID' }}</span>
                                                        <span class="users_count">{{ count($course->users) }} users</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>


                                    </div>
                                @endif
                            @endauth

                        @endif
                    <?php $i++; ?>
                    @endforeach

                </div>


        </div>
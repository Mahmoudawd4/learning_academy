@extends('forent/layout/layout')
@section('title')
    catrgory
@endsection


@section('content')



   <!-- breadcrumb start-->
   <section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Our Courses</h2>
                    <p>Homepage<span>/</span>Courses</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->



  <!--::review_part start::-->
  <section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>popular courses</p>
                    <h2>Special Courses</h2>

                    <div class="input-group mt-5">
                        <input type="text" id="keyword" name="keyword" class="form-control" placeholder='Enter Course Name'
                            onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter Course Name'">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="allCourses">

            @foreach ($allCourses as $course)

            <div class="col-sm-6 col-lg-4 mb-5">


                <div class="single_special_cource">
                    <img src="{{asset('uploads/courses/'.$course->img)}}" class="special_img" alt="">
                    <div class="special_cource_text">
                    <a href="{{ route('front.cat',$course->category->id ) }}" class="btn_4">{{$course->category->name}}</a>
                        <h4>${{$course->price}}</h4>
                        <a href="{{ route('front.show',[$course->category->id ,$course->id] ) }}"><h3>{{$course->name}}</h3></a>
                        <p>{{$course->content}}</p>
                        <div class="author_info">
                            <div class="author_img">
                                <img src="{{asset('uploads/trainers/'.$course->trainer->img)}}" alt="">
                                <div class="author_info_text">
                                    <p>Conduct by:</p>
                                    <h5>{{$course->trainer->name}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            @endforeach





        </div>
    </div>
</section>
<!--::blog_part end::-->




@endsection


@section('script')

{{-- <script src="{{ asset('front/js/jquery-1.12.1.min.js') }}"></script> --}}

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


<script>
    $('#keyword').keyup(function () {
        let keyword = $(this).val()
        $('#allCourses').empty()

        $.ajax({
            type: "GET",
        url: "{{ url('/courses/search') }}" + "?keyword=" + keyword,
        contentType: false,
        processData: false,
        success: function (data)
        {
                $('#allCourses').empty()
                for (course of data)
                {
                    $('#allCourses').append(`

            <div class="col-sm-6 col-lg-4 mb-5">

                    <div class="single_special_cource">
                    <img src="{{asset('uploads/courses/${course.img}' )}}" class="special_img" alt="">
                    <div class="special_cource_text">
                    <a href="{{ url('/')}}cat/${course.category.id}" class="btn_4">${course.category.name}</a>
                        <h4>${course.price}</h4>
                        <a href="url('/')}}cat/${$course.category.id}/course/${$course.id}"><h3>${course.name}</h3></a>
                        <p>${course.content}</p>
                        <div class="author_info">
                            <div class="author_img">
                                <img src="{{ asset('uploads/trainers/${course.trainer.img}' )}}" alt="">
                                <div class="author_info_text">
                                    <p>Conduct by:</p>
                                    <h5>${course.trainer.name}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>


                    `);



                }

            }
        });

    });
</script>
@endsection

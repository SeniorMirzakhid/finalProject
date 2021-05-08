@extends('app')

@section('content')

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Trending Fantasy Films</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="{{ route('categories.index') }}?filter=trending_now" class="primary-btn">View
                                        All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{--                            TODO MAKE FOREACH MOVIE--}}
                            @foreach($trend_movies as $movie)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ $movie->poster_url }}">
                                            <div class="comment"><i class="fa fa-comments"></i> {{ $movie->rt_audience_score }}
                                            </div>
                                            <div class="view"><i class="fa fa-eye"></i>  {{ $movie->rt_score }}</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                               
                                            </ul>

                                            <h5><a href="#">{{ $movie->title }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Comedy movies with highest Rating</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a  href="{{ route('categories.index') }}?sort=rating" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{--                            TODO FOREACH MOVIE HERE TOO --}}
                            @foreach($popular_movies as $movie)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ $movie->poster_url }}">
                                            <div class="comment"><i class="fa fa-comments"></i> {{ $movie->rt_audience_score }}
                                            </div>
                                            <div class="view"><i class="fa fa-eye"></i>  {{ $movie->rt_score }}</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                               
                                            </ul>

                                            <h5><a href="#">{{ $movie->title }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    {{--                    todo make here movies--}}
                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Recently Family movies</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="{{ route('categories.index') }}?sort=release" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($recently_movies as $movie)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ $movie->poster_url }}">
                                            <div class="comment"><i class="fa fa-comments"></i> {{ $movie->rt_audience_score }}
                                            </div>
                                            <div class="view"><i class="fa fa-eye"></i>  {{ $movie->rt_score }}</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                               
                                            </ul>

                                            <h5><a href="#">{{ $movie->title }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                       <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Fantasy Disney Films</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="{{ route('categories.index') }}?filter=trending_now" class="primary-btn">View
                                        All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{--                            TODO MAKE FOREACH MOVIE--}}
                            @foreach($columbia_pictures as $movie)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ $movie->poster_url }}">
                                            <div class="comment"><i class="fa fa-comments"></i> {{ $movie->rt_audience_score }}
                                            </div>
                                            <div class="view"><i class="fa fa-eye"></i>  {{ $movie->rt_score }}</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                               
                                            </ul>

                                            <h5><a href="#">{{ $movie->title }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Top Views</h5>
                            </div>

                            <div class="filter__gallery">
                                @foreach($movies as $movie)
                                    <div class="product__sidebar__view__item set-bg mix day years"
                                         data-setbg="{{ $movie->poster_url }}">
                                        <div class="ep">10 / {{ $movie->rt_score }}</div>
                                        <div class="view"><i class="fa fa-eye"></i> ${{ $movie->worldwide_gross }}</div>
                                        <h5><a href="#">{{ $movie->title }}</a></h5>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection


@extends('app')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route("categories.index") }}">Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="product__page__filter">
                                        <p>Order by:</p>
                                        <form action="{{ route('categories.index') }}" method="get">
                                            <select name="sort" onchange="this.form.submit()">
                                                <option value="name">A-Z</option>
                                                <option value="year">Year</option>
                                                <option value="budget">Budget</option>
                                                <option value="rating">Descrease Rating</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($cat_movies as $movie)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ $movie->poster_url }}">
                                            <div class="ep">10 / {{ $movie->imdb_rating }}</div>
                                            <div class="comment"><i class="fa fa-comments"></i> {{ $movie->rt_audience_score }}</div>
                                            <div class="view"><i class="fa fa-eye"></i> {{ $movie->rating }}</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                @foreach($movie->categories as $category)
                                                    <li>{{ $category->title }}</li>
                                                @endforeach
                                            </ul>

                                            <h5><a href="#">{{ $movie->title }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $cat_movies->links() }}
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

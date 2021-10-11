<div>
    <!-- Begin Nav
================================================== -->
    <nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <!-- Begin Logo -->
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <img src="{{ asset('img/logo-dentos.png') }}" width="150px" height="200px" alt="logo">
            </a>
            <!-- End Logo -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Iniciar Session</a>
            </div>
        </div>
    </nav>
    <!-- End Nav
================================================== -->

    <!-- Begin Article
================================================== -->
    <div class="container">
        <div class="row justify-content-center">
            <!-- Begin Post -->
            <div class="col-md-8 col-xs-12 ">
                <div class="mainheading">

                    <!-- Begin Top Meta -->
                    <div class="row post-top-meta">
                        <div class="col-md-2">
                            <img class="author-thumb"
                                src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                alt="Sal">
                        </div>
                        <div class="col-md-10">
                            <a class="link-dark" href="author.html">{{ $blog->nombre }}</a>
                            <span class="author-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Ipsa aliquam ex qui voluptatum eum nemo necessitatibus corrupti delectus voluptatem
                                perspiciatis quam odio porro dignissimos at, saepe corporis doloribus, unde minus?
                                Voluptate, quasi! Veniam quis id et neque perferendis. Ipsum nisi illo dolorem magnam
                                nemo eius suscipit eos quod porro cum.</span>
                            <span class="post-date">{{ $blog->created_at }}</span><span
                                class="dot"></span>
                        </div>
                    </div>
                    <!-- End Top Menta -->

                    <h1 class="posttitle">{{ $blog->titulo }}</h1>

                </div>

                <!-- Begin Featured Image -->
                <img class="featured-image img-fluid" src="{{ $blog->imagen }}" alt="">
                <!-- End Featured Image -->

                <!-- Begin Post Content -->
                <div class="article-post">
                    <p>
                        {{ $blog->descripcion }}
                    </p>
                </div>
                <!-- End Post Content -->

                <!-- Begin Tags -->
                <div class="after-post-tags">
                    <ul class="tags">
                        <li><a href="#">{{ $blog->categoria->nombre }}</a></li>
                    </ul>
                </div>
                <!-- End Tags -->

            </div>
            <!-- End Post -->

        </div>
    </div>
    <!-- End Article
================================================== -->
</div>

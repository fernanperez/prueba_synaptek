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
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('img/logo-dentos.png') }}" width="100px" height="200px" alt="logo">
            </a>
            <!-- End Logo -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Iniciar Session</a>
            </div>
        </div>
    </nav>
    <!-- End Nav
    ================================================== -->

    <!-- Begin Site Title
================================================== -->
    <div class="container">
        <div class="mainheading">
            <h1 class="sitetitle">Publicaciones DentOS</h1>
            <p class="lead">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum, iusto.
            </p>
        </div>
        <!-- End Site Title
================================================== -->


        <!-- Begin List Posts
 ================================================== -->
        <section class="recent-posts">
            <div class="section-title">
                <h2><span>Blogs</span></h2>
            </div>
            <div class="card-columns listrecent">

                <!-- begin post -->
                @forelse ($blogsPublicados as $blog)
                    <div class="card">
                        <a href="#">
                            <img class="img-fluid" src="{{ $blog->imagen }}"
                                alt="{{ $blog->nombre . '.png' }}">
                        </a>
                        <div class="card-block">
                            <h2 class="card-title"><a href="post.html">{{ $blog->titulo }}</a></h2>
                            <h4 class="card-text"><span
                                    class="d-inline-block col-6 text-truncate">{{ $blog->descripcion }}</span>
                            </h4>
                            <div class="metafooter">
                                <div class="wrapfooter">
                                    <span class="meta-footer-thumb">
                                        <a href="author.html"><img class="author-thumb"
                                                src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                                alt="{{ $blog->user->name . '.png' }}"></a>
                                    </span>
                                    <span class="author-meta">
                                        <span class="post-name"><a
                                                href="#">{{ $blog->user->nombre }}</a></span><br />
                                        <span class="post-date">{{ $blog->created_at }}</span><span
                                            class="dot"></span>
                                    </span>
                                    <span class="post-read-more"><a href="post.html" title="Read Story"><svg
                                                class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
                                                <path
                                                    d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z"
                                                    fill-rule="evenodd"></path>
                                            </svg></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <p>No se encontraron publicaciones</p>
                    </div>
                @endforelse

            </div>
        </section>
        <!-- End List Posts
        ================================================== -->

        <!-- Begin Footer
 ================================================== -->
        <div class="footer">
            <p class="pull-left">
                Copyright &copy; 2021 Fernan D. Perez
            </p>
            <div class="clearfix">
            </div>
        </div>
        <!-- End Footer
 ================================================== -->
    </div>

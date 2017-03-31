<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>AUI - Exam Planner</title>
        <link rel="icon" href="{{ asset("/favicon.ico") }}">

        <!-- Custom styles for this template -->
        <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet'
              type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    </head>

    <body data-spy="scroll" data-target="#navigation" data-offset="50">

        <div id="app">
            <div id="navigation" class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><b>AUI Exam Planner</b></a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#home" class="smoothScroll">Home</a></li>
                            <li><a href="#desc" class="smoothScroll">Description</a></li>
                            <li><a href="#showcase" class="smoothScroll">Showcase</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <section id="home" name="home">
                <div id="headerwrap">
                    <div class="container">
                        <div class="row centered">
                            <div class="col-lg-12">
                                <h1>AUI <b>Exam</b>Planner</h1>
                                <h3>A falsis, lumen clemens cannabis. Vigil congregabos, tanquam teres vox. Devatios
                                    nocere in placidus lentia! Vae, ionicis tormento! Frondator de secundus decor, locus
                                    assimilatio! Sunt solemes visum regius, albus adiuratores?</h3>
                                <h3><a href="{{ url('/login') }}" class="btn btn-lg btn-success">Get Started !</a></h3>
                                <br>
                            </div>
                            <div class="col-lg-2">
                                <h5>Amazing design</h5>
                                <p>Sensorem de gratis tus, imperium repressor.</p>
                                <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/img/arrow1.png') }}">
                            </div>
                            <div class="col-lg-8">
                                <img class="img-responsive" src="{{ asset('/img/app-bg.png') }}" alt="">
                            </div>
                            <div class="col-lg-2">
                                <br>
                                <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/img/arrow2.png') }}">
                                <h5>Cool Features</h5>
                                <p>Cum lacta experium, omnes historiaes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="desc" name="desc">
                <div id="intro">
                    <div class="container">
                        <div class="row centered">
                            <h1>Designed To Excel</h1>
                            <br>
                            <br>
                            <div class="col-lg-4">
                                <img src="{{ asset('/img/intro01.png') }}" alt="">
                                <h3>Discuss</h3>
                                <p>Magnum deus saepe prensionems rector est.</a></p>
                            </div>
                            <div class="col-lg-4">
                                <img src="{{ asset('/img/intro02.png') }}" alt="">
                                <h3>Schedule</h3>
                                <p>Vae, nuptia! Castus, noster galluss superbe vitare de barbatus, flavum navis.</p>
                            </div>
                            <div class="col-lg-4">
                                <img src="{{ asset('/img/intro03.png') }}" alt="">
                                <h3>Monitor</h3>
                                <p>Buxums prarere, tanquam ferox fluctui.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="showcase" name="showcase">
                <div id="showcase">
                    <div class="container">
                        <div class="row">
                            <h1 class="centered">Some Screenshots</h1>
                            <br>
                            <div class="col-lg-8 col-lg-offset-2">
                                <div id="carousel-example-generic" class="carousel slide">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0"
                                            class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    </ol>

                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img src="{{ asset('/img/item-01.png') }}" alt="">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('/img/item-02.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer>
                <div id="c">
                    <div class="container">
                        <p></p>

                    </div>
                </div>
            </footer>

        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="./{{ mix('/js/app-landing.js') }}"></script>
        <script>
            $('.carousel').carousel({
                interval: 3000
            })
        </script>
    </body>
</html>

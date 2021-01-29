<?php

/* @var $this yii\web\View */

$this->title = 'Selamat Datang';
?>
    <div class="section home">
        <div class="container">
            <div class="row home-row">
                <div class="col-12 d-block d-md-none">
                    <a href="#">
                        <img alt="mobile hero" class="mobile-hero rounded" src="<?=Yii::getAlias('@web/'.'images/galon-pusing.png')?>" />
                    </a>
                </div>

                <div class="col-12 col-xl-4 col-lg-5 col-md-6">
                    <div class="home-text">
                        <div class="display-1">Solusi Antar Jemput Galon</div>
                        <p class="white mb-5">
                           Depot adalah aplikasi antar jemput galon yang memanfaatkan teknologi terkini.
                        </p>
                        <?=\yii\bootstrap4\Html::a('Daftar Sekarang!',['site/signup'],['class'=>'btn btn-outline-semi-light btn-xl'])?>
                    </div>
                </div>
                <div class="col-12 col-xl-7 offset-xl-1 col-lg-7 col-md-6  d-none d-md-block">
                    <a href="#">
                        <img class="rounded" alt="hero" src="<?=Yii::getAlias('@web/'.'images/galon-pusing.png')?>" />
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 p-0">
                    <div class="owl-container">
                        <div class="owl-carousel home-carousel">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div>
                                        <i class="simple-icon-rocket large-icon"></i>
                                        <h5 class="mb-0 font-weight-semibold">
                                            Cepat Sampai
                                        </h5>
                                    </div>
                                    <div>
                                        <p class="detail-text">
                                            Depot kami siap mengantar dengan cepat. dengan karyawan yang giat bekerja.
                                        </p>
                                    </div>
                                    <a class="btn btn-link font-weight-semibold" href="LandingPage.Features.html">VIEW</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body text-center">
                                    <div>
                                        <i class="iconsmind-Line-Chart2 large-icon"></i>
                                        <h5 class="mb-0 font-weight-semibold">
                                            Superfine Charts
                                        </h5>
                                    </div>
                                    <div>
                                        <p class="detail-text">
                                            Charts that looks good with color, opacity, border
                                            and shadow.
                                        </p>
                                    </div>
                                    <a class="btn btn-link font-weight-semibold" href="LandingPage.Features.html">VIEW</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body text-center">
                                    <div>
                                        <i class="iconsmind-Three-ArrowFork large-icon"></i>
                                        <h5 class="mb-0 font-weight-semibold">
                                            Two Panels Menu
                                        </h5>
                                    </div>
                                    <div>
                                        <p class="detail-text">
                                            A menu that looks good and does the job well.
                                        </p>
                                    </div>
                                    <a class="btn btn-link font-weight-semibold" href="LandingPage.Features.html">VIEW</a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <div>
                                        <i class="iconsmind-Funny-Bicycle large-icon"></i>
                                        <h5 class="mb-0 font-weight-semibold">
                                            Layouts for the Job
                                        </h5>
                                    </div>
                                    <div>
                                        <p class="detail-text">
                                            Lots of different layouts for different jobs.
                                        </p>
                                    </div>
                                    <a class="btn btn-link font-weight-semibold" href="LandingPage.Features.html">VIEW</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body text-center">
                                    <div>
                                        <i class="iconsmind-Full-View large-icon"></i>
                                        <h5 class="mb-0 font-weight-semibold">
                                            Extra Responsive
                                        </h5>
                                    </div>
                                    <div>
                                        <p class="detail-text">
                                            Better experiences for smaller and larger screens
                                            by adding Xxl and Xxs.
                                        </p>
                                    </div>
                                    <a class="btn btn-link font-weight-semibold" href="LandingPage.Features.html">VIEW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-circle btn-outline-semi-light hero-circle-button scrollTo" href="#features" id="homeCircleButton"><i
                    class="simple-icon-arrow-down"></i></a>
    </div>

    <div class="section">
        <div class="container" id="features">
            <div class="row">
                <div class="col-12 offset-0 col-lg-8 offset-lg-2 text-center">
                    <h1>Features At a Glance</h1>
                    <p>
                        We tried to create an admin theme that we would like to use
                        ourselves so we listed our priorities. We would like to have
                        a theme that is not over complicated to use, does the job
                        well, contains must have components and looks really nice.
                    </p>
                </div>
            </div>

            <div class="row feature-row">
                <div class="col-12 col-md-6 col-lg-5 d-flex align-items-center">
                    <div class="d-flex">
                        <div class="feature-icon-container">
                            <div class="icon-background">
                                <i class="fas fa-fw fa-ban"></i>
                            </div>
                        </div>
                        <div class="feature-text-container">
                            <h2>Pleasant Design</h2>
                            <p>
                                As a web developer we enjoy to work on something looks
                                nice. It is not an absolute necessity but it really
                                motivates us that final product will look good for user
                                point of view. <br />
                                <br />
                                So we put a lot of work into colors, icons, composition
                                and design harmony. Themed components and layouts with
                                same design language. <br />
                                <br />
                                We kept user experience principles always at the heart
                                of the design process.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 offset-lg-1 offset-md-0 position-relative">
                    <div class="background-item-1"></div>
                    <img alt="feature image" class="feature-image-right feature-image-charts position-relative" src="images/landing-page/feature.png" />
                </div>
            </div>

            <div class="row feature-row">
                <div class="col-12 col-md-6 col-lg-6 order-2 order-md-1">
                    <img alt="feature image" class="feature-image-left feature-image-charts" src="images/landing-page/feature-2.png" />
                </div>

                <div class="col-12 col-md-6 offset-md-0 col-lg-5 offset-lg-1 d-flex align-items-center order-1 order-md-2">
                    <div class="d-flex">
                        <div class="feature-icon-container">
                            <div class="icon-background">
                                <i class="fas fa-fw fa-ban"></i>
                            </div>
                        </div>
                        <div class="feature-text-container">
                            <h2>Layouts for the Job</h2>
                            <p>
                                Layouts are the real thing, they need to be accurate and
                                right for the job. They should be functional for both
                                user and developer. <br />
                                <br />
                                We created lots of different layouts for different jobs.
                                <br />
                                <br />
                                Listing pages with view mode changing capabilities,
                                shift select and select all functionality, application
                                layouts with an additional menu, authentication and
                                error layouts which has a different design than the
                                other pages were our main focus. We also created details
                                page with tabs that can hold many components.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row feature-row">
                <div class="col-12 col-md-6 col-lg-5 d-flex align-items-center">
                    <div class="d-flex">
                        <div class="feature-icon-container">
                            <div class="icon-background">
                                <i class="fas fa-fw fa-ban"></i>
                            </div>
                        </div>
                        <div class="feature-text-container">
                            <h2>Superfine Charts</h2>
                            <p>
                                Using charts is a good way to visualize data but they
                                often look ugly and breaks the rhythm of design. <br />
                                <br />
                                We concentrated on a single chart library and tried to
                                create charts that looks good with color, opacity,
                                border and shadow. <br />
                                <br />
                                Used certain plugins and created some to make charts
                                even more useful and beautiful.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 offset-lg-1 offset-md-0 ">
                    <img alt="feature image" class="feature-image-right feature-image-charts" src="images/landing-page/feature-3.png" />
                </div>
            </div>
        </div>
    </div>

    <div class="section background">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-0 col-lg-8 offset-lg-2 text-center">
                    <h1>Client Reviews</h1>
                    <p>
                        People love Dore. We have received lots of awesome reviews
                        for desing quality, documentation, code quality,
                        flexibility, features, support and other categories. Here
                        are some of them.
                    </p>
                </div>
                <div class="col-12 p-0">
                    <div class="owl-container">
                        <div class="owl-carousel review-carousel">
                            <div class="card">
                                <div class="card-body text-center pt-5 pb-5">
                                    <div>
                                        <img alt="review profile" class="img-thumbnail border-0 rounded-circle mb-4 list-thumbnail mx-auto"
                                             src="images/profile-pic-l-7.jpg" />
                                        <h5 class="mb-0 font-weight-semibold color-theme-1 mb-3">
                                            codebars
                                        </h5>
                                        <select class="rating" data-current-rating="5" data-readonly="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <p class="text-muted text-small">Code Quality</p>
                                    </div>
                                    <div class="pl-3 pr-3 pt-3 pb-0 flex-grow-1 d-flex align-items-center">
                                        <p class="mb-0 ">
                                            Phosfluorescently engage worldwide methodologies with web-enabled technology. Interactively
                                            coordinate proactive e-commerce via process-centric "outside the box" thinking. </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body text-center pt-5 pb-5">
                                    <div>
                                        <img alt="review profile" class="img-thumbnail border-0 rounded-circle mb-4 list-thumbnail mx-auto"
                                             src="images/profile-pic-l-11.jpg" />
                                        <h5 class="mb-0 font-weight-semibold color-theme-1 mb-3">
                                            helvetica
                                        </h5>
                                        <select class="rating" data-current-rating="5" data-readonly="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <p class="text-muted text-small">Code Quality</p>
                                    </div>
                                    <div class="pl-3 pr-3 pt-3 pb-0 flex-grow-1 d-flex align-items-center">
                                        <p class="mb-0 ">
                                            Credibly innovate granular internal or "organic" sources whereas high standards in
                                            web-readiness. Energistically scale future-proof core competencies. </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body text-center pt-5 pb-5">
                                    <div>
                                        <img alt="review profile" class="img-thumbnail border-0 rounded-circle mb-4 list-thumbnail mx-auto"
                                             src="images/profile-pic-l-2.jpg" />
                                        <h5 class="mb-0 font-weight-semibold color-theme-1 mb-3">
                                            logorrhea
                                        </h5>
                                        <select class="rating" data-current-rating="5" data-readonly="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <p class="text-muted text-small">Code Quality</p>
                                    </div>
                                    <div class="pl-3 pr-3 pt-3 pb-0 flex-grow-1 d-flex align-items-center">
                                        <p class="mb-0 ">
                                            Collaboratively administrate turnkey channels whereas virtual e-tailers. Objectively seize
                                            scalable metrics whereas proactive e-services.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body text-center pt-5 pb-5">
                                    <div>
                                        <img alt="review profile" class="img-thumbnail border-0 rounded-circle mb-4 list-thumbnail mx-auto"
                                             src="images/profile-pic-l-8.jpg" />

                                        <h5 class="mb-0 font-weight-semibold color-theme-1 mb-3">
                                            nanaimo
                                        </h5>
                                        <select class="rating" data-current-rating="5" data-readonly="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <p class="text-muted text-small">Code Quality</p>
                                    </div>
                                    <div class="pl-3 pr-3 pt-3 pb-0 flex-grow-1 d-flex align-items-center">
                                        <p class="mb-0 ">
                                            Globally incubate standards compliant channels before scalable benefits. Quickly
                                            disseminate superior deliverables whereas web-enabled applications. </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body text-center pt-5 pb-5">
                                    <div>
                                        <img alt="review profile" class="img-thumbnail border-0 rounded-circle mb-4 list-thumbnail mx-auto"
                                             src="images/profile-pic-l-11.jpg" />
                                        <h5 class="mb-0 font-weight-semibold color-theme-1 mb-3">
                                            helvetica
                                        </h5>
                                        <select class="rating" data-current-rating="5" data-readonly="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <p class="text-muted text-small">Code Quality</p>
                                    </div>
                                    <div class="pl-3 pr-3 pt-3 pb-0 flex-grow-1 d-flex align-items-center">
                                        <p class="mb-0 ">
                                            Interactively procrastinate high-payoff content without backward-compatible data. Quickly
                                            cultivate optimal processes and tactical architectures. </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="slider-nav text-center">
                            <a href="#" class="left-arrow owl-prev">
                                <i class="simple-icon-arrow-left"></i>
                            </a>
                            <div class="slider-dot-container"></div>
                            <a href="#" class="right-arrow owl-next">
                                <i class="simple-icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 mb-4">
                    <h1 class="heading-team">Meet the Team</h1>
                    <p>
                        Our team brings a wealth of experience from some of the
                        world’s most formidable production studios, agencies and
                        startups. <br />
                        We’re led by a team who constantly questions, tinkers, and
                        challenges to unlock great creativity around every turn.
                    </p>
                </div>
                <div class="col-12 col-lg-7 offset-0 offset-lg-1 pl-0 pr-0">
                    <div class="owl-container">
                        <div class="owl-carousel team-carousel">
                            <div class="card">
                                <div class="position-relative">
                                    <img class="card-img-top" src="images/landing-page/team-1.jpg" alt="Card image cap" />
                                    <span class="badge badge-pill badge-theme-1 position-absolute badge-top-left">FRONTEND</span>
                                </div>
                                <div class="card-body">
                                    <h6 class="mb-4">Philip Nelms</h6>
                                    <footer>
                                        <p class="text-muted text-small mb-0 font-weight-light">
                                            Sr. Developer
                                        </p>
                                    </footer>
                                </div>
                            </div>
                            <div class="card">
                                <div class="position-relative">
                                    <img class="card-img-top" src="images/landing-page/team-3.jpg" alt="Card image cap" />
                                    <span class="badge badge-pill badge-theme-1 position-absolute badge-top-left">FRONTEND</span>
                                </div>
                                <div class="card-body">
                                    <h6 class="mb-4">Mimi Carreira</h6>

                                    <footer>
                                        <p class="text-muted text-small mb-0 font-weight-light">
                                            Jr. Developer
                                        </p>
                                    </footer>
                                </div>
                            </div>
                            <div class="card">
                                <div class="position-relative">
                                    <img class="card-img-top" src="images/landing-page/team-2.jpg" alt="Card image cap" />
                                    <span class="badge badge-pill badge-secondary position-absolute badge-top-left">BACKEND</span>
                                </div>
                                <div class="card-body">
                                    <h6 class="mb-4">Terese Threadgill</h6>

                                    <footer>
                                        <p class="text-muted text-small mb-0 font-weight-light">
                                            Sr. Developer
                                        </p>
                                    </footer>
                                </div>
                            </div>
                            <div class="card">
                                <div class="position-relative">
                                    <img class="card-img-top" src="images/landing-page/team-4.jpg" alt="Card image cap" />
                                    <span class="badge badge-pill badge-secondary position-absolute badge-top-left">BACKEND</span>
                                </div>
                                <div class="card-body">
                                    <h6 class="mb-4">Marty Otte</h6>

                                    <footer>
                                        <p class="text-muted text-small mb-0 font-weight-light">
                                            Sr. Developer
                                        </p>
                                    </footer>
                                </div>
                            </div>
                            <div class="card">
                                <div class="position-relative">
                                    <img class="card-img-top" src="images/landing-page/team-5.jpg" alt="Card image cap" />
                                    <span class="badge badge-pill badge-theme-3 position-absolute badge-top-left">DESIGN</span>
                                </div>
                                <div class="card-body">
                                    <h6 class="mb-4">Esperanza Lodge</h6>

                                    <footer>
                                        <p class="text-muted text-small mb-0 font-weight-light">
                                            Art Director
                                        </p>
                                    </footer>
                                </div>
                            </div>
                        </div>
                        <div class=" slider-nav text-center">
                            <a href="#" class="left-arrow owl-prev">
                                <i class="simple-icon-arrow-left"></i>
                            </a>
                            <div class="slider-dot-container"></div>
                            <a href="#" class="right-arrow owl-next">
                                <i class="simple-icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section background background-no-bottom mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-0 col-lg-8 offset-lg-2 text-center">
                    <h1>Thousands of Happy Customers</h1>
                    <p>
                        Humanitarian resist incubator movements outcomes.
                        Low-hanging fruit synergy correlation accessibility; save
                        the world unprecedented challenge scalable. Leverage
                        strategy, and, game-changer, agile, social return on
                        investment.
                    </p>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="owl-container">
                        <div class="owl-carousel client-carousel">
                            <div>
                                <img alt="client" class="img-fluid" src="images/landing-page/client-1.png" />
                            </div>
                            <div>
                                <img alt="client" class="img-fluid" src="images/landing-page/client-2.png" />
                            </div>
                            <div>
                                <img alt="client" class="img-fluid" src="images/landing-page/client-3.png" />
                            </div>
                            <div>
                                <img alt="client" class="img-fluid" src="images/landing-page/client-4.png" />
                            </div>
                            <div>
                                <img alt="client" class="img-fluid" src="images/landing-page/client-5.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





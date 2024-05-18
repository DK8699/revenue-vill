<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGAG</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
     <!--<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />-->

</head>

<body>

    <!-- Nav Bar Section -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('images/icons/LogoUpdate-09.svg')}}" width="60" height="60" alt="Logo" style="width: 100%;">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto" id="menu">
                        <li id="homeBtn" class="nav-item active">
                            <a class="nav-link" href="#sliderSection">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li id="aboutBtn" class="nav-item">
                            <a class="nav-link" href="#aboutSection">About</a>
                        </li>
                        <li id="benifitsBtn" class="nav-item">
                            <a class="nav-link" href="#benifitsSection">Benefits</a>
                        </li>
                        <li id="procedureBtn" class="nav-item">
                            <a class="nav-link" href="#procedureSection">Procedure</a>
                        </li>
                        <li id="contactBtn" class="nav-item">
                            <a class="nav-link" href="#contactForm">Get In Touch</a>
                        </li>
                    </ul>
                    <button class="btn btn-primary ml-auto shadow-none" data-toggle="modal" data-target="#loginModalCenter" style="background-color: #0e3950; border-color:#0e3950; border-radius: 0; width: 128px;">
                        <a href="#" style="color: white !important;">Login</a>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <!-- End of Nav Bar Section -->

    <!-- Slider Section -->
    <div id="sliderSection" class="imageMain">
        <img class="img-fluid" src="{{asset('images/Banner2.jpg')}}" alt="Main Image" style="width: 100%; height: 100%; margin-top: -170px;">
    </div>
    <!-- End of Slider Section -->

    <!-- About Us Section -->
    <section id="aboutSection" class="aboutUs descpHeader">
        <div style="padding-top: 100px; padding-bottom: 100px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <img class="img-fluid" src="{{asset('images/Banner2.jpg')}}" alt="About Us Image" style="height: 435px; object-fit: cover;">
                    </div>
                    <div class="col-lg-1 col-sm-12"></div>
                    <div class="col-lg-5">
                        <div class="aboutText" style="margin-top: 10vh">
                            <h4 style="font-weight: 500; font-size: 32px;">About Us</h4>
                            <p style="font-weight: 400; font-size: 16px; text-align: justify;">
                                Amar Gaon Amar Gaurav is a web portal designed to enable citizens to
                                propose suggestions on the change of names of their villages. The objective
                                aligns with the vision and direction of our esteemed Assam Chief Minister
                                ‘Himanta Biswa Sarma’ to name the city, town, or village representing its
                                culture, tradition, and civilization.
                                Through the Amar Gaon Amar Gaurav web portal, a citizen can also put
                                forward and suggest the Foundation Day of their village.
                                However, any such change request placed in the portal should be supported
                                with necessary documents of relevance and justification. Citizens will need to
                                ensure the suggestions should not demean any caste, community, or religion
                                at any respect.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of About Us Section -->

    <!-- Benifits Section -->
    <section id="benifitsSection" class="benifits descpHeader">
        <div style="padding-bottom: 100px; padding-top: 100px;">
            <div class="container">
                <h4 class="text-center" style="font-weight: 500; font-size: 32px;">
                    Benefits
                </h4>
                <div class="row mt-5">
                    <div class="col-lg-3 col-sm-12">
                        <div class="card" style="width: 100%; height: 100%; border-color: #fff;">
                            <div class="card-header d-flex align-items-center justify-content-center">
                                <img class="card-img-top" src="{{asset('images/icons/scalability.svg')}}" alt="Card image cap">
                            </div>
                            <div class="card-body" style="padding-top: 0; padding-bottom: 0;">
                                <h5 class="text-center">Scalability </h5>
                                <p class="card-text pt-3 pb-3" style="text-align: justify;">An open platform where the residents of the village can collectively name their village on the premise of their tradition, cultural heritage, historic legacy, or any other</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="card" style="width: 100%; height: 100%; border-color: #fff;">
                            <div class="card-header d-flex align-items-center justify-content-center">
                                <img class="card-img-top" src="{{asset('images/icons/Affiliation.svg')}}" alt="Card image cap">
                            </div>
                            <div class="card-body" style="padding-top: 0; padding-bottom: 0;">
                                <h5 class="text-center">Affiliation</h5>
                                <p class="card-text pt-3 pb-3" style="text-align: justify;">Change in names of the villages is more of an assertion of identity to keep the traditional identity intact and imbibe the sense of belonging and oneself.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="card" style="width: 100%; height: 100%; border-color: #fff;">
                            <div class="card-header d-flex align-items-center justify-content-center">
                                <img class="card-img-top" src="{{asset('images/icons/Testimonies.svg')}}" alt="Card image cap">
                            </div>
                            <div class="card-body" style="padding-top: 0; padding-bottom: 0;">
                                <h5 class="text-center">Availability of Testimonies</h5>
                                <p class="card-text pt-3 pb-3" style="text-align: justify;">Every such request will mandatorily have the necessary documentation on the agreement of the selected village name or foundation day to avoid any future.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="card" style="width: 100%; height: 100%; border-color: #fff;">
                            <div class="card-header d-flex align-items-center justify-content-center">
                                <img class="card-img-top" src="{{asset('images/icons/Requests.svg')}}" alt="Card image cap">
                            </div>
                            <div class="card-body" style="padding-top: 0; padding-bottom: 0;">
                                <h5 class="text-center">Identification of Requests</h5>
                                <p class="card-text pt-3 pb-3" style="text-align: justify;">Each request will have a unique ID to ascertain the requestors and grounds on which the requests have been registered.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Benifits Section -->

    <!-- Start of Procedure Section-->
    <section id="procedureSection" class="procedure descpHeader">
        <div style="/*padding-bottom: 100px;*/ padding-top: 100px;">
            <div class="container">
                <h4 class="text-center " style="font-weight: 500; font-size: 32px;">
                    Procedure
                </h4>
                <div class="row no-gutters mt-5">
                    <div class="col-lg-4 col-sm-12" style="padding: 0;">
                        <div class="card p-4" style="width: 100%; height: 100%;">
                            <div class="card-header d-flex align-items-center justify-content-center">
                                <img class="card-img-top" src="{{asset('images/icons/login.svg')}}" alt="Card image cap">
                            </div>
                            <div class="card-body p-4">
                                <h5 class="text-center">01 - Login</h5>
                                <p class="card-text text-center">All the requests for a particular Village to be submitted in their respective Goan Panchayat Office only with user details of authorized designatory of that Gaon Panchayat Office.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12" style="padding: 0;">
                        <div class="card p-4" style="width: 100%; height: 100%;">
                            <div class="card-header d-flex align-items-center justify-content-center">
                                <img class="card-img-top" src="{{asset('images/icons/selectModule.svg')}}" alt="Card image cap">
                            </div>
                            <div class="card-body p-4">
                                <h5 class="text-center">02 - Select Module</h5>
                                <p class="card-text text-center">Select the Change Request Module i.e Selection of Foundation Day or Revenue Village Name Change for further process.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12" style="padding: 0;">
                        <div class="card p-4" style="width: 100%; height: 100%;">
                            <div class="card-header d-flex align-items-center justify-content-center">
                                <img class="card-img-top" src="{{asset('images/icons/application.svg')}}" alt="Card image cap">
                            </div>
                            <div class="card-body p-4">
                                <h5 class="text-center">03 - Application form</h5>
                                <p class="card-text text-center">Fill in the details in the given tabs of the application form with correct information and data. Without the filled mandatory tabs, the application will not be submitted.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12" style="padding: 0;">
                        <div class="card p-4" style="width: 100%; height: 100%;">
                            <div class="card-header d-flex align-items-center justify-content-center">
                                <img class="card-img-top" src="{{asset('images/icons/resolution.svg')}}" alt="Card image cap">
                            </div>
                            <div class="card-body p-4">
                                <h5 class="text-center">04 - Resolutions</h5>
                                <p class="card-text text-center">Relevant resolutions and supporting documents are needed against the proposed name and day to avoid any conflict of interest.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12" style="padding: 0;">
                        <div class="card p-4" style="width: 100%; height: 100%;">
                            <div class="card-header d-flex align-items-center justify-content-center">
                                <img class="card-img-top" src="{{asset('images/icons/submission.svg')}}" alt="Card image cap">
                            </div>
                            <div class="card-body p-4">
                                <h5 class="text-center">05 - Submission</h5>
                                <p class="card-text text-center">Upon properly filling up the application form and attaching the necessary attachments, one can submit the request post confirming the alert message.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12" style="padding: 0;">
                        <div class="card p-4" style="width: 100%; height: 100%;">
                            <div class="card-header d-flex align-items-center justify-content-center">
                                <img class="card-img-top" src="{{asset('images/icons/acknowledgement.svg')}}" alt="Card image cap">
                            </div>
                            <div class="card-body p-4">
                                <h5 class="text-center">06 - Acknowledgement</h5>
                                <p class="card-text text-center">On successful submission, a request ID will be generated with an acknowledgment receipt for reference. This receipt can be downloaded and saved as a part of the confirmation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Get in Touch -->
            <section id="contactForm" class="contactUs descpHeader">
                <div style="padding-top: 100px; padding-bottom: 100px;">
                    <div class="container">
                        <div class="row no-gutters">
                            <div class="col-lg-4 col-sm-12">
                                <div class="contactTitle" style="margin-top: 10vh;">
                                    <h4 style="font-weight: 500; font-size: 38px;">Get in touch</h4>
                                    <p style="font-weight: 400; font-size: 14px;">We really appreciate you taking the time to get in touch. Please fill in the form below.</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-12"></div>
                            <div class="col-lg-6 col-sm-12">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12">
                                            <input type="text" class="form-control shadow-none" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input type="email" class="form-control shadow-none" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input type="text" class="form-control shadow-none" placeholder="Enter Mobile Number">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <input type="text" class="form-control shadow-none" placeholder="Subject">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <textarea type="text" class="form-control shadow-none" placeholder="Message" style="resize: none; height: 120px;"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary shadow-none" style="background-color: #0e3950; border-color:#0e3950; border-radius: 0; width: 128px; margin-left: 5px;">
                                            <a href="#" style="color: white !important;">Submit</a>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of Get in Touch Section -->
        </div>
    </section>
    <!-- End of Procedure Section -->

    <!-- Modal -->
    <div class="modal fade" id="loginModalCenter" tabindex="-1" role="dialog" aria-labelledby="loginModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-5">
                <div class="modal-header" style="border-bottom: none;">
                    <!-- <h5 class="modal-title" id="loginModalLongTitle">Modal title</h5> -->
                    <img src="{{asset('images/icons/Logoupdate-02-08.png')}}" alt="Logo" style="width: 100%;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 50px;">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <h5 class="modal-title text-center mb-3" id="loginModalLongTitle">Login</h5>

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group row justify-content-center">

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control" name="email" value="" placeholder="Enter Email Id" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" required autocomplete="current-password">
                            </div>
                        </div>
                </div>
                <div class="modal-footer d-flex align-items-center justify-content-center" style="border-top: none;">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary" style="background-color: #0e3950; border-color:#0e3950; border-radius: 0; width: 128px;">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Login Modal -->

    <footer>
        <div class="container">
            <div class="footerImg d-flex align-items-center justify-content-center" style="padding-top: 40px; padding-bottom: 40px;">
                <img src="{{asset('images/icons/footerLogo.svg')}}" alt="Footer Logo" style="width: 30%;">
            </div>
        </div>
    </footer>
    <div class="footerband" style="background-color: black;">
        <p class="text-center" style="color: #fff; margin:0; padding-top: 10px; padding-bottom: 10px; font-weight: 400; font-size: 14px;">© 2022 Amar Gaon Amar Gaurav. All right reserved. Designed, Developed & Maintained by Gratia Technology Pvt. Ltd.</p>
    </div>


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!--<script src="https://unpkg.com/aos@next/dist/aos.js"></script>-->
    <!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->
    <script src="{{asset('js/nav.js')}}"></script>
    <!-- <script src="{{asset('js/jquery.min.js')}}"></script> -->

    <script>
        $(window).scroll(function() {
            $('nav').toggleClass('fixed-top scrolled', $(this).scrollTop() > 200);
            // $('.logo').toggleClass('scrolled', $(this).scrollTop() > 200);
        });

        $('li').click(function() {
            var btnIds = $(this).attr("id");
            $('li').removeClass("active");
            if (btnIds == "aboutBtn" || btnIds == "benifitsBtn" || btnIds == "procedureBtn" || btnIds == "contactBtn" || btnIds == "homeBtn") {
                $(this).addClass("active");
                // alert(btnIds);
            }
        });
    </script>

    <script>
        $('#menu').onePageNav({
            currentClass: 'active',
            changeHash: false,
            scrollSpeed: 750,
            scrollThreshold: 0.5,
            filter: '',
            easing: 'swing'
        });
    </script>
    
</body>

</html>
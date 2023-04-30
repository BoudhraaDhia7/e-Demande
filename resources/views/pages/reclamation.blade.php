<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>STEG - Index</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('main') }}/img/favicon.png" rel="icon" />
    <link href="{{ asset('main') }}/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('main') }}/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="{{ asset('main') }}/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="{{ asset('main') }}/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="{{ asset('main') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="{{ asset('main') }}/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="{{ asset('main') }}/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="{{ asset('main') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('main') }}/css/style.css" rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAs2DHu6AvTQ-no_c4panFGZW0K5W-bdyg&exp&sensor=false&libraries=places" sensor="false"></script>
    <script type="text/javascript">
        $(function(){
            var latlng=new google.maps.LatLng(35.67743306240599, 10.097028163014665);
            var map=new google.maps.Map(document.getElementById('gmap'),{
                                                                    zoom:14,
                                                                    center:latlng,
                                                                    mapTypeId:google.maps.MapTypeId.ROADMAP
                                                                    });

        var marker=new google.maps.Marker({
                                            position:new google.maps.LatLng(35.67743306240599, 10.097028163014665),
                                            map:map,
                                            draggable:true,
                                            animation:google.maps.Animation.DROP
                                        });
        //default
        //change on map
        marker.addListener( 'mouseover', function(event) {
            document.getElementById("la").value = event.latLng.lat();
            document.getElementById("ln").value = event.latLng.lng();
        });
        marker.addListener( 'mouseout', function(event) {
            document.getElementById("la").value = event.latLng.lat();
            document.getElementById("ln").value = event.latLng.lng();
        });
        });
        //end change on map
        </script>
</head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top" style="background-color:#37517E">
      <div class="container d-flex align-items-center gap-3">
        <h1 class="logo me-auto mt-3">
          <img src="{{ asset('main') }}/img/rm-steg.png" height="30%" alt="" />
          <a href="">e-Demande</a>
          <img src="{{ asset('main') }}/img/flag.webp" height="30%" alt="" />
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="{{ asset('main') }}/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
          <ul>
            <li>
              <a class="nav-link scrollto active" href="#hero">Accueil</a>
            </li>
            <li><a class="nav-link scrollto" href="#about">À propos </a></li>
            <li>
              <a class="nav-link scrollto" href="#skills">Statistique</a>
            </li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            <li>
              <a class="nav-link scrollto" href="#cta">S'identifier </a>
            </li>
            <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>

            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li>
              <a class="getstarted scrollto" href="#about">Commencer </a>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
   
    <!-- End Hero -->

    <main id="main">

<!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
            <li><a href="index.html">Accueil</a></li>
            <li>Se reclamer</li>
            </ol>
            <h2>Se reclamer</h2>

        </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page  pb-3">
        <div class="container">
        <section id="contact" class="contact padding-0">
        <div class="container" data-aos="fade-up">
          
      
          <div class="row">
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="info">
               <div id="gmap" style="height:100%"></div>
              </div>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch">
              <form
                action="{{ route('add-reclamation') }}"
                method="post"
                role="form"
                class="php-email-form"
              >
              @csrf
               
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Nom</label>
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      placeholder="votre nom"
                      id="name"
                      required
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Prénom</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="votre prénom"
                      name="lastname"
                      id="email"
                      required
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Téléphone</label>
                    <input
                      type="text"
                      name="phone"
                      class="form-control"
                      placeholder="votre téléphone"
                      id="name"
                      required
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Email</label>
                    <input
                      type="email"
                      class="form-control"
                      placeholder="votre email"
                      name="email"
                      id="email"
                      required
                    />
                  </div>
                </div>
                <div class="form-group">
                  <label for="name">Type de réclamation</label>
                  <select name="type" class="form-control">
                    <option value="personal" selected>Réclamation personel</option>
                    <option value="network">Dommages réseaux</option>
                  </select>
                </div>
             
                <div class="form-group">
                  <label for="name">Message</label>
                  <textarea
                    class="form-control"
                    name="message"
                    
                    rows="10"
                    required
                  ></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Chargement</div>
                  <div class="error-message"></div>
                  <div class="sent-message">
                    Votre message a été envoyé. Merci!
                  </div>
                </div>
                <input type="text" hidden id="la" name="la">
                <input type="text" hidden id="ln" name="ln">
                <div class="text-center">
                  <button type="submit">Envoyer</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
        </div>
        </section>

</main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-4 col-md-6 footer-contact">
              <h3>Société tunisienne de l'électricité et du gaz</h3>
              <p>
                Avenue de Tlemcen <br />
                3100 Kairouan<br />
                KAIROUAN <br /><br />
                <strong>Phone:</strong> +216 77 234 777<br />
                <strong>Email:</strong> dpsc@steg.com.tn
                <br />
              </p>
            </div>

            <div class="col-lg-4 col-md-6 footer-links">
              <h4>Liens utiles</h4>
              <ul>
                <li>
                  <i class="bx bx-chevron-right"></i> <a href="#">Accueil</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i> <a href="#">À propos</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i> <a href="#">Services</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="#">S'identifier</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="#">S'inscrire</a>
                </li>
              </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-links">
              <h4>Nos réseaux sociaux</h4>
              <p>
                Retrouvez-nous également sur les réseaux sociaux pour être au
                courant de toutes nos actualités et événements à venir !
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"
                  ><i class="bx bxl-instagram"></i
                ></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container footer-bottom clearfix">
        <div class="copyright">
          &copy; Copyright <strong><span>Boudhraa Bahaeddine</span></strong
          >. Tous les droits sont réservés
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('main') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('main') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('main') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('main') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('main') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('main') }}/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="{{ asset('main') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('main') }}/js/main.js"></script>
    
  </body>
</html>

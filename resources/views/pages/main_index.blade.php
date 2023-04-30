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
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
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
    <section id="hero" class="d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div
            class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <h1 class="page-title">
              Bienvenue dans notre application web de réclamation d'alimentation
              électrique !
            </h1>
            <h2>
              Nous sommes heureux de vous offrir une plateforme simple et
              conviviale pour soumettre des réclamations concernant votre
              alimentation électrique
            </h2>
            <div class="d-flex justify-content-center justify-content-lg-start">
              <a href="" target="_blank" class="btn-get-started scrollto">Se réclamer</a>
              <a
                href="https://www.youtube.com/watch?v=QLrCs6xmig4"
                class="glightbox btn-watch-video"
                ><i class="bi bi-play-circle"></i
                ><span>Regarder la vidéo </span></a
              >
            </div>
          </div>
          <div
            class="col-lg-6 order-1 order-lg-2 hero-img"
            data-aos="zoom-in"
            data-aos-delay="200"
          >
            <img
              src="{{ asset('main') }}/img/hero-img.png"
              class="img-fluid animated"
              alt=""
            />
          </div>
        </div>
      </div>
    </section>
    <!-- End Hero -->

    <main id="main">
      <!-- ======= About Us Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>À PROPOS DE NOUS</h2>
          </div>

          <div class="row content">
            <div class="col-lg-6">
              <p>
                La STEG est une entreprise publique tunisienne qui fournit de
                l'électricité et du gaz à des millions de personnes à travers le
                pays. Depuis de nombreuses années, nous avons travaillé dur pour
                fournir des solutions d'alimentation électrique et de gaz
                fiables et durables à nos clients.
              </p>
              <ul>
                <li>
                  <i class="ri-check-double-line"></i> Vos réclamations sont
                  traitées rapidement et efficacement par notre équipe dédiée.
                </li>
                <li>
                  <i class="ri-check-double-line"></i> Nous offrons des
                  solutions d'alimentation électrique et de gaz durables et
                  respectueuses de l'environnement
                </li>
                <li>
                  <i class="ri-check-double-line"></i> Notre entreprise est
                  engagée envers la satisfaction de la clientèle et nous
                  travaillons constamment pour améliorer nos services.
                </li>
              </ul>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p>
                Nous sommes une entreprise soucieuse de l'environnement et nous
                nous engageons à fournir des solutions énergétiques
                respectueuses de l'environnement. Nous avons investi dans des
                technologies avancées pour aider à réduire l'impact
                environnemental de nos activités et nous continuerons à
                rechercher des moyens de réduire notre empreinte écologique à
                l'avenir.
              </p>
              <a href="#" class="btn-learn-more">Pour en savoir plus</a>
            </div>
          </div>
        </div>
      </section>
      <!-- End About Us Section -->

      <!-- ======= Why Us Section ======= -->
      <section id="why-us" class="why-us section-bg">
        <div class="container-fluid" data-aos="fade-up">
          <div class="row">
            <div
              class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch order-2 order-lg-1"
            >
              <div class="content">
                <h3>
                  Pourquoi
                  <strong>nous choisir ?</strong>
                </h3>
              </div>

              <div class="accordion-list">
                <ul>
                  <li>
                    <a
                      data-bs-toggle="collapse"
                      class="collapse"
                      data-bs-target="#accordion-list-1"
                      ><span>01</span> Comment assurez-vous la qualité de vos
                      services ? <i class="bx bx-chevron-down icon-show"></i
                      ><i class="bx bx-chevron-up icon-close"></i
                    ></a>
                    <div
                      id="accordion-list-1"
                      class="collapse show"
                      data-bs-parent=".accordion-list"
                    >
                      <p>
                        Nous sommes déterminés à fournir un service de qualité
                        supérieure à tous nos clients. Nous nous engageons à
                        respecter les normes de qualité les plus élevées et à
                        garantir la satisfaction de nos clients.
                      </p>
                    </div>
                  </li>

                  <li>
                    <a
                      data-bs-toggle="collapse"
                      data-bs-target="#accordion-list-2"
                      class="collapsed"
                      ><span>02</span> Quel est l'expertise de votre équipe ?
                      <i class="bx bx-chevron-down icon-show"></i
                      ><i class="bx bx-chevron-up icon-close"></i
                    ></a>
                    <div
                      id="accordion-list-2"
                      class="collapse"
                      data-bs-parent=".accordion-list"
                    >
                      <p>
                        Notre équipe est composée de professionnels expérimentés
                        et compétents dans le domaine de l'énergie électrique et
                        du gaz. Ils possèdent une connaissance approfondie des
                        technologies et des processus liés à l'alimentation
                        électrique et de gaz, et sont en mesure de fournir une
                        expertise approfondie et de qualité supérieure à tous
                        nos clients.
                      </p>
                    </div>
                  </li>

                  <li>
                    <a
                      data-bs-toggle="collapse"
                      data-bs-target="#accordion-list-3"
                      class="collapsed"
                      ><span>03</span> Quelle est votre politique en matière
                      d'environnement ?
                      <i class="bx bx-chevron-down icon-show"></i
                      ><i class="bx bx-chevron-up icon-close"></i
                    ></a>
                    <div
                      id="accordion-list-3"
                      class="collapse"
                      data-bs-parent=".accordion-list"
                    >
                      <p>
                        Nous sommes engagés dans la protection de
                        l'environnement et nous sommes fiers de fournir des
                        solutions énergétiques respectueuses de l'environnement
                        à nos clients. Nous utilisons des technologies
                        innovantes pour réduire notre empreinte carbone et nous
                        encourageons nos clients à faire de même en leur offrant
                        des conseils sur l'économie d'énergie et l'efficacité
                        énergétique.
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>

            <div
              class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
              style="background-image: url('{{ asset('main') }}/img/why-us.png')"
              data-aos="zoom-in"
              data-aos-delay="150"
            >
              &nbsp;
            </div>
          </div>
        </div>
      </section>
      <!-- End Why Us Section -->

      <!-- ======= Skills Section ======= -->
      <section id="skills" class="skills">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div
              class="col-lg-6 d-flex align-items-center"
              data-aos="fade-right"
              data-aos-delay="100"
            >
              <img src="{{ asset('main') }}/img/skills.png" class="img-fluid" alt="" />
            </div>
            <div
              class="col-lg-6 pt-4 pt-lg-0 content"
              data-aos="fade-left"
              data-aos-delay="100"
            >
              <h3 class="text-fix">Voici nos chiffres clés de l'année dernière.</h3>
              <p class="fst-italic">
                Nous sommes fiers de partager nos statistiques clés avec nos
                clients.
              </p>

              <div class="skills-content">
                <div class="progress">
                  <span class="skill"
                    >Reclamation Totale <i class="val">100%</i></span
                  >
                  <div class="progress-bar-wrap">
                    <div
                      class="progress-bar"
                      role="progressbar"
                      aria-valuenow="100"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                </div>

                <div class="progress">
                  <span class="skill"
                    >Reclamation Traiteé <i class="val">100%</i></span
                  >

                  <div class="progress-bar-wrap">
                    <div
                      class="progress-bar"
                      role="progressbar"
                      aria-valuenow="90"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                </div>

                <div class="progress">
                  <span class="skill"
                    >Reclamation En Cours <i class="val">75%</i></span
                  >
                  <div class="progress-bar-wrap">
                    <div
                      class="progress-bar"
                      role="progressbar"
                      aria-valuenow="75"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                </div>

                <div class="progress">
                  <span class="skill"
                    >Reclamation Rejeté <i class="val">55%</i></span
                  >
                  <div class="progress-bar-wrap">
                    <div
                      class="progress-bar"
                      role="progressbar"
                      aria-valuenow="55"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Skills Section -->

      <!-- ======= Services Section ======= -->
      <section id="services" class="services section-bg ">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Services</h2>
            <p>
              Nous offrons une large gamme de services d'alimentation électrique
              et de gaz pour répondre aux besoins de nos clients.
            </p>
          </div>

          <div class="row  ">
            <div
              class="col-xl-3 col-md-6 d-flex align-items-stretch"
              data-aos="zoom-in"
              data-aos-delay="100"
            >
              <div class="icon-box d-flex-row">
                <div class="icon d-flex align-items-center">
                  <img
                    src="{{ asset('main') }}/img/electric-meter.png"
                    height="120px"
                    alt=""
                  />
                </div>
                <h4 class="services-title">
                  <a href="#"
                    >Installation de compteurs électriques et de gaz</a
                  >
                </h4>
              </div>
            </div>

            <div
              class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0"
              data-aos="zoom-in"
              data-aos-delay="200"
            >
              <div class="icon-box">
                <div class="icon">
                  <div class="icon d-flex align-items-center">
                    <img src="{{ asset('main') }}/img/gas.png" height="120px" alt="" />
                  </div>
                </div>
                <h4 class="services-title">
                  <a href="#" 
                    >Maintenance et réparation des réseaux électriques et de
                    gaz</a
                  >
                </h4>
              </div>
            </div>

            <div
              class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0"
              data-aos="zoom-in"
              data-aos-delay="300"
            >
              <div class="icon-box">
                <div class="icon">
                  <div class="icon d-flex align-items-center">
                    <img src="{{ asset('main') }}/img/energy.png" height="120px" alt="" />
                  </div>
                </div>
                <h4 class="services-title">
                  <a href=""
                    >Nos tarifs d'électricité et de gaz sont parmi les plus compétitifs du marché</a
                  >
                </h4>
              </div>
            </div>

            <div
              class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0"
              data-aos="zoom-in"
              data-aos-delay="400"
            >
              <div class="icon-box">
                <div class="icon">
                  <div class="icon d-flex align-items-center">
                    <img
                      src="{{ asset('main') }}/img/energy-new.png"
                      height="120px"
                      alt=""
                    />
                  </div>
                </div>
                <h4 class="services-title">
                  <a href=""
                    >Conseils pour économiser l'énergie et améliorer l'efficacité énergétique</a
                  >
                </h4>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Services Section -->

      <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">
          <div class="row">
            <div class="col-lg-9 text-center text-lg-start">
              <h3>Appel à l'action</h3>
              <p>
              Démarrez dès maintenant en vous connectant pour profiter de nos services et réclamez pour recevoir les dernières mises à jour par SMS.
              </p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle glightbox" href="" target="_blank">Se réclamer</a>
            </div>
          </div>
        </div>
      </section>
      <!-- End Cta Section -->

      <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>QUESTIONS FRÉQUEMMENT POSÉES</h2>
          </div>

          <div class="faq-list">
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i>
                <a
                  data-bs-toggle="collapse"
                  class="collapse"
                  data-bs-target="#faq-list-1"
                  >Comment puis-je soumettre une demande de service électrique
                  ou de gaz ? <i class="bx bx-chevron-down icon-show"></i
                  ><i class="bx bx-chevron-up icon-close"></i
                ></a>
                <div
                  id="faq-list-1"
                  class="collapse show"
                  data-bs-parent=".faq-list"
                >
                  <p>
                    Réponse 1: Vous pouvez soumettre une demande de service
                    électrique ou de gaz en visitant notre site Web ou en vous
                    rendant à l'un de nos bureaux locaux. Vous devrez fournir
                    des informations sur votre adresse et votre consommation
                    prévue. non.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-help-circle icon-help"></i>
                <a
                  data-bs-toggle="collapse"
                  data-bs-target="#faq-list-2"
                  class="collapsed"
                  >Comment puis-je signaler une panne de courant ou de gaz ?
                  <i class="bx bx-chevron-down icon-show"></i
                  ><i class="bx bx-chevron-up icon-close"></i
                ></a>
                <div
                  id="faq-list-2"
                  class="collapse"
                  data-bs-parent=".faq-list"
                >
                  <p>
                    Vous pouvez signaler une panne de courant ou de gaz en
                    appelant notre centre d'appel d'urgence disponible 24h/24 et
                    7j/7. Nous prendrons en charge votre demande dès que
                    possible.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-help-circle icon-help"></i>
                <a
                  data-bs-toggle="collapse"
                  data-bs-target="#faq-list-3"
                  class="collapsed"
                  >Comment puis-je payer ma facture d'électricité ou de gaz ?
                  <i class="bx bx-chevron-down icon-show"></i
                  ><i class="bx bx-chevron-up icon-close"></i
                ></a>
                <div
                  id="faq-list-3"
                  class="collapse"
                  data-bs-parent=".faq-list"
                >
                  <p>
                    Vous pouvez payer votre facture d'électricité ou de gaz en
                    ligne via notre site Web ou en personne à l'un de nos
                    bureaux locaux. Nous acceptons également les paiements
                    automatiques et les prélèvements automatiques.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="400">
                <i class="bx bx-help-circle icon-help"></i>
                <a
                  data-bs-toggle="collapse"
                  data-bs-target="#faq-list-4"
                  class="collapsed"
                  >Quels sont les tarifs pour l'alimentation électrique et de
                  gaz ? <i class="bx bx-chevron-down icon-show"></i
                  ><i class="bx bx-chevron-up icon-close"></i
                ></a>
                <div
                  id="faq-list-4"
                  class="collapse"
                  data-bs-parent=".faq-list"
                >
                  <p>
                    Les tarifs pour l'alimentation électrique et de gaz varient
                    en fonction de la consommation, de la zone géographique et
                    du type de service. Vous pouvez trouver des informations
                    détaillées sur nos tarifs sur notre site Web.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="500">
                <i class="bx bx-help-circle icon-help"></i>
                <a
                  data-bs-toggle="collapse"
                  data-bs-target="#faq-list-5"
                  class="collapsed"
                  >Comment puis-je changer mon contrat d'alimentation électrique
                  ou de gaz ? <i class="bx bx-chevron-down icon-show"></i
                  ><i class="bx bx-chevron-up icon-close"></i
                ></a>
                <div
                  id="faq-list-5"
                  class="collapse"
                  data-bs-parent=".faq-list"
                >
                  <p>
                    Vous pouvez modifier votre contrat d'alimentation électrique
                    ou de gaz en visitant notre site Web ou en vous rendant à
                    l'un de nos bureaux locaux. Nous serons heureux de vous
                    aider à trouver la meilleure solution pour vos besoins
                    énergétiques.
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </section>
      <!-- End Frequently Asked Questions Section -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Contact</h2>
          </div>

          <div class="row">
            <div class="col-lg-5 d-flex align-items-stretch">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Emplacement:</h4>
                  <p>Avenue de Tlemcen 3100 Kairouan, Kairouan</p>
                </div>

                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>dpsc@steg.com.tn</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Numéro:</h4>
                  <p>+216 77 234 777</p>
                </div>

                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3196.5580203638017!2d10.101085568678897!3d35.66949927954793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1303364c4eb3774f%3A0x5a5a5c5d5b116c08!2sSoci%C3%A9t%C3%A9%20Tunisienne%20de%20l&#39;Electricit%C3%A9%20et%20du%20Gaz%20(STEG)!5e0!3m2!1sen!2stn!4v1649317582519!5m2!1sen!2stn
                  "
                  frameborder="0"
                  style="border: 0; width: 100%; height: 290px"
                  allowfullscreen
                ></iframe>
              </div>
            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
              <form
                action="forms/contact.php"
                method="post"
                role="form"
                class="php-email-form"
              >
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Votre nom</label>
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      id="name"
                      required
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Votre Email</label>
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      required
                    />
                  </div>
                </div>
                <div class="form-group">
                  <label for="name">Sujet</label>
                  <input
                    type="text"
                    class="form-control"
                    name="subject"
                    id="subject"
                    required
                  />
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
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">
                    Votre message a été envoyé. Merci!
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit">Envoyer</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- End Contact Section -->
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

@extends('app')

@section('content')
<section id="hero" class="d-flex">
    <div class="container-fluid position-relative" data-aos="fade-up" data-aos-delay="100" style="padding-right: 0px; padding-left: 0px;">
      <div data-aos="fade-up" data-aos-delay="100">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('template-assets/img/carousel/mm.jpg')}}" class="d-block w-100" alt="..." >
            </div>
            <div class="carousel-item">
              <img src="{{ asset('template-assets/img/carousel/rpl.jpg' )}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('template-assets/img/carousel/mm.jpg' )}}" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <main id="main">

    <!-- ======= About Video Section ======= -->
      <section id="jurusan" class="about-video">
        <div class="container" data-aos="fade-up">

          <div class="row">

            <div class="section-title">
                <h2>Jurusan</h2>
                <p>Jurusan yang ada di SMKS MAHAPUTRA CERDAS UTAMA</p>
            </div>

            <div class="col-lg-6 video-box align-self-baseline" data-aos="fade-right" data-aos-delay="100">
              <img src="template-assets/img/carousel/mulmedd.jpg" class="img-fluid" alt="">
            </div>

            <div id="multimedia" class="col-lg-6 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
              <h3>Multimedia</h3>
              <p>
                Jurusan Multimedia merupakan salah satu kompetensi keahlian di SMK yang termasuk dalam rumpun bidang keahlian Teknik Komputer dan Informatika. Jurusan ini ditempuh dalam 3 tahun masa belajar. Multimedia juga memberikan peluang bagi lulusannya untuk membuka usaha atau berwirausaha sendiri dalam bidang multimedia. Ada beberapa hal yang akan dipelajari di jurusan mutimedia yaitu :
              </p>
              <ul>
                <li><i class="bx bx-check-double"></i> Dasar Desain Grafis.</li>
                <li><i class="bx bx-check-double"></i> Desain Grafis Percetakan.</li>
                <li><i class="bx bx-check-double"></i> Teknik animasi 2D dan 3D.</li>
                <li><i class="bx bx-check-double"></i> Teknik Pengolahan Audio Video.</li>
              </ul>
            </div>

          </div>

        </div>
      </section>

      <section id="jurusan" class="about-video">
        <div class="container" data-aos="fade-up">

          <div class="row">

            <div id="rpl" class="col-lg-6 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
              <h3>Rekayasa Perangkat Lunak</h3>
              <p>
                Jurusan Rekayasa Perangkat Lunak merupakan salah satu kompetensi keahlian di SMK yang termasuk dalam rumpun bidang keahlian Teknik Komputer dan Informatika. Jurusan ini ditempuh dalam 3 tahun masa belajar. RPL adalah sebuah jurusan yang mempelajari dan mendalami semua cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas. Ada beberapa hal yang dipelajari di jurusan ini yaitu :
              </p>
              <ul>
                <li><i class="bx bx-check-double"></i> Sistem Komputer.</li>
                <li><i class="bx bx-check-double"></i> Algoritma dan Pemograman.</li>
                <li><i class="bx bx-check-double"></i> Basis Data.</li>
                <li><i class="bx bx-check-double"></i> Membuat Aplikasi Mobile dan Website.</li>
              </ul>
            </div>


            <div class="col-lg-6 video-box align-self-baseline" data-aos="fade-right" data-aos-delay="100">
              <img src="template-assets/img/carousel/rpl2.jpg" class="img-fluid" alt="">
            </div>

          </div>

        </div>
      </section>
      <!-- End About Video Section -->


      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Profil</h2>
            <p>Profl SMK MAHAPUTRA CERDAS UTAMA. </p>
          </div>

          <div class="row content about-video">
            <div class="col-lg-6 video-box align-self-baseline" data-aos="fade-right" data-aos-delay="100">
              <p>SMKS Mahaputra Cerdas Utama didirikan pada 22 Agustus tahun 2016, adalah salah satu SMK swasta yang ada di Kabupaten Bandung yang memiliki program study Multimedia (MM) dan Rekyasa Perangkat Lunak (RPL), menjadi sekolah pertama di Kabupaten Bandung dengan Konsep Green School atau Sekolah Hijau yang ramah lingkungan SMKS Mahaputra Cerdas Utama berkomitmen untuk mencetak Sumber Daya Manusia (SDM) yang unggul di era 4.0.</p>
            </div>
            <div class="col-lg-6 video-box align-self-baseline" data-aos="fade-right" data-aos-delay="100">
              <p>SMKS Mahaputra Cerdas Utama didirikan pada 22 Agustus tahun 2016, adalah salah satu SMK swasta yang ada di Kabupaten Bandung yang memiliki program study Multimedia (MM) dan Rekyasa Perangkat Lunak (RPL), menjadi sekolah pertama di Kabupaten Bandung dengan Konsep Green School atau Sekolah Hijau yang ramah lingkungan SMKS Mahaputra Cerdas Utama berkomitmen untuk mencetak Sumber Daya Manusia (SDM) yang unggul di era 4.0.</p>
            </div>
          </div>

        </div>
      </section>

      <!-- ======= Team Section ======= -->
      <section id="news" class="team section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Manajemen</h2>
            <p>Berikut adalah manajemen SMKS MAHAPUTRA CERDAS UTAMA</p>
          </div>

          <div class="row">

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <div class="member-img">
                  <img src="template-assets/img/team/foto prof.jpg" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Prof.Dr.Ir.H.Eddy Jusuf. Sp. Ms, M.Kom. IPU</h4>
                  <span>Pembina Yayasan</span>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="member">
                <div class="member-img">
                  <img src="template-assets/img/team/foto ibu yayasan.jpg" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Dr. Hj. Dewi Indriani Jusuf,SE. Msi. CDMP</h4>
                  <span>Ketua Yayasan</span>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
              <div class="member">
                <div class="member-img">
                  <img src="template-assets/img/team/foto pa kepsek.jpg" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Drs. Dedi Hidayat, M.M.Pd</h4>
                  <span>CTO</span>
                </div>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Team Section -->

      <!-- ======= Services Section ======= -->
      <!-- <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Ekstrakurikuler</h2>
            <p>Berikut adalah daftar ekstrakurikuler yang ada di SMKS MAHAPUTRA CERDAS UTAMA.</p>
          </div>

          <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box iconbox-orange ">
                <div class="icon">
                  <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                  </svg>
                  <i class="bx bx-file"></i>
                </div>
                <h4><a href="">Pramuka</a></h4>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box iconbox-orange ">
                <div class="icon">
                  <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                  </svg>
                  <i class="bx bx-file"></i>
                </div>
                <h4><a href="">Sed Perspiciatis</a></h4>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box iconbox-pink">
                <div class="icon">
                  <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                  </svg>
                  <i class="bx bx-tachometer"></i>
                </div>
                <h4><a href="">Magni Dolores</a></h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box iconbox-yellow">
                <div class="icon">
                  <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                  </svg>
                  <i class="bx bx-layer"></i>
                </div>
                <h4><a href="">Nemo Enim</a></h4>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box iconbox-red">
                <div class="icon">
                  <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
                  </svg>
                  <i class="bx bx-slideshow"></i>
                </div>
                <h4><a href="">Dele Cardo</a></h4>
                <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box iconbox-teal">
                <div class="icon">
                  <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"></path>
                  </svg>
                  <i class="bx bx-arch"></i>
                </div>
                <h4><a href="">Divera Don</a></h4>
                <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
              </div>
            </div>

          </div>

        </div>
      </section> --><!-- End Sevices Section -->

      <!-- ======= Portfolio Section ======= -->
      {{-- <section id="galeri" class="portfolio">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>GALERI</h2>
            <p>Berikut beberapa kegiatan yang ada di SMKS MAHAPUTRA CERDAS UTAMA</p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">Semua</li>
                <li data-filter=".filter-app">Eskul</li>
                <li data-filter=".filter-card">Osis</li>
              </ul>
            </div>
          </div>

          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300">

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="template-assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 1</h4>
                  <p>App</p>
                  <div class="portfolio-links">
                    <a href="template-assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="template-assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 3</h4>
                  <p>Web</p>
                  <div class="portfolio-links">
                    <a href="template-assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="template-assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 2</h4>
                  <p>App</p>
                  <div class="portfolio-links">
                    <a href="template-assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="template-assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 2</h4>
                  <p>Card</p>
                  <div class="portfolio-links">
                    <a href="template-assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="template-assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 2</h4>
                  <p>Web</p>
                  <div class="portfolio-links">
                    <a href="template-assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="template-assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 3</h4>
                  <p>App</p>
                  <div class="portfolio-links">
                    <a href="template-assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="template-assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 1</h4>
                  <p>Card</p>
                  <div class="portfolio-links">
                    <a href="template-assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="template-assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 3</h4>
                  <p>Card</p>
                  <div class="portfolio-links">
                    <a href="template-assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="template-assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 3</h4>
                  <p>Web</p>
                  <div class="portfolio-links">
                    <a href="template-assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Portfolio Section --> --}}

      <!-- ======= Pricing Section ======= -->
      <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2 class="mb-2">Biaya masuk awal</h2>
            <div class="h4 mb-4">Penerimaan Peserta Didik Baru 2022 - 2023</div>
            <p>Download brosur digital <a href="https://bit.ly/PPDBMahaputra2022">disini</a>.</p>
          </div>

          <div class="row">

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
              <div class="box featured">
                <h3>Gelombang I</h3>
                <h4><sup>Rp</sup>1.650.000,-</h4>
                <ul>
                  <li>Desember 2021 s.d Februari 2022</li>
                </ul>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
              <div class="box featured">
                <h3>Gelombang II</h3>
                <h4><sup>Rp</sup>2.150.000,-</h4>
                <ul>
                  <li>Maret 2022 s.d April 2022</li>
                </ul>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
              <div class="box featured">
                <h3>Gelombang III</h3>
                <h4><sup>Rp</sup>2.650.000,-</h4>
                <ul>
                  <li>Mei 2022 s.d Juni 2022</li>
                </ul>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
              <div class="box featured">
                <h3>Gelombang IV</h3>
                <h4><sup>Rp</sup>3.150.000,-</h4>
                <ul>
                  <li>Juli 2022</li>
                </ul>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Pricing Section -->

      <!-- ======= Pricing Section ======= -->
      <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>GEBYAR DISKON!!!</h2>
            <p>Untuk Calon Peserta Didik :</p>
          </div>

          <div class="row mb-4">

            <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
              <div class="box featured">
                <h3>Diskon</h3>
                <h4><sup>Rp</sup>6.000.000,-</h4>
                <ul>
                  <li>Hafiz Qur'an 30 Juz</li>
                </ul>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
              <div class="box featured">
                <h3>Diskon</h3>
                <h4><sup>Rp</sup>3.000.000,-</h4>
                <ul>
                  <li>Yatim Piatu</li>
                </ul>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
              <div class="box featured">
                <h3>Diskon</h3>
                <h4><sup>Rp</sup>1.500.000,-</h4>
                <ul>
                  <li>Yatim atau Piatu</li>
                </ul>
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
              <div class="box featured">
                <h3>Diskon</h3>
                <h4><sup>Rp</sup>500.000,-</h4>
                <ul>
                  <li>Berprestasi Akademik Rangking 1 </li>
                </ul>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
              <div class="box featured">
                <h3>Diskon</h3>
                <h4><sup>Rp</sup>500.000,-</h4>
                <ul>
                  <li>Berprestasi Non Akademik</li>
                </ul>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
              <div class="box featured">
                <h3>Diskon</h3>
                <h4><sup>Rp</sup>500.000,-</h4>
                <ul>
                  <li>Putra Putri TNI, POLRI, & ASN</li>
                </ul>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Pricing Section -->

      <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
          </div>

          <div class="faq-list">

          </div>

        </div>
      </section><!-- End Frequently Asked Questions Section -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Kontak</h2>
            <p>Kontak SMK MAHAPUTRA CERDAS UTAMA.</p>
          </div>

          <div>
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0968208910313!2d107.57727271477331!3d-6.997878494944868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e94c27f4ee2f%3A0x5cff6a44153d50b4!2sSMK%20Mahaputra%20Cerdas%20Utama%20.%20Yayasan%20Mahaputra!5e0!3m2!1sid!2sid!4v1640333211954!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
          </div>

          <div class="row mt-5">

            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Lokasi:</h4>
                  <p>Jl. Katapang-Andir Km. 4 Kp. Pasantren Desa Sukamukti Kec. Katapang, Kab. Bandung</p>
                </div>

                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>smkmahaputracerdasutama@gmail.com</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Telepon:</h4>
                  <p>0895-6304-68373</p>
                </div>

              </div>

            </div>

            <div class="col-lg-8 mt-5 mt-lg-0">

              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                  </div>
                  <div class="col-md-6 form-group ">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center mb-4"><button type="submit">Kirim Pesan</button></div>
              </form>

            </div>

            {{-- footer --}}
            <!-- ======= Footer ======= -->
      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>SMKS MAHAPUTRA CERDAS UTAMA</h3>
        <p>
          Jl. Katapang-Andir Km. 4 Kp. Pasantren Desa Sukamukti Kec. Katapang, Kab. Bandung<br><br>
        </p>
      </div>

      <div class="col-lg-3 col-md-6 footer-links mx-5">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="index.php/">Beranda</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#jurusan">Jurusan</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#about">Profile</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#galeri">Galeri</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#news">Berita</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#pricing">PPDB</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-6 footer-newsletter">
        <h4 style="margin-bottom: 4px; font-size: 16px; color: #124265;">Jam Kerja</h4>
        <br>

        <h4 style="margin-bottom: 4px; font-size: 16px; color: #444444;">Senin s.d Jumat</h4>
        <p style="font-size: 14px;">Pukul 08.00 - 16.00 WIB</p>

        <h4 style="margin-bottom: 4px; font-size: 16px; color: #444444;">Sabtu</h4>
        <p style="font-size: 14px;">Pukul 09.00 - 15.00 WIB</p>

        <h4 style="margin-bottom: 4px; font-size: 16px; color: #444444;">Minggu / Tanggal Merah</h4>
        <p style="font-size: 14px;">Libur</p>
      </div>
    </div>
  </div>
</div>

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>SMKS MAHAPUTRA CERDAS UTAMA</span></strong>. All Rights Reserved

      &copy; Copyright <strong><span>SMK MAHAPUTRA CERDAS UTAMA</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="https://www.instagram.com/smkmahaputracerdasutama/?hl=id" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="https://www.facebook.com/smkmahaputra/" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="https://www.youtube.com/channel/UCCfYqV-2N44pFhsQpGEedCw" class="youtube"><i class="bx bxl-youtube"></i></a>
  </div>
</div>
</footer><!-- End Footer -->

          </div>

        </div>
      </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection

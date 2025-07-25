<aside class="left-sidebar with-vertical">
      <div><!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./main/index.html" class="text-nowrap logo-img">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm4vwkkVo7fvT0vGHZ3P4wdBF_wLsLORSZWg&s" width="100" class="dark-logo" alt="Logo-Dark" />
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm4vwkkVo7fvT0vGHZ3P4wdBF_wLsLORSZWg&s" width="100" class="light-logo" alt="Logo-light" />
          </a>
          <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
            <i class="ti ti-x"></i>
          </a>
        </div>

        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
          <ul id="sidebarnav">
            <!-- ---------------------------------- -->
            <!-- Home -->
            <!-- ---------------------------------- -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->
            <li class="sidebar-item">
              <a class="sidebar-link" hidden href="/staff/dashboard" id="get-url" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Dashboar</span>
              </a>
              <a class="sidebar-link" href="/staff/dashboard" id="get-url" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Dashboar</span>
              </a>
              <a class="sidebar-link" href="/precense" id="get-url" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Presensi</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Data Kelas </span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('staff.major')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-school"></i>
                </span>
                <span class="hide-menu">Kelola Jurusan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('staff.classes')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-chalkboard"></i>
                </span>
                <span class="hide-menu">Kelola Kelas</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Data Akun </span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('staff.student')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Kelola Siswa</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('staff.teacher')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Kelola Guru</span>
              </a>
            </li>
             <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('staff.staff')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Kelola Tata Usaha</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Data Pembelajaran </span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('staff.subject')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-book"></i>
                </span>
                <span class="hide-menu">Kelola Mata Pelajaran</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('staff.schedule')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar"></i>
                </span>
                <span class="hide-menu">Kelola Jadwal Pelajaran</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('staff.rapor.access')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-book"></i>
                </span>
                <span class="hide-menu">Kelola Semester</span>
              </a>
            </li>
            
            
            <!-- ---------------------------------- -->
            <!-- PPDB -->
            <!-- ---------------------------------- -->
           

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">PPDB </span>
            </li>
             <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-ballpen"></i>
                </span>
                <span class="hide-menu">Pengelolaan PPDB</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="{{route('staff.studentadmission')}}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Penyelenggaraan PPDB</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{route('staff.academicyear')}}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Tahun Akademik</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="/staff/ppdb-requirement-document" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Persyaratan PPDB  </span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="/staff/partition-classroom" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Pembagian Kelas</span>
                  </a>
                </li>
               
              </ul>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-file"></i>
                </span>
                <span class="hide-menu">Pendaftar PPDB </span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="/staff/student-admission-collection/not-submitted" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Daftar Belum Pengajuan </span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="/staff/student-admission-collection/0/submission" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Daftar Pengajuan</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="/staff/student-admission-collection/0/accepted" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Daftar Diterima  </span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="/staff/student-admission-collection/0/rejected" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Daftar Ditolak  </span>
                  </a>
                </li>
               
              </ul>
            </li>
           







            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Fitur Kurikulum </span>
            </li>

            {{-- <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('.subject')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-book"></i>
                </span>
                <span class="hide-menu">Kelola Mata Pelajaran</span>
              </a>
            </li> --}}
            {{-- <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-file"></i>
                </span>
                <span class="hide-menu">Kelola Lamaran </span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Daftar Belum Pengajuan </span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{route('staff.academicyear')}}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Daftar Pengajuan</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="/staff/ppdb-requirement-document" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Daftar Diterima  </span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="/staff/ppdb-requirement-document" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Daftar Ditolak  </span>
                  </a>
                </li>
                --}}
              </ul>
            </li>
            

          
          </ul>
        </nav>

        {{-- <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
          <div class="hstack gap-3">
            <div class="john-img">
              <img src="{{asset('assets/images/profile/user-1.jpg')}}" class="rounded-circle" width="40" height="40" alt="modernize-img" />
            </div>
            <div class="john-title">
              <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
              <span class="fs-2">Designer</span>
            </div>
            <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
              <i class="ti ti-power fs-6"></i>
            </button>
          </div>
        </div> --}}

        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->

        
      </div>
    </aside>
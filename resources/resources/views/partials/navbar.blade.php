<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm school-navbar">

    <div class="container-fluid">

        {{-- Mobile Sidebar Button --}}
        <button class="btn btn-outline-secondary d-lg-none me-3"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#sidebar"
                aria-controls="sidebar">

            <i class="bi bi-list"></i>

        </button>


        {{-- Application Name --}}
        <span class="navbar-brand mb-0 h1">
            Student Management System
        </span>


        {{-- Right Side --}}
        <div class="ms-auto d-flex align-items-center">

            {{-- Notifications --}}
          <button class="btn btn-light me-2 position-relative school-icon-btn">

                <i class="bi bi-bell"></i>

                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    3
                </span>

            </button>


            {{-- User --}}
            @auth

                <div class="dropdown">

                    <button class="btn btn-light dropdown-toggle school-user-btn"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                        <i class="bi bi-person-circle me-1"></i>

                        <span class="d-none d-sm-inline">
                            {{ Auth::user()->name }}
                        </span>

                    </button>


                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <a class="dropdown-item" href="#">

                                <i class="bi bi-person me-2"></i>

                                Profile

                            </a>

                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>

                            <form method="POST"
                                  action="{{ route('logout') }}">

                                @csrf

                                <button type="submit"
                                        class="dropdown-item">

                                    <i class="bi bi-box-arrow-right me-2"></i>

                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            @endauth

        </div>

    </div>

</nav>
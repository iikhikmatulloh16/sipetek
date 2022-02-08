                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="{{ Auth::user()->picture }}" alt="user-image" class="rounded-circle user_picture" />
                                </span>
                                <span>
                                    <span class="account-user-name user_name">{{ Auth::user()->name }}</span>
                                    @if (Auth::user()->role == 1)
                                        <span class="account-position">Admin</span>
                                    @else
                                        <span class="account-position">Kepala Dinas</span>
                                    @endif
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                {{-- Item --}}
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
                                {{-- Item --}}
                                <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">
                                    <i class="bx bx-user me-1"></i>
                                    <span>My Account</span>
                                </a>
                                {{-- Item --}}
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item notify-item"><i class="bx bx-log-out me-1"></i> Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="bx bx-menu"></i>
                    </button>
                </div>
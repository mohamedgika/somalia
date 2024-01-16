  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4"">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
          <img src="{{ asset('somalia.png') }}" alt="News Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Somaila Sky</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="pb-3 mt-3 mb-3 user-panel d-flex">
              <div class="image">
                  <img src="{{ asset('somalia.png') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="" class="d-block"><b>{{ Auth::user()->name }}</b>
                      <small>{{ Auth::user()->status }}</small></a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-header">Dashboard</li>

                  <li class="nav-item">
                      <a href="{{ route('user.index') }}" class="nav-link">
                          <ion-icon class="nav-icon" name="people"></ion-icon>
                          <p>
                              User
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Category & SubCategory
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('category.index') }}" class="nav-link">
                                  <ion-icon name="copy" class="nav-icon"></ion-icon>
                                  <p>
                                      Category & SubCategory
                                  </p>
                              </a>
                          </li>
                      </ul>
                  </li>


                  <li class="nav-item">
                      <a href="{{ route('ads.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Ads
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <ion-icon class="nav-icon" name="pricetags"></ion-icon>
                          <p>
                              Shop
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="pages/UI/general.html" class="nav-link">
                                  <ion-icon name="copy" class="nav-icon"></ion-icon>
                                  <p>Shop</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/UI/general.html" class="nav-link">
                                  <ion-icon name="copy" class="nav-icon"></ion-icon>
                                  <p>Shop Ads</p>
                              </a>
                          </li>
                      </ul>
                  </li>


                  {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <ion-icon class="nav-icon" name="settings"></ion-icon>
              <p>
                {{__('backend/dashboard_main_sidbar.Setting')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('backend/dashboard_main_sidbar.Setting')}}</p>
                </a>
              </li>
            </ul>
          </li> --}}

                  {{-- <li class="nav-header">{{__('backend/dashboard_main_sidbar.Website')}}</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                {{__('backend/dashboard_main_sidbar.Website')}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <ion-icon class="nav-icon" name="settings"></ion-icon>
              <p>
                {{__('backend/dashboard_main_sidbar.Website Setting')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
            </ul>
          </li> --}}

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>

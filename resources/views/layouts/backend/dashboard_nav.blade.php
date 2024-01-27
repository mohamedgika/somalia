  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>

          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

          <!-- Notifications ShopAds -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <ion-icon name="bag-sharp"></ion-icon>
                <span class="badge badge-danger navbar-badge">{{ $shopadsNotActive }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">{{ $shopadsNotActive }} ShopAds Not Active</span>
                  <div class="dropdown-divider"></div>
                  @foreach ($shopadses as $s)
                      <a href="{{ route('shopads.create') }}" class="dropdown-item">
                        <img src="{{ $s->getFirstMediaUrl('shopads') }}" width="75px"> {{ $s->name }}
                        <span class="float-right text-muted text-sm">{{ $s->created_at->format('Y M d') }}</span>
                      </a>
                  @endforeach
                  <a href="{{ route('shopads.create') }}" class="dropdown-item dropdown-footer">See All ShopAds</a>
              </div>
          </li>

          <!-- Notifications Shops -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <ion-icon name="home-sharp"></ion-icon>
                  <span class="badge badge-danger navbar-badge">{{ $shopNotActive }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">{{ $shopNotActive }} Shop Not Active</span>
                  <div class="dropdown-divider"></div>
                  @foreach ($shops as $s)
                      <a href="{{ route('shop.create') }}" class="dropdown-item">
                          @foreach ($s->getMedia('shop') as $media)
                              <img src="{{ $media->getUrl() }}" width="75px"> {{ $s->name }}
                              <span class="float-right text-muted text-sm">{{ $s->created_at->format('Y M d') }}</span>
                          @endforeach
                      </a>
                  @endforeach
                  <a href="{{ route('shop.create') }}" class="dropdown-item dropdown-footer">See All Shops</a>
              </div>
          </li>

          <!-- Notifications Ads -->
          <li class="nav-item dropdown" style="margin-right: 10px;"">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  <ion-icon name="megaphone-sharp"></ion-icon>
                  <span class="badge badge-warning navbar-badge">{{ $adsNotActive }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">{{ $adsNotActive }} Ads Not Active</span>
                  <div class="dropdown-divider"></div>
                  @foreach ($adses as $ad)
                      <a href="{{ route('ads.create') }}" class="dropdown-item">
                          <img src="{{ $ad->getFirstMediaUrl('ads') }}" width="75px"> {{ $ad->name }}
                          <span class="float-right text-muted text-sm">{{ $ad->created_at->format('Y M d') }}</span>
                      </a>
                  @endforeach
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('ads.create') }}" class="dropdown-item dropdown-footer">See All Ads</a>
              </div>
          </li>

          <li class="nav-item">
              <a href="{{ route('profile.edit') }}"><input class="btn" type="button" value="Profile"
                      style="margin-right: 10px; background-color: #016764; color:white"></a>
          </li>
          <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <input class="btn btn" style="background-color: #016764; color:white" type="submit" value="Logout">
              </form>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
              </a>
          </li>

      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
 <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Home</a>
      </li>
 </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="{{route('profile.edit')}}"><input class="btn" type="button" value="Profile" style="margin-right: 10px; background-color: #016764; color:white"></a>
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

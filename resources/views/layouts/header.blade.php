<!-- Left navbar links -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
  </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
  
  <li class="nav-item">
    <form action="/logout" method="post">
      @csrf
      <button type="submit"class="btn btn-sm btn-outline-danger">Logout</button>
  </form>
  </li>
</ul>

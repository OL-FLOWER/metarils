<nav class="navbar navbar-expand-lg navbar-light  navbar navbar-light" style="background-color: rgb(76, 186, 223);">
  <a class="navbar-brand" href="?page=home"><img src="assets/img/sha.png" style="width: 45px; height: 45px; margin-right: 10px;">Manager School</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?page=home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Stage
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">First</a>
          <a class="dropdown-item" href="#">Second</a>

          <a class="dropdown-item" href="#">Third</a>

      </li>
      <?= isLogin() && hasRol("admin")?'<li class="nav-item"><a class="nav-link" href="?page=students">Student</a></li>':''?>
      <?= isLogin() && hasRol("admin")?'<li class="nav-item"><a class="nav-link" href="?page=teachers">Teachers</a></li>':''?>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Degree</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      <?= !isLogin()?'<a href="?page=signup" class="btn btn-outline-success my-2 my-sm-0" type="submit">sign up</a>':''?>
      <?= !isLogin()?'<a href="?page=login" class="btn btn-outline-success my-2 my-sm-0" type="submit">login</a>':''?>
      <?= isLogin()?'<a href="?page=logout" class="btn btn-outline-success my-2 my-sm-0" type="submit">logout</a>':''?>
    </form>
  </div>

</nav>
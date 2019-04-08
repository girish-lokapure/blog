
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Blog</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/">Home</a></li>
      @if (Session::has('user_id')) 
      <li><a href="/blog/add">Add Article</a></li>
      @endif
      
      <li><a href="/logout">Logout</a></li>
    </ul>
  </div>
</nav>
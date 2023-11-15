<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid  px-5">
      <a class="navbar-brand" href="#">Online Blog</a>
   
      <span > {{ Auth::user()->name}}</span>
      <a class=" ps-5" aria-current="page" href="{{route('blogs')}}" >Latest Blogs</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class=" btn btn-sm btn-danger" aria-current="page" href="{{route('logout')}}" >Logout</a>
                </li>
              </ul>
        
      </div>
    </div>
  </nav>
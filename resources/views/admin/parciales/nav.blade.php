<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Navegación</li>
    <!-- Optionally, you can add icons to the links -->
    {{-- is nos sirve para preguntar en que url estamos  --}}
<li {{ request()->is('admin') ? 'class=active' : ''}}><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
    
    <li class="treeview {{ request()->is('admin/posts*') ? 'active' : ''}}">
      <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
      <li {{ request()->is('admin/posts') ? 'class=active' : ''}}><a href="{{route('admin.posts.index')}}"> <i class="fa fa-eye" aria-hidden="true"></i> ver todos los post</a></li>
        <li><a href="#" data-toggle="modal" data-target="#create-published"> <i class="fa fa-pencil" aria-hidden="true"></i> crear un post</a></li>
      </ul>
    </li>
  </ul>
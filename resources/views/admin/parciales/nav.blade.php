<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Navegación</li>
    {{-- is nos sirve para preguntar en que url estamos --}}
    <li {{ request()->is('admin') ? 'class=active' : ''}}>
        <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>
            <span>Inicio</span></a>
    </li>
    
    
    <li class="treeview {{ request()->is('admin/posts*') ? 'active' : ''}}">
        <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
                @can('view', new App\Post)
                    <li {{ request()->is('admin/posts') ? 'class=active' : ''}}>
                        <a href="{{route('admin.posts.index')}}"> <i class="fa fa-eye" aria-hidden="true">
                            </i> ver todos los post</a>
                    </li>        
                @endcan

                @can('create', new App\Post)
                    <li>
                        @if (request()->is('admin/posts/*'))
                        <a href="{{route('admin.posts.index','#create')}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i> crear un post</a>
                        @else
                       <a href="#" data-toggle="modal" data-target="#create-published">
                           <i class="fa fa-pencil" aria-hidden="true"></i> crear un post</a>
                       @endif
                    </li>                    
                @endcan
        </ul>
    </li>

    @can('create',new App\User)
        <li class="treeview {{ request()->is('admin/users*') ? 'active' : ''}}">
            <a href="#"><i class="fa fa-users"></i> <span>Usuarios</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li {{ request()->is('admin/users') ? 'class=active' : ''}}>
                    <a href="{{route('admin.users.index')}}"> <i class="fa fa-eye" aria-hidden="true">
                        </i> ver todos los usuarios</a></li>

                <li {{ request()->is('admin/users/create') ? 'class=active' : ''}}>
                    <a href="{{route('admin.users.create')}}"> <i class="fa fa-pencil" aria-hidden="true">
                        </i> Crear usuarios</a></li>

            </ul>
        </li>
    @else
        <li {{ request()->is('admin/users/show') ? 'class=active' : ''}}>
                <a href="{{route('admin.users.show',auth()->user())}}"><i class="fa fa-user"></i>
                    <span>Perfil</span></a>
        </li> 
    @endcan

    @can('view', new Spatie\Permission\Models\Role)
        <li {{ request()->is('admin/roles*') ? 'class=active' : ''}}>
                <a href="{{route('admin.roles.index')}}"><i class="fa fa-shield"></i>
                    <span>Roles</span></a>
        </li>        
    @endcan

    @can('view', new Spatie\Permission\Models\Permission)
        <li {{ request()->is('admin/permissions*') ? 'class=active' : ''}}>
                <a href="{{route('admin.permissions.index')}}"><i class="fa fa-tags"></i>
                    <span>Permisos</span></a>
        </li>        
    @endcan
</ul>

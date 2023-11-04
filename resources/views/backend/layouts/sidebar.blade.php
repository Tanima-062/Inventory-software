<!-- partial:partials/_sidebar.html -->

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="row nav position-fixed">
       
        @if(Route::is('shoppings.create') || Route::is('shoppings.show') || Route::is('shoppings.edit') || Route::is('shoppings.index'))
            <li class="nav-item nav-active">
                    <a class="nav-link" href="{{route('shoppings.index')}}">
                        <img src="{!!URL::to('public/backend/assets/img/stl_user-icon-active.png')!!}" class="sidebar-icon">
                        <span class="menu-title"><b>SHOPPINGS</b></span>
                    </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('shoppings.index')}}">
                    <img src="{!!URL::to('public/backend/assets/img/user-management-icon.png')!!}" class="sidebar-icon menu-non-active">
                    <img src="{!!URL::to('public/backend/assets/img/stl_user-icon-active.png')!!}" class="sidebar-icon menu-active">
                    <span class="menu-title">SHOPPINGS</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
<!-- partial -->


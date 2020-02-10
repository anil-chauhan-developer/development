<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item nav-profile" style="display:none">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
           <img src="{{asset('backend/images/faces/face1.jpg')}}" alt="profile">

          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">
          </span>
        </div>
      </a>
    </li>



    {{-- ###### Dashboard ################### --}}
    <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('home')}}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>


        {{-- ****************Team Section**********************--}}
      <li class="nav-item {{ Request::is('teams*') ? 'active' : '' }}">
         <a class="nav-link"  href="{{route('teams')}}" aria-expanded="{{ Request::is('teams*') ? 'true' : 'false' }}" aria-controls="teams">
           <span class="menu-title w-100">Team</span>
           <i class="fa fa-users" aria-hidden="true"></i>
         </a>
       </li>
       {{-- ****************Player Section**********************--}}
       <li class="nav-item {{ Request::is('players*') ? 'active' : '' }}">
          <a class="nav-link"  href="{{route('players')}}" aria-expanded="{{ Request::is('players*') ? 'true' : 'false' }}" aria-controls="players">
            <span class="menu-title w-100">Player</span>
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
          </a>
        </li>

        {{-- ****************Matches fixtures Section**********************--}}
        <li class="nav-item {{ Request::is('schedule*') ? 'active' : '' }}">
           <a class="nav-link"  href="{{route('schedule')}}" aria-expanded="{{ Request::is('schedule*') ? 'true' : 'false' }}" aria-controls="schedule">
             <span class="menu-title w-100">Matches fixtures</span>
             <i class="fa fa-cogs" aria-hidden="true"></i>
           </a>
         </li>

         {{-- ****************Points Table**********************--}}
         <li class="nav-item {{ Request::is('points*') ? 'active' : '' }}">
            <a class="nav-link"  href="{{route('points')}}" aria-expanded="{{ Request::is('points*') ? 'true' : 'false' }}" aria-controls="points">
              <span class="menu-title w-100">Point Table</span>
              <i class="fa fa-cogs" aria-hidden="true"></i>
            </a>
          </li>

  </ul>
</nav>

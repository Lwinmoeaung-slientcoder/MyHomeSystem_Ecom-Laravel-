<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ url('assets/images/faces/face8.png') }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{ Auth::user()->name }}</p>
            <div class="dropdown" data-display="static">
              <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <small class="designation text-muted">{{ Auth::user()->role }}</small>
                <span class="status-indicator online"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                      <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item mt-2"> Manage Accounts </a>
                <a class="dropdown-item"> Change Password </a>
                <a class="dropdown-item"> Check Inbox </a>
                <a href="/logout" class="dropdown-item"> Sign Out </a>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-success btn-block">New Project <i class="mdi mdi-plus"></i>
        </button>
      </div>
    </li>
    <li class="nav-item {{ active_class(['/dashboard']) }}">
      <a class="nav-link" href="{{ url('/dashboard') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">&nbsp;Dashboard</span>
      </a>
    </li>

    @if(Auth::User()->role=='Manager' || Auth::User()->role=='Staff')
    <li class="nav-item {{ active_class(['/users/register']) }}">
      <a class="nav-link" href="{{ url('/users/register') }}">
        <i class="mdi mdi-message-text"></i>
        <span class="menu-title">&nbsp;&nbsp;အသုံးပြုသူစာရင်း</span> 
        </a>
      </li>
      <li class="nav-item {{ active_class(['/goldquality']) }}">
      <a class="nav-link" href="{{ url('/goldquality') }}">
        <i class="mdi mdi-message-text"></i>
        <span class="menu-title">&nbsp;ရွှေအရည်အသွေးထည့်ရန်</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['/sales']) }}">
      <a class="nav-link" href="{{ url('/sales') }}">
        <i class="mdi mdi-message-text"></i>
        <span class="menu-title">&nbsp; အရောင်းစာရင်း</span> 
        </a>
      </li>
  @endif

    <li class="nav-item {{ active_class(['/productlists']) }}">
      <a class="nav-link" href="{{ url('/productlists') }}">
        <i class="mdi mdi-message-text"></i>
        <span class="menu-title">&nbsp; ပစ္စည်းစာရင်း</span> 
        </a>
      </li>
  </ul>
</nav>


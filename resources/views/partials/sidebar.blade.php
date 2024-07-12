<div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
          <svg class="bi"><use xlink:href="#house-fill"/></svg>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('data-pegawai*') ? 'active' : '' }}" href="{{ route('pegawai') }}">
          <svg class="bi"><use xlink:href="#people"/></svg>
          Data Pegawai
        </a>
      </li>
    </ul>

    
  </div>
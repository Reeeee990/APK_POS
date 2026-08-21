<nav class="navbar app-navbar navbar-expand-lg py-3 mb-4">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">Lilac Treats</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i> Dashboard</a>
        </li>
        @if (auth()->user()->role->name === 'admin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ route('admin.users') }}"><i class="bi bi-people"></i> Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('jenis') ? 'active' : '' }}" href="{{ route('jenis.index') }}"><i class="bi bi-tag"></i> Jenis</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link {{ Request::is('produk') ? 'active' : '' }}" href="{{ route('produk.index') }}"><i class="bi bi-box2-fill"></i> Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('penjualan') ? 'active' : '' }}" href="{{ route('penjualan.index') }}"><i class="bi bi-receipt"></i> Penjualan</a>
        </li>
      </ul>
      <div class="d-flex align-items-center gap-2">
        <a class="btn btn-secondary" href="{{ route('profile') }}"><i class="bi bi-person-circle"></i> Profile</a>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-danger" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
        </form>
      </div>
    </div>
  </div>
</nav>
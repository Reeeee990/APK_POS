<nav class="navbar navbar-expand-lg navbar-dark py-3" style="margin-bottom: 30px;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">Lilac Treats</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} bi bi-house-door" aria-disabled="page" href="{{ route('dashboard') }}"> Dashboard</a>
        </li>
        @if (auth()->user()->role->name === 'admin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }} bi bi-people" href="{{ route('admin.users') }}">  Users</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link {{ Request::is('produk') ? 'active' : '' }} bi bi-box2-fill" href="{{ route('produk.index') }}"> Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('penjualan') ? 'active' : '' }} bi bi-bag" href="{{ route('penjualan.index') }}"> Penjualan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('jenis') ? 'active' : '' }} bi bi-bag" href="{{ route('jenis.index') }}"> Jenis</a>
        </li>
      </ul>
      <div class="d-flex align-items-center gap-2">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-danger bi bi-box-arrow-right" type="submit">  Logout</button>
        </form>
      </div>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="{{ asset('images/shopping.png') }}" width="100px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('pembelian') }}">Transaksi<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('riwayat') }}">Riwayat<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tentang Kami <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-md-0">
        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
      </form>
    </div>
  </div>
</nav>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href={{ asset('css/styles.css') }}>
        <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/sweetalert2.min.css') }}>
        <script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
        <script src="{{ asset('js/sweetalert2.min.js')}}"></script>
        <title>Aplikasi Sewa Mobil</title>
<body>

<style>
    section {
        background-image: url({{asset('asset/img/sectionlogreg.png')}});
    }
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #826464;
    }
    .h-custom {
        height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>
<section name="login" class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <p class="fs-1 text-danger"><b>🚗 Website Rental Mobil</b></p>
        <img src="{{asset('asset/img/mobil.webp')}}"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <div class="card">
          <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <div>
                @foreach ($errors->all() as $error)
                    <strong>
                        <li>{{ $error }}</li>  
                    </strong>
                @endforeach
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <div>
                    <strong>
                        {{ session('message') }} 
                    </strong>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="{{ url('/login') }}" method="post" class="needs-validation">
              @csrf
              <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <p class="lead fw-normal mb-0 me-3 fs-4"><b>Login</b> Untuk Menyewa Mobil</p>
              </div>
    
              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label"><i class="bi bi-telephone-fill"></i>Nomor Telepon</label>
                <input type="number" id="phonenumb" name="phonenumb" class="form-control form-control-lg"
                  placeholder="Masukan nomor telepon" required/>
                <div class="invalid-feedback">
                    Mohon masukan nomor telepon anda.
                </div>
              </div>
    
              <!-- Password input -->
              <div class="form-outline mb-3">
                <label class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control form-control-lg"
                  placeholder="Masukan password" required/>
                <div class="invalid-feedback">
                    Mohon masukan password anda.
                </div>
              </div>
    
              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-danger btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ url('/registrasiakun') }}"
                    class="link-danger">Register</a></p>
              </div>
    
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Notification status submition-->
@if (session('success'))
<script>
    Swal.fire({
    title: '{{ session('success') }}',
    icon: 'success',
    confirmButtonText: 'Oke',
    confirmButtonColor: '#0d6efd'
})
</script>  
@endif

</body>
</html>

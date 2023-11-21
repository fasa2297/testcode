<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Buat Sewa</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
        <script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
        <script src="{{ asset('js/sweetalert2.min.js')}}"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    </head>
<body class="permohonaninformasi bg-light">
    <!--Navbar-->
    @include('component.navbar') <!--(Navbar)-->
    <div class="container">
      <main>
        <div class="py-3 text-center">
          <h2>Form menyewakan Mobil</h2>
        </div>
        
        <!--simple menu navigate-->
        <div class="menu-form row g-4 justify-content-center">
          <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-danger">Menu</span>
            </h4>
            <div class="list-group">
                <a href="#FormMobil" class="list-group-item list-group-item-action bg-secondary text-light">
                    <i class="bi bi-file-text-fill"> </i>Form Menyewakan Mobil<br>
                    <small class="text-muted-light">Form untuk anda menywakan mobil</small>
                </a>
                <a href="#daftar" class="list-group-item list-group-item-action">
                    <i class="bi bi-file-x-fill"> </i>Daftar Mobil Disewakan<br>
                    <small class="text-muted-light">Daftar mobil Anda yang telah disewakan</small>
                </a>
            </div>
          </div>
          
          <!--form area-->
          <div class="col-md-7 " id="FormMobil">
              <h4 class="mb-3">Data yang diperlukan</h4>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          Data gagal dikirm dikarenakan beberapa dibawah ini
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <div class="card">
                <div class="card-body">
                  <form action="{{ url('tambahsewa') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row g-3">
                
                      <div class="col-sm">
                            <label class="form-label">Mobil Disewakan Oleh:</label>
                              <input type="text" class="form-control" id="disabledTextInput" name="namalengkap" autocomplete="on" required value="{{ auth()->user()->name }}">
                      </div>

                      <div class="col-sm">
                        <label class="form-label">Merek Mobil</label>
                          <input type="text" class="form-control" id="merek" name="merek" placeholder=""autocomplete="on" required value="{{ old('namalengkap')}}">
                          <div class="invalid-feedback">
                            Mohon masukan merek Mobil.
                          </div>
                      </div>
          
                      <div class="col-12">
                        <label class="form-label">Model</label>
                          <input type="text" class="form-control" id="model" name="model" placeholder="" autocomplete="off" required value="{{ old('email')}}">
                          <div class="invalid-feedback">
                            Mohon masukan Model Mobil
                          </div>
                      </div>
          
                      <div class="col-12">
                        <label class="form-label">Nomor Plat</label>
                          <input type="text" class="form-control" id="platnumb" name="platnumb" maxlength="18" placeholder="" autocomplete="off" required value="{{ old('nomorponsel')}}">
                          <div class="invalid-feedback">
                            Mohon masukan nomor plat Mobil.
                          </div>
                      </div>
    
                      <div class="col-12">
                        <label class="form-label">Tarif sewa Per Hari</label>
                          <input type="number" class="form-control" id="tarif" name="tarif" placeholder="Rp." autocomplete="on" required value="{{ old('pekerjaan')}}">
                          <div class="invalid-feedback">
                            Mohon masukan tarih Mobil.
                          </div>
                      </div>
  
                    <hr class="my-4">
                    <div class="form-check my-2">
                      <input class="form-check-input" type="checkbox" required>
                      <label class="form-check-label">
                        Data yang saya masukan adalah data yang benar.
                      </label>
                    </div>
                      
                    <button class="col-4 btn btn-primary btn-lg text-center" type="submit">
                      <i class="bi bi-send-fill"> Sewakan</i>
                    </button>
                  </form> <!--close tag form-->
                </div>
              </div>
          </div>

          <div class="container mt-4 fs-6">
            <h4 class="mb-3">Data yang diperlukan</h4>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped border rounded">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Anda</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>PlatNomer</th>
                            <th>Tarif</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
          
        </div>
      </main>
    </div>
    

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/form-validation.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('buatsewa') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'namalengkap', name: 'namalengkap' },
                    { data: 'merek', name: 'merek' },
                    { data: 'model', name: 'model' },
                    { data: 'platnumb', name: 'platnumb' },
                    { data: 'tarif', name: 'tarif' },
                ]
            });
        });
    </script>  
</body>
</html>
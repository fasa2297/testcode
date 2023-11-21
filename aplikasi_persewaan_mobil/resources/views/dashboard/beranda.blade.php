<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mobil Yang Tersedia</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
</head>
<body>
    @include('component.navbar') <!--(Navbar)-->
    <article class="artikel bg-light">
        <main>
            <div class="py-3 text-center bg-light">
                <h2>Ketersediaan Penyewaan Mobil</h2>
            </div>
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                    @foreach ($listofcar as $datacar)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ asset('asset/img/carsample.webp') }}" class="card-img-top">
                                <div class="card-body">
                                    <h5>{{ $datacar->merek }}</h5>
                                    
                                    <article class="truncate my-3 fs-5">
                                        <small class="fs-6">
                                            {{ $datacar->model }}
                                        </small>
                                    </article>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            {{-- <a href="{{ url('artikel/detail/'.$article->judulartikel) }}"> --}}
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Pesan</button></a>
                                        </div>
                                    </div>
                                    <small class="text-muted">
                                        Rp.{{ $datacar->tarif }}/Days &nbsp;
                                        <br/> Pemilik: {{ $datacar->namalengkap }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </main>
    </article>

    <div class="container mt-4 fs-6">
        <h4 id="daftar" class="mb-3">Tabeldata mobil</h4>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped border rounded">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pemilik</th>
                        <th>Merek</th>
                        <th>Model</th>
                        <th>PlatNomer</th>
                        <th>Tarif</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/form-validation.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('beranda') !!}',
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

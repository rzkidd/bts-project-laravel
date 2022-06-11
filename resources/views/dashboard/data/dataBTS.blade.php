@extends('dashboard.layouts.main')

@section('container')
        <div aria-label="breadcrumb" class="container py-2">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin" class=" text-black">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data BTS</li>
            </ol>
        </div>

        <!-- Tambahin disini.... -->
        <div class = "ps-3 bg-light " style="width: 1080px; height: 617px";>
            <div class="d-flex align-items-center">
                <h2>
                    Data BTS
                </h2>
            </div>
            <div class="bg-white" style="margin-right: 15px; margin-left: 15px;";>
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-top: 15px; margin-right: 30px; margin-left: 15px;"><i class="bi-plus-square-fill"></i> 
                    Tambah Data 
                    </button>
                    <button type="button" class="btn btn-danger" style="margin-top: 15px; margin-right: 30px; margin-left: 15px;"><i class="bi-file-pdf"></i> PDF </button>
                     </button>
                    <button type="button" class="btn btn-success" style="margin-top: 15px; margin-right: 30px; margin-left: 15px;"><i class="bi-file-excel"></i> Excel </button>
                <div>
                <div class="mt-3">
                    <table class="table table-striped" style="width: 1000px; margin-top: 10px; margin-right: 15px; margin-left: 15px;" id="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama BTS</th>
                            <th>Lokasi</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($data_bts as $bts)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bts->nama }}</td>
                                <td>{{ $bts->alamat }}</td>
                                <td>{{ $bts->latitude }}</td>
                                <td>{{ $bts->longitude }}</td>
                                <td>
                                    <a href="#">edit</a>
                                    <a href="#">view</a>
                                    <a href="#">delete</a>
                                </td>
                            </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        

        <!-- The Modal Input -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Input Data BTS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" required></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post" action=" ">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                     <div class="form-group">
                        <label for="jenis_bts" class="form-label">Jenis BTS</label>
                        <select class="form-select" id="jenis_bts" name="jenis_bts">
                            <option>Triangle</option>
                            <option>Mono</option>
                            <option>4 Kaki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pemilik</label>
                        <input type="text" name="pemilik" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tinggi Tower</label>
                        <input type="text" name="tinggi_tower" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Panjang Tanah</label>
                        <input type="text" name="panjang_tanah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ada_genset" class="form-label">Ada Genset</label>
                        <select class="form-select" id="ada_genset" name="ada_genset">
                            <option>Ada</option>
                            <option>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                         <label for="ada_tembok_batas" class="form-label">Ada Tembok Batas</label>
                        <select class="form-select" id="ada_tembok_batas" name="ada_tembok_batas">
                            <option>Ada</option>
                            <option>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                </form>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <section>
                <button type="submit" class="btn btn-primary">Submit</button>
                </section>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>

        <!-- The Modal Edit -->
        <div class="modal fade" id="myEdit1">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit Data BTS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post" action=" ">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="BTS-959">
                    </div>
                     <div class="form-group">
                        <label for="jenis_bts" class="form-label">Jenis BTS</label>
                        <select class="form-select" id="jenis_bts" name="jenis_bts" value="4 Kaki">
                            <option>Triangle</option>
                            <option>Mono</option>
                            <option>4 Kaki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pemilik</label>
                        <input type="text" name="pemilik" class="form-control" value="Lintang Susanti">
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="Solok">
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control" value="50.927549">
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control" value="-133.878236">
                    </div>
                    <div class="form-group">
                        <label>Tinggi Tower</label>
                        <input type="text" name="tinggi_tower" class="form-control" value="19">
                    </div>
                    <div class="form-group">
                        <label>Panjang Tanah</label>
                        <input type="text" name="panjang_tanah" class="form-control" value="30">
                    </div>
                    <div class="form-group">
                        <label for="ada_genset" class="form-label">Ada Genset</label>
                        <select class="form-select" id="ada_genset" name="ada_genset" value="Ada">
                            <option>Ada</option>
                            <option>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                         <label for="ada_tembok_batas" class="form-label">Ada Tembok Batas</label>
                        <select class="form-select" id="ada_tembok_batas" name="ada_tembok_batas" value="Tidak Ada">
                            <option>Ada</option>
                            <option>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File Foto</label>
                        <img src="https://1.bp.blogspot.com/-aRO27s7V6W0/YP9VzbTDr_I/AAAAAAAABd0/Fsu2PoKVUEwD700N-TpFUSbWTkgTX3kAQCLcBGAsYHQ/s586/BTS%2BPertama%2BTelkomsel.JPG" style="width: 200px; height: 200px" class="mt-10">
                        <input type="file" name="foto" class="form-control">
                    </div>

                </form>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>

         <!-- The Modal Detail -->
        <div class="modal" id="myDetail1">
          <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">DETAIL DATA BTS</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <table class="table">
                    <img src="https://1.bp.blogspot.com/-aRO27s7V6W0/YP9VzbTDr_I/AAAAAAAABd0/Fsu2PoKVUEwD700N-TpFUSbWTkgTX3kAQCLcBGAsYHQ/s586/BTS%2BPertama%2BTelkomsel.JPG" style="width: 300px; height: 300px" class="mx-auto d-block">>
                    <tr>
                        <th>Nama BTS</th>
                        <td>BTS-959</td>
                    </tr>
                    <tr>
                        <th>Jenis BTS</th>
                        <td>4 Kaki</td>
                    </tr>
                    <tr>
                        <th>Pemilik</th>
                        <td>Lintang Susanti</td> 
                    </tr>
                    <tr>
                        <th>Lokasi</th>
                        <td>Solok</td>
                    </tr>
                    <tr>
                        <th>Latitude</th>
                        <td>50.927549</td>
                    </tr>
                    <tr>
                        <th>Longitude</th>
                        <td>-133.878236</td>
                    </tr>
                    <tr>
                        <th>Tinggi Tower</th>
                        <td>19</td>
                    </tr>
                    <tr>
                        <th>Panjang Tanah</th>
                        <td>30</td>
                    </tr>
                    <tr>
                        <th>Lebar Tanah</th>
                        <td>27</td>
                    </tr>
                    <tr>
                        <th>Ada Genset</th>
                        <td>Ada</td>
                    </tr>
                    <tr>
                        <th>Ada Tembok Batas</th>
                        <td>Tidak Ada</td>
                    </tr>
                </table>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>    
        
@endsection
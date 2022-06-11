@extends('dashboard.layouts.main')

@section('container')
    <div aria-label="breadcrumb" class="container py-2">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../home/index.php" class=" text-black">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Monitoring</li>
      </ol>
    </div>

    <!-- Tambahin disini.... -->
    <div class="ps-3 bg-light " style="width: 1080px; height: 617px" ;>
      <div class="d-flex align-items-center">
        <h2>
          Data Monitoring
        </h2>
      </div>

      <!-- Select BTS -->
      <div class="bg-white" style="margin-right: 15px; margin-left: 15px; height: 500px" ;>
        <div class="pt-3 ps-3">
          <form action="#" method="get">
            <label for="bts" class="form-label">Select BTS</label>
            <select name="bts" id="bts" class="form-select" onchange="submit();">
              @foreach ($data_bts as $row)
                @if (!empty($_GET['bts']) && $_GET['bts'] == $row->id)
                  <option value="{{ $row->id }}" selected>{{ $row->nama }}</option>
                @else
                  <option value="{{ $row->id }}">{{ $row->nama }}</option>                
                @endif
              @endforeach
            </select>
          </form>
        </div>

        <div>
          <button type="button" class="btn btn-danger" style="margin-top: 15px; margin-right: 30px; margin-left: 15px;" ><i class="bi-file-pdf"></i> PDF </button>
          </button>
          <button type="button" class="btn btn-success" style="margin-top: 15px; margin-right: 30px; margin-left: 15px;"><i class="bi-file-excel"></i> Excel </button>
          <div>

            <table class="table table-striped border-top mx-3 mt-4" style="width: 1000px;" id="table">
              <thead>
                <tr>
                  <th >No</th>
                  <th >Tahun</th>
                  <th >BTS</th>
                  <th >Tanggal Kunjungan</th>
                  <th >Kondisi</th>
                  <th >Surveyor</th>
                  <th >Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($monitorings as $monitoring)
                  <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td id="tahun">{{ $monitoring->tahun }}</td>
                    <td id="bts_tabel">{{ $monitoring->bts->nama }}</td>
                    <td id="tgl_kunjungan">{{ $monitoring->tgl_kunjungan }}</td>
                    <td id="kondisi_id">{{$monitoring->kondisi_bts->nama}}</td>
                    <td id="surveyor_id">{{ $monitoring->user_surveyor->name }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#myEdit1"><i class="bi-pencil-square"></i></button>
                        <a href="../../functions/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm me-3" onclick="return confirm('Anda yakin?');"><i class="bi-trash"></i></a>
                        <a href="#" class="btn btn-success btn-sm "><i class="bi-arrow-right"></i></a>
                    </td>
                  </tr>
                @endforeach
                
              </tbody>
            </table>
            
          </div>
        </div>

        <!-- The Modal Edit -->
        {{-- <div class="modal fade" id="myEdit1">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit Data Monitoring</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form method="post" action="../../functions/update.php">
                  <input type="hidden" name="id" value="">
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" name="tahun" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label for="bts" class="form-label">BTS</label>
                    <select class="form-select" id="bts" name="bts" value="">
                      <?php foreach ($dataBts as $row) : ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tgl_kunjungan">Tanggal Kunjungan</label>
                    <input type="date" name="tgl_kunjungan" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <label>Kondisi BTS</label>
                    <select class="form-select" id="kondisi_bts" name="kondisi_bts" value="">
                      <?php $kondisiBts = select("select * from kondisi_bts"); ?>
                      <?php foreach ($kondisiBts as $row) : ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Surveyor</label>
                    <select class="form-select" id="surveyor" name="surveyor" value="">
                      <?php $surveyor = select("select * from users"); ?>
                      <?php foreach ($surveyor as $row) : ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>


            </div>
          </div>
        </div> --}}
      </div>

  <script>
    $('#myEdit1').on('show.bs.modal', function(e) {
      var id = $(e.relatedTarget).data('id');
      var tahun = $('#tahun').text();
      var bts = $(e.relatedTarget).data('bts_id');
      var tgl_kunjungan = $('#tgl_kunjungan').text();
      var kondisi_id = $(e.relatedTarget).data('kondisi_id');
      var surveyor_id = $(e.relatedTarget).data('surveyor_id');

      $(e.currentTarget).find('input[name="id"]').val(id);
      $(e.currentTarget).find('input[name="tahun"]').val(tahun);
      $(e.currentTarget).find('select[name="bts"]').val(bts);
      $(e.currentTarget).find('input[name="tgl_kunjungan"]').val(tgl_kunjungan);
      $(e.currentTarget).find('select[name="kondisi_bts"]').val(kondisi_id);
      $(e.currentTarget).find('select[name="surveyor"]').val(surveyor_id);
    });
  </script>
@endsection
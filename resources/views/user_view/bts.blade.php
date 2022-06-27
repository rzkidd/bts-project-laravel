@extends('layouts.main')

@section('container')
    <header class="masthead text-center text-white" >
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </header>
    <div class="mt-5">
        <div>
            <h2 style="text-align: center; margin-bottom: 2rem">
                Data BTS
            </h2>
        </div>
        <div class="col-md-10 mx-auto mb-5 pb-3">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Wilayah</th>
                        <th>Alamat</th>
                        <th>Pemilik</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_bts as $bts)
                    <tr>
                        <td>{{$loop->iteration}} </td>
                        <td>{{$bts->nama}} </td>
                        <td>{{$bts->wilayah->nama}} </td>
                        <td>{{$bts->alamat}} </td>
                        <td>{{$bts->pemilik->nama}} </td>
                        <td>{{$bts->latitude}} </td>
                        <td>{{$bts->longitude}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
@endsection
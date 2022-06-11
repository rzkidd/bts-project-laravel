<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data BTS</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/viewdataBTS.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Bootstrap -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}


</head>
<body class="body"> 
    <nav>
        <div class="navigasi" style="display: flex; flex-direction: row; ">
            <div class="pilihannavigasi">
                <img width="20px" height="20 px">
            </div>
            <div class="pilihannavigasi">
                <a href="#">Beranda</a>
            </div>
            
            <div class="pilihannavigasi">
                Daftar BTS
            </div>
            <div class="pilihannavigasi">
                <a href="src/view/home/index.php">Dashboard</a>
            </div>
            @auth
                <div class="pilihannavigasi" style="margin-left: auto;">
                    <strong>Halo, {{ auth()->user()->name }}</strong>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" style="margin-left: 10px; color: black;">Log Out</button>
                    </form>
                </div>
            @else
                <div class="pilihannavigasi" style="margin-left: auto;">
                    <a href="/login">Login</a>
                </div>
            @endauth
        </div>
    </nav>

    <main>
        <div>
            <div>
                <h2 style="text-align: center">
                    Data BTS
                </h2>
            </div>
            <div>
                <table class="tabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama BTS</th>
                            <th>Lokasi</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="src/user_view/detailBTS1.html">1</a></td>
                            <td><a href="src/user_view/detailBTS1.html">BTS-959</a></td>
                            <td><a href="src/user_view/detailBTS1.html">Gg. Nakula No. 127, Pematangsiantar 75958, Sulbar</a></td>
                            <td><a href="src/user_view/detailBTS1.html">50.927549</a></td>
                            <td><a href="src/user_view/detailBTS1.html">-133.87823</a></td>
                        </tr>

                        <tr>
                            <td><a href="#">2</a></td>
                            <td><a href="#">BTS-431</a></td>
                            <td><a href="#">Ki. Ketandan No. 9, Surabaya 39314, Kaltim</a></td>
                            <td><a href="#">-2.544021</a></td>
                            <td><a href="#">162.56323</a></td>
                        </tr>

                        <tr>
                            <td><a href="#">3</a></td>
                            <td><a href="#">BTS-452</a></td>
                            <td><a href="#">Jr. Thamrin No. 661, Bengkulu 72071, Jatim</a></td>
                            <td><a href="#">-69.253395</a></td>
                            <td><a href="#">103.47447</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>
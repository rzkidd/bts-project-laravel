<?php
    session_start();
    if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
        if($_SESSION['email'] != "admin@admin.com"){
            // echo '
            //     <script>
            //         alert("Akses dilarang!");
            //         document.location.href = /bts-project;
            //     </script>
            // ';
            header("Location: /bts-project");
            exit();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="../../../css/style.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>
<body> 
    <?php include '../../partials/sidebar.php'; ?>

    <main class="flex-fill ms-4">
        <div aria-label="breadcrumb" class="container py-2">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../home/index.html" class=" text-black">Home</a></li>
              <li class="breadcrumb-item"><a href="#" class=" text-black">Profile</a></li>
              <li class="breadcrumb-item active" aria-current="page">Change Password</li>
            </ol>
        </div>

        <div class="container bg-light">
            <label style="margin-top:10px;">Password Lama</label>
            <input type="password" id="passwordlama" nama="Password Lama" style="margin-left:50px">
            <input type="checkbox" onclick="perlihatkanpasswordlama()"> Perlihatkan Password<br>
            <label style="margin-top:10px;">Password Baru </label>
            <input type="password" id="passwordbaru" nama="Password Baru" style="margin-left:55px">
            <input type="checkbox" onclick="perlihatkanpasswordbaru()"> Perlihatkan Password<br>
            <label style="margin-top:10px;">Konfirmasi Password </label>
            <input type="password" id="konfirmasi" nama="Konfirmasi Password" style="margin-left:13px">
            <input type="checkbox" onclick="perlihatkanpasswordkonfirmasi()"> Perlihatkan Password<br>
            <button style="margin-top:10px; background-color:#0d6efd; color:white; border-style:none; border-radius:0.25rem;">Ganti Password</button>
        </div>

        <script>
            function perlihatkanpasswordlama() {
                var x = document.getElementById("passwordlama");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            function perlihatkanpasswordbaru() {
                var x = document.getElementById("passwordbaru");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            function perlihatkanpasswordkonfirmasi() {
                var x = document.getElementById("konfirmasi");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </main>

          


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

<?php 
    } else {
        header('Location: ../login/index.php');
        exit();
    }
?>
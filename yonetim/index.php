<?php
    session_start();
    include("ayar.php");

    if($_POST) {
        $kullanici = $_POST["kullanici"];
        $sifre = $_POST["sifre"];
        $sorgu = $baglan->query("SELECT * FROM kullanici WHERE (kullanici='$kullanici' && sifre='$sifre')");
        $kayitsay = $sorgu->num_rows;

        if ($kayitsay > 0) {
            echo"<script> window.location.href='anasayfa.php';
            </script>";
        }else{
            echo"
            <script> alert('HATALI KULLANICI BİLGİSİ!'); 
            window.location.href='index.php';
            </script>";
        }  
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Yönetim Paneli Giriş</title>
    <style>
    body b{
        color: #00262a;
        font-size: 2rem;
    }
    body input{
        background-color: #89c7bf;
        border-color: #00262a;
        width: 10rem;
        height: 2rem;

    }
    body input:hover{
        background-color: #9b1276;
    }
    </style>
    </head>
    <body>
        <form action="" method="post" style="text-align:center;">
            <b>Kullanıcı Adı</b><br>
            <input type="text" name="kullanici" required><br>
            <b>Parola</b><br>
            <input type="password" name="sifre" required><br><br>
            <input type="submit" value="Giriş yap" style="background-color: #00262a; color:white;">
        </form>
    </body>
    
</html>
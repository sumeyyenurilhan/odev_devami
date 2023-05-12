<?php
    error_reporting(0);
    session_start();
    include("ayar.php");

    $islem = $_GET["islem"];

    if ($islem == "sil") {
        $id = $_GET["id"];
        $sorgu = $baglan->query("delete from anasayfa_slider where (id='$id')");
        echo "<script> window.location.href='anasayfa_slider.php'; </script>";
    }

    if ($islem == "ekle") {
        $baslik = $_POST["baslik"];
        $resim = "images/".$_FILES["resim"]["name"];
        move_uploaded_file($_FILES["resim"]["tmp_name"], $resim);
        $sorgu = $baglan->query("insert into anasayfa_slider (baslik,resim) values ('$baslik','../$resim')");
        echo "<script> window.location.href='anasayfa_slider.php'; </script>";
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yönetim Paneli Ana Sayfa</title>
    <style>
   @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap');
    :root {
    --primary-color: #eee;
    --secondary-color: #000;
    --border-bg: #9b1276;
    --light-bg: #89c7bf;
    --border-bold: #00262a;
    --border-light: #89c7bf;
}
    body{
        font-family: 'Rubik', sans-serif;
    }
    a{
        background-color: var(--border-light);
        color: var(--border-bold);
        text-align: center;
        box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.5);
        font-size: 1rem;
        padding: 1rem 1rem;
        margin: 2rem 1rem;
        cursor: pointer;
        text-decoration:none;
    }
    a:hover{
        background-color: var(--border-bg);
        color: var(--primary-color);
    }
    h3{
        margin-top: 2rem;
        color: var(--border-bold);
        text-align:center;
    }
    .active{
        background-color: var(--border-bg);
        color: var(--primary-color);
    }
    form{
        align-items: center;
        width: 100rem;
        margin: 5rem 5rem;
    }
    table{
        border-collapse: collapse;
        width: 100%;
        justify-content: space-between;
        background-color: var(--primary-color);
        border: var(--border-bold);
        border-width: medium;
        color: var(--border-bold);
    }
    tr{
        display: grid;
        grid-template-columns: repeat(4,1fr);
        border: var(--border-bold);
        border-width: medium;
        text-align: center;
        margin-bottom: 1rem;
    }
    th{
        font-size: 2rem;
        color: var(--border-bg);
    }
    td{
        color: var(--border-bold);
    }
    td a{
        background-color: var(--light-bg);
        color: var(--border-bold);
        text-align: center;
        box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.5);
        font-size: 1rem;
        padding: 0.25rem;
        margin: 2rem 1rem;
        cursor: pointer;
        text-decoration:none;
    }
    form input{
        background-color: var(--primary-color);
        color: var(--border-bold);
        box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.5);
        font-size: 2rem;
        border: var(--border-bold);
        border-width: medium;
        padding: 1rem 1rem;
        margin: 2rem 2rem;
        cursor: pointer;
        padding: 0.5rem 1rem;
        margin-top: 1rem;
    }
    .input{
        background-color: var(--light-bg);
        color: var(--border-bold);
        text-align: center;
        box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.5);
        font-size: 1rem;
        padding: 1rem;
        margin: 2rem 1rem;
        cursor: pointer;
        text-decoration:none;
    }
    .input:hover{
        background-color: var(--border-bg);
        color: var(--primary-color);
    }
    form b{
        font-size: 2rem;
    }
    </style>
    </head>
    <body>
        <div style="text-align:center;">
            <a href="anasayfa.php" class="active">ANA SAYFA</a><a href="hakkimizda.php">HAKKIMIZDA</a><a href="seyahatler.php">SEYAHATLER</a><a href="contact_form.php">İLETİŞİM</a>
            <a href="cikis.php" onclick="if (!confirm('Çıkış yapmak istediğinize emin misiniz?')) return false;">ÇIKIŞ</a>
        </div>
        <br><hr><br>
        <div style="text-align:center;">
            <a href="anasayfa_gezig.php">Gezi Günlüğü</a><a href="anasayfa_slider.php" class="active">Seyahatler Linkleri</a>
        </div>
        <h3>MENÜDEN SEÇİM YAPINIZ</h3>
        <br><hr><br>
    <table>
            <tr>
                <th>SIRA NO</th>
                <th>BAŞLIK</th>
                <th>RESİM</th>
                <th>SİL</th>
            </tr>
        <?php
        $sirano = 0;
        $sorgu = $baglan->query("select * from anasayfa_slider");
        while ($satir = $sorgu->fetch_object()) {
            $sirano++;
            echo "<tr>
                <td>$sirano</td>
                <td>$satir->baslik</td>
                <td>$satir->resim</td>
                <td><a href='anasayfa_slider.php?islem=sil&id=$satir->id' class='a'>SİL</td>
                </tr>";
        }
        ?>
        </table><br>
        <form action="anasayfa_slider.php?islem=ekle" enctype="multipart/form-data" method="post">
            <b>Başlık</b><hr><br><input type="text" name="baslik"><br>
            <b>Resim</b><hr><br><input type="file" name="resim"><br>
            <input type="submit" value="Kaydet" class="input">
        </form>
</body>
</html>
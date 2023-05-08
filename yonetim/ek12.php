<?php
    error_reporting(0);
    session_start();
    include("ayar.php");

    $islem = $_GET["islem"];

    if ($islem == "sil") {
        $id = $_GET["id"];
        $sorgu = $baglan->query("delete from ek12 where (id='$id')");
        echo "<script> window.location.href='ek12.php'; </script>";
    }

    if ($islem == "ekle") {
        $name = $_POST["name"];
        $image = "images/".$_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
        $text = $_POST["text"];
        $sorgu = $baglan->query("insert into ek12 (name,image,text) values ('$name','../$image','$text')");
        echo "<script> window.location.href='ek12.php'; </script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php
        $sirano = 0;
        $sorgu = $baglan->query("select * from ek12");
        while ($satir = $sorgu->fetch_object()) {
            $sirano++;
        echo "<title>Yönetim Paneli $satir->name</title>"; } ?>
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
        padding: 2rem;
        display: flex;
    }
    tr{
        display: grid;
        grid-template-columns: repeat(5,1fr);
        justify-content: space-between;
        border: var(--border-bg);
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
        font-size: 1rem;
        text-align: center;
    }
    td a{
        background-color: var(--light-bg);
        color: var(--border-bold);
        box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.5);
        font-size: 1rem;
        padding: 0.25rem;
        cursor: pointer;
        text-align: center;
    }
    form textarea{
        width:100%;
        height: 25rem;
        background-color: var(--primary-color);
        border: 1rem;
        border-style: medium;
        border-color: var(--border-bold);
        padding: 1rem;
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
        text-align: center;
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
            <a href="anasayfa.php">ANA SAYFA</a><a href="hakkimizda.php">HAKKIMIZDA</a><a href="seyahatler.php" class="active">SEYAHATLER</a><a href="contact_form.php">İLETİŞİM</a>
            <a href="cikis.php" onclick="if (!confirm('Çıkış yapmak istediğinize emin misiniz?')) return false;">ÇIKIŞ</a>
        </div>
        <br><hr><br>
        <table>
            <tr>
                <th>SIRA NO</th>
                <th>BAŞLIK</th>
                <th>RESİM</th>
                <th>İÇERİK</th>
                <th>SİL</th>
            </tr>
        <?php
        $sirano = 0;
        $sorgu = $baglan->query("select * from ek12");
        while ($satir = $sorgu->fetch_object()) {
            $sirano++;
            echo "<tr>
                    <td>$sirano</td>
                    <td>$satir->name</td>
                    <td>$satir->image</td>
                    <td>$satir->text</td>
                    <td><a href='ek12.php?islem=sil&id=$satir->id'>SİL</td>
                </tr>";}
        ?>
        </table><br>
        <form action="ek12.php?islem=ekle" enctype="multipart/form-data" method="post">
            <b>Başlık</b><hr><br><input type="text" name="name"><br>
            <b>Resim</b><hr><br><input type="file" name="image"><br>
            <textarea name="text" type="text" name="text"></textarea><br>
            <input type="submit" value="Kaydet" class="input">
        </form>
    </body>
</html>
<?php
    include("ayar.php");
?>
<!DOCTYPE html>
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
    div a{
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
    div a:hover{
        background-color: var(--border-bg);
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
    </style>
    </head>
    <body>
        <div style="text-align:center;">
            <a href="anasayfa.php" class="active">ANA SAYFA</a><a href="hakkimizda.php">HAKKIMIZDA</a><a href="seyahatler.php">SEYAHATLER</a><a href="contact_form.php">İLETİŞİM</a>
            <a href="cikis.php" onclick="if (!confirm('Çıkış yapmak istediğinize emin misiniz?')) return false;">ÇIKIŞ</a>
        </div>
        <br><hr><br>
        <div style="text-align:center;">
            <a href="anasayfa_gezig.php">Gezi Günlüğü</a><a href="anasayfa_slider.php">Seyahatler Linkleri</a>
        </div>
        <h3>MENÜDEN SEÇİM YAPINIZ</h3>
        <br><hr><br>
    </body>
</html>
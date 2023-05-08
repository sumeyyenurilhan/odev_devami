<?php
    session_start();
    include("ayar.php");

    if ($_POST) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $message = $_POST["message"];
        $sorgu = $baglan->query("insert into contact_form (name,email,number,message) values ('$name','$email','$number','$message')");
        echo "<script> window.location.href='contact_form.php'; </script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Yönetim Paneli İletişim</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap');
    :root {
    --primary-color: #eee;
    --secondary-color: #000;
    --border-bg: #9b1276;
    --light-bg: #89c7bf;
    --border-bold: #00262a;
    --border-light: 2rem solid var(--light-bg);
    }
    body{
        font-family: 'Rubik', sans-serif;
    }
    div a{
        background-color: var(--light-bg);
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
        border: var(--border-light);
        border-width: medium;
        color: var(--border-bold);
    }
    tr{
        display: grid;
        grid-template-columns: repeat(5,1fr);
        border: var(--border-light);
        border-width: medium;
        text-align: center;
    }
    
    form input{
        background-color: var(--primary-color);
        color: var(--border-bold);
        box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.5);
        font-size: 2rem;
        width: 100%;
        border: var(--border-light);
        border-width: medium;
        padding: 1rem 1rem;
        margin: 2rem 2rem;
    }
    form .input{
        background-color: var(--primary-color);
        color: var(--pink);
        cursor: pointer;
        text-decoration:none;
        border: none;
        padding: 0.5rem 1rem;
        margin-top: 1rem;
    }
    form .input:hover{
        background-color: var(--border-light);
    }
    form b{
        font-size: 2rem;
    }
    .a{
        text-decoration: none;
        color: var(--border-bold);
    }
    .a:hover{
        color: var(--border-bg);
    }
    .active{
        background-color: var(--border-bg);
        color: var(--primary-color);
    }
    </style>
    </head>
    <body>
        <div style="text-align:center;">
            <a href="anasayfa.php">ANA SAYFA</a><a href="hakkimizda.php">HAKKIMIZDA</a><a href="seyahatler.php">SEYAHATLER</a><a href="contact_form.php" class="active">İLETİŞİM</a>
            <a href="cikis.php" onclick="if (!confirm('Çıkış yapmak istediğinize emin misiniz?')) return false;">ÇIKIŞ</a>
        </div>
        <br><hr><br>
        <table>
            <tr>
                <th>SIRA-NO</th>
                <th>AD-SOYAD</th>
                <th>E-MAİL</th>
                <th>NUMARA</th>
                <th>MESAJ</th>
            </tr>
        <?php
        $sirano = 0;
        $sorgu = $baglan->query("select * from contact_form");
        while ($satir = $sorgu->fetch_object()) {
            $sirano++;
            echo "<tr>
                <td>$sirano</td>
                <td>$satir->name</td>
                <td>$satir->email</td>
                <td>$satir->number</td>
                <td>$satir->message</td>
                </tr>";}?>
        </table>
    </body>
</html>
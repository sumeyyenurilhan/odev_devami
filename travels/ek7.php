<?php 
    error_reporting(0);
    session_start();
    include("../yonetim/ayar.php");
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        $sorgu = $baglan->query("select * from ek7");
        $satir = $sorgu->fetch_object();
    echo "<title> $satir->name</title>";  ?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="lib/js/jquery.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="hero">
        <header class="header">
            <nav class="nav">
                <a href="../home.php" aria-label="home"><img src="../images/logo.png" class="logo" alt=""></a>
                <ul>
                    <li><a href="../home.php">Ana Sayfa</a></li>
                    <li><a href="../about1.php">Hakkımızda</a></li>
                    <li><a href="../travels.php" class="active">Seyahatler</a></li>
                    <li><a href="../contact.php">İletişim</a></li>
                </ul>
                <a><img src="images/bar.png" class="bar"></a>
                <img src="../images/moon.png" id="icon" alt="">
            </nav>
            <script>
                var icon = document.getElementById("icon");
                icon.onclick = function() {
                    document.body.classList.toggle("dark-theme");
                    if (document.body.classList.contains("dark-theme")) {
                        icon.src = "../images/sun.png";
                    } else {
                        icon.src = "../images/moon.png";
                    }
                };
            </script>
        </header>
        <div class="high2">
            <div class="class1">
                <section class="ekler" id="ekler" data-aos="fade-up">
                    <div class="container">
                    <?php
                    $sorgu = $baglan->query("select * from ek7");
                    $satir = $sorgu->fetch_object();
                    echo "
                        <div class='image'>
                            <img src='$image'>
                        </div>
                        <div class='contents'>
                            <h2>$satir->name</h2><br>
                            <hr class='hr'><br><br>
                            <p style'color:white;'>$satir->text</p><br><br>  
                            <a class='btn' href=''>Randevu İçin Whats app Hattımıza mesaj atın.</a>
                        </div>
                        "; ?>
                    </div>
                </section>
            </div>
        </div>
        <footer>
            <div class="container" data-aos="fade-up">
                <div class="ek" id="ek">
                    <h3>hazır linkler</h3>
                    <div><a href="../home.php">Ana Sayfa</a></div>
                    <div><a href="../about1.php">Hakkımızda</a></div>
                    <div><a href="../travels.php">Seyahatlerimiz</a></div>
                    <div><a href="../contact.php">İletişim</a></div>
                </div>
                <div class="ek" id="ek">
                    <h3>Seyahatler</h3>
                    <div><a href="../travels.php">Yurt İçi Turlar</a></div>
                    <div><a href="../travels.php">Yurt Dışı Turlar</a></div>
                    <div><a href="../travels.php">Mevsim Turları</a></div>
                    <div><a href="../travels.php">Gemi Turları</a></div>
                </div>
                <div class="ek" id="ek">
                    <h3>İletişim bilgileri</h3>
                    <div>
                        <a href="#"><i class="fas fa-phone"></i>+0213-589-74-10</a>
                    </div>
                    <div>
                        <a href="#" class="lower"><i class="fas fa-envelope"></i>asilturizm@gmail.com</a>
                    </div>
                </div>
                <div class="ek">
                    <h3>Sosyal Medya</h3>
                    <div class="social_icon">
                        <div>
                            <a><i class="fab fa-facebook-f"></i></a>

                            <a><i class="fab fa-instagram"></i></a>

                            <a><i class="fab fa-twitter"></i></a>

                            <a><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>

                </div>
            </div>
            <hr class="hr">
            <p>Mezuniyet Projesi | 2023</p>
        </footer>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 3000,
            once: true,
        });
    </script>
    <script src="lib/js/jquery.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
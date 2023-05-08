<?php
    include("yonetim/ayar.php");

    if(isset($_POST['send'])){
        $name = mysqli_real_escape_string($baglan, $_POST['name']);
        $email = mysqli_real_escape_string($baglan, $_POST['email']);
        $number = mysqli_real_escape_string($baglan, $_POST['number']);
        $msg = mysqli_real_escape_string($baglan, $_POST['message']);

        $select_message = mysqli_query($baglan, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

        if(mysqli_num_rows($select_message) > 0){
            $message[] = 'mesaj gönderiliyor!';
        }else{
            mysqli_query($baglan, "INSERT INTO `contact_form`(name, email, number, message) VALUES('$name','$email','$number','$msg')") or die('query failed');
            $message[] = 'mesaj başarıyla gönderildi!';
        }
    }
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim</title>
    <link rel="stylesheet" href="css/style.css">
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
                <a href="home.php" aria-label="home"><img src="images/logo.png" class="logo" alt=""></a>
                <ul>
                    <li><a href="home.php">Ana Sayfa</a></li>
                    <li><a href="about1.php">Hakkımızda</a></li>
                    <li><a href="travels.php">Seyahatler</a></li>
                    <li><a href="contact.php" class="active">İletişim</a></li>
                </ul>
                <img src="images/moon.png" id="icon" alt="">
            </nav>
            <script>
                var icon = document.getElementById("icon");
                icon.onclick = function() {
                    document.body.classList.toggle("dark-theme");
                    if (document.body.classList.contains("dark-theme")) {
                        icon.src = "images/sun.png";
                    } else {
                        icon.src = "images/moon.png";
                    }
                };
            </script>
        </header>
        <div class="high1">
            <div class="class1">
                <section class="contact" id="contact" data-aos="fade-up">
                    <form method="post">
                        <div class="flex">
                            <input type="text" name="name" placeholder="adınızı giriniz" class="box" required>
                            <hr class="hr1">
                            <input type="email" name="email" placeholder="mail adresinizi giriniz" class="box" required>
                            <hr class="hr1">
                        </div>
                        <input type="number" min="0" name="number" placeholder="telefon numaranızı giriniz" class="box" required>
                        <hr class="hr1">
                        <textarea name="message" class="box" required placeholder="mesajınızı yazınız" cols="10" rows="6"></textarea>
                        <hr class="hr1"><br>
                        <input type="submit" value="mesajı gönder" name="send" class="btn1">
                    </form>
                </section>
            <?php
            if(isset($message)){
                foreach($message as $message){
                echo'
                <div class="message">
                    <span>'.$message.'</span>
                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                </div>
                ';
                }
            }
            ?>
            </div>
        </div>
        <footer>
            <div class="container" data-aos="fade-up">
                <div class="ek" id="ek">
                    <h3>hazır linkler</h3>
                    <div><a href="home.php">Ana Sayfa</a></div>
                    <div><a href="about1.php">Hakkımızda</a></div>
                    <div><a href="travels.php">Seyahatlerimiz</a></div>
                    <div><a href="contact.php">İletişim</a></div>
                </div>
                <div class="ek" id="ek">
                    <h3>Seyahatler</h3>
                    <div><a href="travels.php">Yurt İçi Turlar</a></div>
                    <div><a href="travels.php">Yurt Dışı Turlar</a></div>
                    <div><a href="travels.php">Mevsim Turları</a></div>
                    <div><a href="travels.php">Gemi Turları</a></div>
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
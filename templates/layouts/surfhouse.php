<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,800,900|Roboto:400,700,900" rel="stylesheet">
    <?php foreach ($styles as $item) : ?>
        <link rel="stylesheet" href="<?= $item ?>">
    <?php endforeach; ?>
</head>

<body>
    <div class="header">
        <div class="headerContainer">
            <?= $auth ?>
            <?php include ROOT . "/templates/modal.php" ?>
            <div class="header__cart_position">
                <a class="header__cart" href="/cart">
                    <svg width="33" height="29" viewBox="0 0 33 29" xmlns="http://www.w3.org/2000/svg">
                        <path d="M27.199 29C26.5512 28.9738 25.9396 28.6948 25.4952 28.2227C25.0509 27.7506 24.8094 27.1232 24.8225 26.475C24.8356 25.8269 25.1023 25.2097 25.5653 24.7559C26.0283 24.3022 26.6508 24.048 27.2991 24.048C27.9474 24.048 28.5697 24.3022 29.0327 24.7559C29.4957 25.2097 29.7624 25.8269 29.7755 26.475C29.7886 27.1232 29.5471 27.7506 29.1028 28.2227C28.6585 28.6948 28.0468 28.9738 27.399 29H27.199ZM7.75098 26.32C7.75098 25.79 7.90815 25.2718 8.20264 24.8311C8.49712 24.3904 8.91569 24.0469 9.4054 23.844C9.8951 23.6412 10.434 23.5881 10.9539 23.6915C11.4737 23.7949 11.9512 24.0502 12.326 24.425C12.7009 24.7998 12.9562 25.2773 13.0596 25.7972C13.163 26.317 13.1098 26.8559 12.907 27.3456C12.7041 27.8353 12.3606 28.2539 11.9199 28.5483C11.4792 28.8428 10.9611 29 10.431 29C10.0789 29.0003 9.73017 28.9311 9.40479 28.7966C9.0794 28.662 8.78374 28.4646 8.53467 28.2158C8.28559 27.9669 8.08805 27.6713 7.95325 27.3461C7.81844 27.0208 7.74902 26.6721 7.74902 26.32H7.75098ZM11.551 20.686C11.2916 20.6868 11.039 20.6024 10.8322 20.4457C10.6253 20.2891 10.4756 20.0689 10.406 19.819L5.573 2.36401H2.18005C1.86657 2.36401 1.56591 2.23947 1.34424 2.01781C1.12257 1.79614 0.998047 1.49549 0.998047 1.18201C0.998047 0.868519 1.12257 0.567873 1.34424 0.346205C1.56591 0.124537 1.86657 5.81268e-06 2.18005 5.81268e-06H6.46106C6.72055 -0.00080736 6.97309 0.0837201 7.17981 0.240568C7.38653 0.397416 7.53589 0.617884 7.60498 0.868006L12.438 18.323H25.616L29.999 8.27501H15.399C15.2409 8.27961 15.0834 8.25242 14.9359 8.19507C14.7884 8.13771 14.6539 8.05134 14.5404 7.94108C14.4269 7.83082 14.3366 7.69891 14.275 7.55315C14.2134 7.40739 14.1816 7.25075 14.1816 7.0925C14.1816 6.93426 14.2134 6.77762 14.275 6.63186C14.3366 6.4861 14.4269 6.35419 14.5404 6.24393C14.6539 6.13367 14.7884 6.0473 14.9359 5.98994C15.0834 5.93259 15.2409 5.90541 15.399 5.91001H31.812C32.0077 5.90996 32.2003 5.95866 32.3724 6.05172C32.5446 6.14478 32.6908 6.27926 32.798 6.44301C32.9058 6.60729 32.9714 6.79569 32.9889 6.99145C33.0063 7.18721 32.9752 7.38424 32.8981 7.565L27.493 19.977C27.4007 20.1876 27.249 20.3668 27.0565 20.4927C26.864 20.6186 26.6391 20.6858 26.4091 20.686H11.551Z" />
                    </svg>
                    <?php $class = ($cart_count) ? 'header__cart__count' : 'header__cart__count_hide' ?>
                    <div class="<?= $class ?>"><?= $cart_count ?></div>
                </a>
            </div>
            <a href="surfhouse" class="logo"></a>
            <div class="socialIcons">
                <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="https://www.pinterest.ru/" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="welcome">
                <div class="welcomeHeadline">welcome to<br> surfhouse</div>
                <div class="welcomeText">The only online store you<br> will ever need for all your<br> windsurfing and
                    kitesurf-<br> ing and SUP needs</div>
            </div>
            <div class="funride">
                <div class="funrideHeadline">JP Funride<br> 2014</div>
                <div class="funrideText">Super easy going freeride boards<br> based on the X-Cite Ride shape con-<br> cept with
                    additional control and super<br> easy jibing.</div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="contentContainer">
            <div class="contentFlex">
                <div class="contentLeft">
                    <div class="contentLeftMenu">Menu</div>
                    <?= $menu ?>
                    <div class="open">Now<br> is<br> open!</div>
                </div>
                <div class="contentRight">
                    <?= $content ?>
                </div>
            </div>
            <div class="brands">
                <img src="/img/surfhouse/brands/Bic-surf_1.jpg" alt="">
                <img src="/img/surfhouse/brands/CBC_1.jpg" alt="">
                <img src="/img/surfhouse/brands/Channel-Islands_2.jpg" alt="">
                <img src="/img/surfhouse/brands/Cortez_1.jpg" alt="">
                <img src="/img/surfhouse/brands/Firewire_1.jpg" alt="">
                <img src="/img/surfhouse/brands/Haydenshapes_1.jpg" alt="">
                <img src="/img/surfhouse/brands/Lost.jpg" alt="">
                <img src="/img/surfhouse/brands/Nine-Plus_1.jpg" alt="">
            </div>
            <div class="istagramFeedWrap">
                <div class="instaFeedHead">
                    <i class="fab fa-instagram"></i>
                    <span>Instagram feed:</span> #surfhouse
                </div>
                <div class="instaFeedImages">
                    <img src="/img/surfhouse/instaFeed/1.jpg" alt="">
                    <img src="/img/surfhouse/instaFeed/2.jpg" alt="">
                    <img src="/img/surfhouse/instaFeed/3.jpg" alt="">
                    <img src="/img/surfhouse/instaFeed/4.jpg" alt="">
                    <img src="/img/surfhouse/instaFeed/5.jpg" alt="">
                    <img src="/img/surfhouse/instaFeed/6.jpg" alt="">
                </div>
            </div>
            <div class="socialButtonsWrap">
                <a href="https://www.facebook.com/" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.pinterest.ru/" target="_blank">
                    <i class="fab fa-pinterest"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footerInside">
            <div>
                <div class="columnHead">
                    Category
                </div>
                <div class="columnLinks">
                    <a href="#">Home</a>
                    <a href="#">about us</a>
                    <a href="#">eshop</a>
                    <a href="#">Features</a>
                    <a href="#">new collections</a>
                    <a href="#">blog</a>
                    <a href="#">contact</a>
                </div>
            </div>
            <div>
                <div class="columnHead">
                    Our Account
                </div>
                <div class="columnLinks">
                    <a href="#">Your Account</a>
                    <a href="#">Personal information</a>
                    <a href="#">Addresses</a>
                    <a href="#">Discount</a>
                    <a href="#">Orders history</a>
                    <a href="#">Addresses</a>
                    <a href="#">Search Terms</a>
                </div>
            </div>
            <div>
                <div class="columnHead">
                    Our Support
                </div>
                <div class="columnLinks">
                    <a href="#">Site Map</a>
                    <a href="#">Search Terms</a>
                    <a href="#">Advanced Search</a>
                    <a href="#">Mobile</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Mobile</a>
                    <a href="#">Addresses</a>
                </div>
            </div>
            <div class="newsLetter">
                <div class="columnHead">
                    Newsletter
                </div>
                <div class="columnNewsLetter">
                    <div class="newsLetterText">
                        Join thousands of other people subscribe to our news
                    </div>
                    <input type="text" placeholder="INSERT EMAIL">
                    <button>SUBMIT</button>
                    <div class="cardsWrap">
                        <img src="/img/surfhouse/paymentMethods/american-express.jpg" alt="">
                        <img src="/img/surfhouse/paymentMethods/master-card.jpg" alt="">
                        <img src="/img/surfhouse/paymentMethods/maestro.jpg" alt="">
                        <img src="/img/surfhouse/paymentMethods/paypal.jpg" alt="">
                        <img src="/img/surfhouse/paymentMethods/discover.jpg" alt="">
                        <img src="/img/surfhouse/paymentMethods/visa.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="about">
                <div class="columnHead">
                    About Us
                </div>
                <div class="columnAboutUs">
                    <div class="aboutText">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                        ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                        parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                        pellentesque eu, pretium quis, sem.
                    </div>
                    <div class="aboutPhone">
                        <span>Phone:</span> 1-999-342-9876
                    </div>
                    <div class="aboutEmail">
                        <span>E-mail:</span> info@surfhouse.com
                    </div>
                </div>
            </div>
        </div>
        <div class="footerCopyrights">
            <div class="copyrightsInside">
                <div class="footerCopySign">
                    &copy; <?= $current_year ?> SURFHOUSE. All rights reserved - Designed by theuncreativelab.com
                </div>
                <div class="footerSocials">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-pinterest"></i>
                    <i class="fab fa-google-plus"></i>
                    <i class="fab fa-tumblr-square"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fas fa-rss"></i>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $script ?>"></script>
</body>

</html>

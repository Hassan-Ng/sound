<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="./index.html">Homepage</a></li>
                        <li><a href="./categories.html">Categories</a></li>
                        <li><a href="./blog.html">Our Blog</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/player.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

<script>
    let audio;

    function initializePage() {
        var previousHref = document.referrer;
        var previousBtn = document.querySelector(".control-btns .previous-btn");
        var pattern = /\/listen_song\.php\?id=\d+/;
        if (!pattern.test(previousHref)) {
            previousBtn.removeAttribute("onclick");
            previousBtn.classList.toggle("disabled-btn");
        }

        var nextHref = document.querySelector(".more-songs a").href;
        var nextBtn = document.querySelector(".control-btns .next-btn");
        nextBtn.href = nextHref;
        audio = document.querySelector("audio");

        displayDuration();
    }

    if (window.location.pathname.includes('/listen_song.php')) {
        document.addEventListener('DOMContentLoaded', initializePage);
    }

    function goBack() {
        history.back();
    }

    function play(elem) {
        var icon = elem.querySelector('i');
        icon.classList.toggle("fa-play");
        icon.classList.toggle("fa-pause");
        audio.paused ? audio.play() : audio.pause();
    }

    function displayDuration() {
        var duration = audio.duration;
        var durationDisplay = document.querySelector('.duration');
        var minutes = Math.floor(duration / 60);
        var seconds = Math.floor(duration % 60);
        console.log(`${minutes}:${seconds < 10 ? '00' : ''}${seconds}`);
        durationDisplay.innerText = `${minutes}:${seconds < 10 ? '00' : ''}${seconds}`;
    }

    function updateProgress() {
        var progress = audio.currentTime / audio.duration;
        var progressDisplay = document.querySelector('.bar-progress-active');
        progressDisplay.style.width = `${progress * 100}%`;

        var progressTimerDisplay = document.querySelector('.progress-timer');
        var currentTime = audio.currentTime;
        var minutes = Math.floor(currentTime / 60);
        var seconds = Math.floor(currentTime % 60);
        progressTimerDisplay.innerText = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    }
</script>

</body>

</html>
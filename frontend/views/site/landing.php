<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
?>

<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">
                    Web dasturlash darslarini biz bilan birga o'rganing
                </h1>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 mx-auto">
                <div class="ol-xl-9 mx-auto">
                    <button type="submit" class="btn btn-block btn-lg btn-light">
                        <a href="<?=Url::to(['site/signup']) ?>">Darslarga qo'shilish</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-screen-desktop m-auto text-primary"></i>
                    </div>
                    <h3>To'liq masofaviy</h3>
                    <p class="lead mb-0">
                        Barcha darslar onlayn tarzda olib boriladi
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-layers m-auto text-primary"></i>
                    </div>
                    <h3>O'quv qo'llanma</h3>
                    <p class="lead mb-0">
                        Darslar sifatli o'quv qo'llanmalarga asoslangan
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-check m-auto text-primary"></i>
                    </div>
                    <h3>Mutlaqo tekin<span>&#42;</span></h3>
                    <p class="lead mb-0">
                        <span>&#42;</span>Birinchi 50 nafar foydalanuvchi bepul
                        o'rganadi
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="showcase">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-6 order-lg-2 text-white showcase-img"
                 style="background-image: url('img/bg-showcase-1.jpeg');"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Mobil dasturlash</h2>
                <li class="lead mb-0">Swift</li>
                <li class="lead mb-0">Java</li>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
            <div class="col-lg-6 my-auto showcase-text">
                <h2>Web dasturlash</h2>
                <li class="lead mb-0">HTML</li>
                <li class="lead mb-0">CSS</li>
                <li class="lead mb-0">Bootstrap</li>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 order-lg-2 text-white showcase-img"
                 style="background-image: url('img/bg-showcase-3.jpeg');"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Xorijiy tillar</h2>
                <li class="lead mb-0">Ingliz tili</li>
                <li class="lead mb-0">Rus tili</li>
            </div>
        </div>
    </div>
</section>

<section class="testimonials text-center bg-light">
    <div class="container">
        <h2 class="mb-5">Bizning bitiruvchilarimiz</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="img/boy.jpeg" alt="" />
                    <h5>Muhammadamin U.</h5>
                    <p class="font-weight-light mb-0">
                        "Kutganimdan ancha yuqori natijaga erishdim!"
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="img/girl1.jpg" alt="" />
                    <h5>Shodya P.</h5>
                    <p class="font-weight-light mb-0">
                        "Oldinlari ishonmasdim, endi esa do'stlarimga tavsiya
                        qilyapman."
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="img/boy1.jpeg" alt="" />
                    <h5>Shoxrux Sh.</h5>
                    <p class="font-weight-light mb-0">
                        "Qisqa vaqt ichida shuncha ma'lumotlarni o'rgandim."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h2 class="mb-4">Vaqt ketkazmasdan darslarimizga qo'shiling!</h2>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                    <div class="form-row">
                        <div class="ol-xl-9 mx-auto">
                            <button type="submit" class="btn btn-block btn-lg btn-light">
                                <a href="html_home.html">Darslarga qo'shilish</a>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                <p class="text-muted small mb-4 mb-lg-0">&copy; RIDDIN 2020</p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-3">
                        <a target="_blank" href="https://www.youtube.com/c/riddinuz?sub_confirmation=1">
                            <i class="fab fa-youtube fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mr-3">
                        <a target="_blank" href="https://www.t.me/riddinuz">
                            <i class="fab fa-telegram fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a target="_blank" href="https://www.instagram.com/riddin_uz">
                            <i class="fab fa-instagram fa-2x fa-fw"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

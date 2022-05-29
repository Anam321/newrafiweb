<style>
.card {
    height: 280px;
    width: 300px;
    background: var(--card);
    border-radius: 20px;

    font-family: Montserrat;
    display: flex;
    color: var(--text);
    flex-direction: column;
    align-items: center;
    transition: transform 0.3s, background 0.3s;



}

.card:hover {
    transform: scale(1.1);
}

.imgpro {
    width: 295px;
    height: 158px;
    border-radius: 14px;
    object-fit: cover;
}

.card__title {
    color: var(--text);
    margin-top: 21px;
    font-size: 13px;
    transition: color 0.3s;
    opacity: 0.6;
}

.description {
    margin-top: 8px;
    display: block;
    font-size: 15px;
    transition: color 0.3s;
}

.action {
    height: 40px;
    width: 40px;
    outline: none;
    border: none;
    background: var(--secondary);
    border-radius: 12px;
    cursor: pointer;
    margin-top: auto;


}


* {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 25.33%;
    padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
    content: "";
    clear: both;
    display: table;
}

/* Tata letak responsif - membuat ketiga kolom bertumpuk, bukan bersebelahan */
@media screen and (max-width: 500px) {
    .column {
        width: 50%;
    }
}

@media screen and (max-width: 500px) {
    .card {
        width: 225px;
    }
}

@media screen and (max-width: 500px) {
    .imgpro {
        width: 224px;
    }
}

</style>

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Detail Produk</h2>
            <ol>
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li><a href="<?= base_url() ?>produk">Produk</a></li>
                <li>Detail Produk</li>
            </ol>
        </div>

    </div>
</section>


<section id="doctors" class="doctors section-bg">

    <div class="container shadow p-3 mb-5 bg-body rounded" data-aos="fade-up">


        <div class="row">
            <div class="column">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                        class="imgpro" alt="" />
                    <h2 class="card__title">NEW COLLECTION</h2>
                    <span class="card__description">Summer outfits</span>
                    <button class="btn btn-primary">
                        <span class="mdi mdi-chevron-right"></span>
                    </button>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                        class="imgpro" alt="" />
                    <h2 class="card__title">NEW COLLECTION</h2>
                    <span class="card__description">Summer outfits</span>
                    <button class="btn btn-primary">
                        <span class="mdi mdi-chevron-right"></span>
                    </button>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                        class="imgpro" alt="" />
                    <h2 class="card__title">NEW COLLECTION</h2>
                    <span class="card__description">Summer outfits</span>
                    <button class="btn btn-primary">
                        <span class="mdi mdi-chevron-right"></span>
                    </button>
                </div>
            </div>
        </div>





    </div>


</section>

<section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">

        <div class="text-center">
            <h3>Keadaan Darurat? Bingung Cari Jasa Bengkel Las Yang Professional?</h3>
            <p> Kami akan membantu anda kapan pun anda butuhkan, dan kami siap melayani anda dengan baik.</p>
            <a class="cta-btn scrollto" href="<?= base_url() ?>contact_us">Make an Make an Appointment</a>
        </div>

    </div>
</section>
<script>
var swiper = new Swiper(".mySwiper", {
    grabCursor: true,

    centeredSlide: true,
    slidesPerView: "1.4",
    spaceBetween: 10
});
</script>

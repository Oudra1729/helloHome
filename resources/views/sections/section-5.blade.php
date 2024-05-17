

<section class="section-5">
    <div class="faqs">
        <div class="text">
            <h2 class="title">FAQs</h2>
            <h3 class="subtitle">Comment acheter une maison?</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Porro impedit quis quod harum iusto quasi repudiandae.
                Deleniti voluptas reiciendis, dolor quia temporibus
                provident qui dolorem ullam illo mollitia distinctio
                facere?
            </p>
            <h3 class="subtitle">Comment louer une maison?</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Porro impedit quis quod harum iusto quasi repudiandae.
                Deleniti voluptas reiciendis, dolor quia temporibus
                provident qui dolorem ullam illo mollitia distinctio
                facere?
            </p>
        </div>
        <img src="{{ asset('assets/img/img-house-key.png') }}" alt="" />
    </div>

    <div class="suggestions">
        <div class="item">
            <h3 class="title">
                Les avantages et fonctionnalités du site immobilier
            </h3>
            <p>
                Notre site immobilier vous permet de vendre, acheter et
                louer des maisons facilement
            </p>
            <a href="#" class="btn link">Découvrir</a>
        </div>
        <div class="item">
            <h3 class="title">
                Trouvez votre maison de rêve
            </h3>
            <p>
                Parcourez notre large sélection de maisons à vendre, acheter ou louer.
            </p>
            <a href="#" class="btn link">Découvrir</a>
        </div>
        <div class="item">
            <h3 class="title">
                Vendez votre maison rapidement et facilement
            </h3>
            <p>
                Parcourez notre large sélection de maisons à vendre, acheter.
            </p>
            <a href="#" class="btn link">Découvrir</a>
        </div>
    </div>

    <div class="temoignaages">
        <div class="titles">
            <h3 class="title">Témoignages client</h3>
            <h5 class="subtitle">
                Découvrez que nos clients satisfaits disent de nous
            </h5>
        </div>

        <div class="avis">
            <div class="item">
                <div class="rating">
                    @for ($i = 0; $i < 5; $i++)
                        <img src="{{ asset('assets/icons/star.png') }}" alt="star" />
                    @endfor
                </div>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing
                    elit. Dolorum magnam sapiente ducimus magni sunt debitis
                  id similique, reiciendis possimus maiores veniam

                </p>
                <div class="profile">
                    <img src="{{ asset('assets/icons/account-icon.png') }}" alt="profile" />
                    <span class="name">Ahmed El Alami</span>
                </div>
            </div>
            <!-- Repeat the testimonial item block as needed -->
        </div>
        <div class="navs">
            <div>
                <a href="#"><img src="{{ asset('assets/icons/arrow-left.png') }}" alt="" /></a>
                <a href="#"><img src="{{ asset('assets/icons/arrow-right.png') }}" alt="" /></a>
            </div>
        </div>
    </div>
</section>

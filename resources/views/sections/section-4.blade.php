
<section class="section-4">
    <div class="bg">
        <!-- Uncomment below if you decide to use an image in the background -->
        {{-- <img src="{{ asset('assets/img/house.png') }}" alt="" /> --}}
        <div class="dark-blur"></div>
    </div>
    <div class="content">
        <div class="titles">
            <h1 class="title">Vous souhaitez vendre votre bien immobilier ?</h1>
            <h3 class="subtitle">
                Confiez-nous la vente de votre bien ! Nous vous accompagnons tout au long du processus de mise en vente de votre
                propriété, jusqu'à la signature chez le notaire.
            </h3>
        </div>
        <div class="actions">
            <div>
                <a href="#" class="btn link comm">Commencer</a>
                @if (!Auth()->user())
                <a href="#" class="btn link insc">S'inscrire</a>
                @endif
            </div>
        </div>
    </div>
</section>

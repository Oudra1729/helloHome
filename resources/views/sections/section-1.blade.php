<section class="section-1">
    <div>
        <div class="titles">
            <h1>Trouvez votre maison de rêve dès maintenant</h1>
            <h3>
                Découvrez notre sélection exclusive de propriétés à vendre,
                à acheter et à louer.
            </h3>
        </div>
        <img src="{{ asset('assets/img/house.png') }}" alt="" />
    </div>

    <div class="actions">
        <div class="choices">
            <button class="btn">Acheter</button>
            <button class="btn">Vendre</button>
            <button class="btn btn-light">Louer</button>
        </div>
        <form action="" class="actions-form">
            <div>
                <div class="input-decorated">
                    <img src="{{ asset('assets/icons/location1.png') }}" alt="icon" class="icon" />
                    <select name="city" id="city">
                        <option value="City-1">City-1</option>
                        <option value="City-2">City-2</option>
                        <option value="City-3">City-3</option>
                        <option value="City-4">City-4</option>
                        <option value="City-5">City-5</option>
                    </select>
                </div>
                <div class="separator"></div>
                <div class="input-decorated">
                    <img src="{{ asset('assets/icons/home-icon.png') }}" alt="icon" class="icon" />
                    <select name="home" id="home">
                        <option value="Home-1">Home-1</option>
                        <option value="Home-2">Home-2</option>
                        <option value="Home-3">Home-3</option>
                        <option value="Home-4">Home-4</option>
                    </select>
                </div>
                <div class="separator"></div>
                <div class="input-decorated">
                    <img src="{{ asset('assets/icons/price.png') }}" alt="icon" class="icon" />
                    <select name="city" id="vile">
                        <option value="12345">12345</option>
                        <option value="12345">12345</option>
                        <option value="12345">12345</option>
                        <option value="12345">12345</option>
                        <option value="12345">12345</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn">Allez</button>
        </form>
    </div>
</section>

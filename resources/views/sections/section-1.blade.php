
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
        <form action="{{ route('search') }}" method="GET" class="actions-form">
            <div class="choices">
                <label for="a" class="choice-label">Acheter</label>
                <input type="radio" name="status" id="a" value="À vendre">
                <label for="l" class="choice-label">Louer</label>
                <input type="radio" name="status" id="l" value="À louer">
                {{-- <label for="v" class="choice-label">Vendre</label>
                <input type="radio" name="status" id="v" value="vendre"> --}}
            </div>

            <div class="search">
                <div class="input-decorated">
                    <img src="{{ asset('assets/icons/location1.png') }}" alt="icon" class="icon" />
                    <select name="city" id="property-select" style="width: 100%;">
                        <option value="">Choisissez votre City</option>
                        @foreach ($properties as $property)
                        <option value="{{ $property->city }}">{{ $property->city }}</option>
                        @endforeach
                    </select>
                    {{-- <input   type="text" name="city" id="city" placeholder="Ville" /> --}}
                </div>

                <div class="separator"></div>
                <div class="input-decorated">
                    <img src="{{ asset('assets/icons/home-icon.png') }}" alt="icon" class="icon" />
                    <select name="type" id="">
                        <option value="">Choisissez votre type</option>
                        @foreach ($properties as $property)
                        <option value="{{ $property->type }}">{{ $property->type }}</option>
                       @endforeach
                    </select>
                    {{-- <input type="text" placeholder="Type de bien (ex: maison, appartement, terrain, etc.)" name="type" id="type" /> --}}
                </div>

                <div class="separator"></div>
                <div class="input-decorated">
                    <img src="{{ asset('assets/icons/price.png') }}" alt="icon" class="icon" />
                    <div id="debt-amount-slider">
                        <input type="radio" name="debt-amount" id="1" value="5000" required>
                        <label for="1" data-debt-amount="< $10k"></label>
                        <input type="radio" name="debt-amount" id="2" value="50000" required>
                        <label for="2" data-debt-amount="$10k-25k"></label>
                        <input type="radio" name="debt-amount" id="3" value="300000" required>
                        <label for="3" data-debt-amount="$25k-50k"></label>
                        <input type="radio" name="debt-amount" id="4" value="1000000" required>
                        <label for="4" data-debt-amount="$50k-100k"></label>
                        <input type="radio" name="debt-amount" id="5" value="50000000" required>
                        <label for="5" data-debt-amount="$100k+"></label>
                        {{-- <div id="debt-amount-pos"></div> --}}
                    </div>
                </div>
            </div>
            <button type="submit" class="btn">Allez</button>
        </form>
    </div>
</section>

<script>
    document.querySelectorAll('.section-1 .actions .choices label').forEach(label => {
        label.addEventListener('click', function() {
            // Remove 'clicked' class from all labels
            document.querySelectorAll('.section-1 .actions .choices label').forEach(lbl => lbl.classList.remove('clicked'));

            // Add 'clicked' class to the clicked label
            this.classList.add('clicked');
        });
    });


//Initialize the Select2 plugin and set the maximum number of items to display without scrolling:
$(document).ready(function() {
        $('#property-select').select2({
            maximumSelectionLength: 5,
            placeholder: 'Choisissez votre type',
            allowClear: true
        });
    });


</script>
<script>
    $(document).ready(function() {
        $('#property-select').select2({
            tags: true,
            maximumSelectionLength: 5,
            placeholder: 'Choisissez votre type',
            allowClear: true,
            createTag: function(params) {
                return {
                    id: params.term,
                    text: params.term,
                    newOption: true
                };
            },
            templateResult: function(data) {
                var $result = $("<span></span>");

                $result.text(data.text);

                if (data.newOption) {
                    $result.append(" <em>(new)</em>");
                }

                return $result;
            }
        });
    });
</script>


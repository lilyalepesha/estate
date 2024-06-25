<section class="best">
    <h1 style="text-align: center; color: white; font-weight: bold">{{ $project->region?->street }}</h1>
    <input id="region" type="hidden" value="{{ $project->region?->name . ' ' . $project->region?->street }}">
    <div class="container best__container">
        <div class="best__image-wrapper">
            @if(!empty($project->main_image))
                <img src="{{ $project->main_image }}" alt="best" class="big-image image">
            @endif

            @if(!empty($project->small_images))
                <div class="small-images">
                    @foreach($project->small_images as $image)
                        <img class="image" src="{{ $image }}" alt="best">
                    @endforeach
                </div>
            @endif
        </div>
        @if(!empty($project->big_images))
            <div class="best__image-wrapper">
                @foreach($project->big_images as $image)
                    <img class="image" src="{{ $image }}" alt="best">
                @endforeach
            </div>
        @endif

        <div class="best__description">
            <div>
                <h3 class="best__description-title">
                    Cтоимость
                </h3>
                <p class="best__description-text">{{ $project->price }} BYN</p>
            </div>
            <div>
                <h3 class="best__description-title">
                    Общая площадь
                </h3>
                <p class="best__description-text">{{ $project->total_area }} <sup>2</sup></p>
            </div>
            <div>
                <h3 class="best__description-title">
                    Жилая площадь
                </h3>
                <p class="best__description-text">{{ $project->living_space }} <sup>2</sup></p>
            </div>
            <div>
                <h3 class="best__description-title">
                    Тип недвижимости
                </h3>
                <p class="best__description-text">{{ \App\Enums\ProjectTypeEnum::tryFrom($project->type)?->label() }}</p>
            </div>
        </div>
        <div class="best__content">
            <h3 class="best__content-title">
                Описание
            </h3>
            <p class="best__content-text">
                {{ $project->description }}
            </p>
            <div style="display: flex; justify-content: center; align-items: center; column-gap: 15px">
                <h3 class="best__content-title">
                    Телефон для связи:
                </h3>
                <p class="best__content-text">
                    {{ $project->phone }}
                </p>
            </div>
        </div>

        <ul class="best__list">
            @foreach($properties as $property)
                <li class="best__list-item">
                    {{ $property->property->value }}
                </li>
            @endforeach
        </ul>

        <div class="best__map">
            <h2 class="best__map-title">Объект недвижимости на карте</h2>
            <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2700.0928759792127!2d9.623470076381876!3d47.41012957117247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479b169aecabd24d%3A0x73fe2a3639d01ba0!2siframe%20AG!5e0!3m2!1sru!2sby!4v1719352177113!5m2!1sru!2sby" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>
</section>
<script>
    const address = document.getElementById('region').value.trim();
    if (address) {
        const encodedAddress = encodeURIComponent(address);
        const iframeSrc = `https://www.google.com/maps?q=${encodedAddress}&output=embed`;
        document.getElementById('map').src = iframeSrc;
    } else {
        alert('Address not found');
    }
</script>

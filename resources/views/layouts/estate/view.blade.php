<section class="best">
    <h1 style="text-align: center; color: white; font-weight: bold">{{ $project->region->street }}</h1>
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
        </div>
        <ul class="best__list">
            @foreach($properties as $property)
                <li class="best__list-item">
                    {{ $property->property->value }}
                </li>
            @endforeach
        </ul>
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>
</section>

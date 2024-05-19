<section class="best">
    <div class="container best__container">
        <div class="best__image-wrapper">

            <img src="{{ $project->main_image }}" alt="best" class="big-image">
            <div class="small-images">
                @foreach($project->small_images as $image)
                    <img src="{{ $image }}" alt="best">
                @endforeach
            </div>
        </div>
        <div class="best__image-wrapper">
            @foreach($project->big_images as $image)
                <img src="{{ $image }}" alt="best">
            @endforeach
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
</section>

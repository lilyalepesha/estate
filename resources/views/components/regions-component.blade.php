<section class="regions">
    <div class="regions__container container">
        <h3 class="regions__title">
            выбирай любой регион Беларуси
        </h3>
        <!-- Slider main container -->
        <div class="swiper regions__slider">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper regions__slider-wrapper">
                @foreach($regions as $region)
                    <div class="swiper-slide regions__slide">
                        <div class="regions__slide-image">
                            <img src="{{ asset('storage/' . $region->image_url) }}" alt="region">
                        </div>
                        <span class="regions__slide-overlay">{{ $region->name }} </span>
                    </div>
                @endforeach
            </div>
            <!-- If we need navigation buttons -->
            <div class="regions__slider-button--prev swiper-button-prev"></div>
            <div class="regions__slider-button-next swiper-button-next"></div>
        </div>

    </div>
</section>

<section class="regions">
    <div class="regions__container container">
        <h3 class="regions__title">
            выбирай любой регион Беларуси
        </h3>
        <!-- Slider main container -->
        <div class="swiper regions__slider">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper regions__slider-wrapper">
                @foreach($regions as $key => $value)
                    <a class="swiper-slide regions__slide" href="{{ route('estate.index', ['region' => $key]) }}">
                        <div class="regions__slide-image">
                            <img src="{{ asset('storage/' . $value) }}" alt="region">
                        </div>
                        <span class="regions__slide-overlay">{{ $key }} </span>
                    </a>
                @endforeach
            </div>
            <!-- If we need navigation buttons -->
            <div class="regions__slider-button--prev swiper-button-prev"></div>
            <div class="regions__slider-button-next swiper-button-next"></div>
        </div>

    </div>
</section>

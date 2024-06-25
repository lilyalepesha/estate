<section class="architects">
    <div class="architects__container container">
        <div class="architects__items">
            @forelse($architects as $architect)
                <a href="{{ route('architect.show', $architect->id) }}">
                    <div class="architects__item">
                        <div class="architects__item-image">
                            <img src="{{ asset('storage/' . $architect->avatar_url) }}" alt="avatar">
                        </div>
                        <div style="margin-top: 15px" class="architect__image-stars architect__stars" data-rating="{{ $architect->avg_rating }}">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="star-container" data-value="{{ $i }}">
                                    <svg class="star-bg" width="25" height="25" viewBox="0 0 33 31" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z"/>
                                    </svg>
                                    <svg class="star-fg" width="25" height="25" viewBox="0 0 33 31" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z"/>
                                    </svg>
                                </div>
                            @endfor
                            <p class="architect__stars-rating">{{ round($architect->avg_rating, 1) }}</p>
                        </div>
                        <div style="margin-top: 10px" class="architects__item-content architects__content">
                            <p class="architects__content-name">
                                {{ \Illuminate\Support\Str::ucfirst($architect->last_name)
                                     . ' ' . \Illuminate\Support\Str::ucfirst($architect->name)
                                     . ' ' . \Illuminate\Support\Str::ucfirst($architect->father_name)
                                 }}
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <p style="color: white; display: flex; align-items: center; justify-content: center; font-size: 36px; font-weight: bold">
                    Список пуст</p>
            @endforelse
        </div>
        <div style="display: flex; justify-content: center; margin-top: 50px">
            {{ $architects->withQueryString()->links() }}
        </div>
    </div>
</section>

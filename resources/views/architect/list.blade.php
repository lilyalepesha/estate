<section class="architects">
    <div class="architects__container container">
        <div class="architects__items">
            @foreach($architects as $architect)
                <a href="{{ route('architect.show', $architect->id) }}">
                    <div class="architects__item">
                        <div class="architects__item-image">
                            <img src="{{ asset('storage/' . $architect->avatar_url) }}" alt="avatar">
                        </div>
                        <div class="architects__item-content architects__content">
                            <p class="architects__content-name">
                                {{ \Illuminate\Support\Str::ucfirst($architect->name)
                                     . ' ' . \Illuminate\Support\Str::ucfirst($architect->last_name)
                                     . ' ' . \Illuminate\Support\Str::ucfirst($architect->father_name)
                                 }}
                            </p>
                            <p class="architects__content-description">
                                {{ $architect->description }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div style="display: flex; justify-content: center; margin-top: 50px">
            {{ $architects->withQueryString()->links() }}
        </div>
    </div>
</section>

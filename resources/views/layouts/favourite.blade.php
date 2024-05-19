@if(auth()->check())
    <section class="goods">
        <div class="goods__container container">
            <div class="goods__items">
                @foreach($objects as $object)
                    <a href="{{ route('estate.view', $object->id) }}" class="goods__item-link">
                        <div class="goods__item">
                            <div class="goods__item-image">
                                <img src="{{ $object->image_url }}" alt="{{ $object->name }}">
                            </div>
                            <div class="goods__item-info">
                                <p>Площадь {{ $object->area }} м<sup>2</sup></p>
                            </div>
                            <div class="goods__item-cost goods__cost">
                                <p>Цена за м<sup>2</sup></p>
                                <div class="goods__cost-text">{{ $object->price }}</div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div style="display: flex; justify-content: center; margin-top: 50px">
                {{ $objects->withQueryString()->links() }}
            </div>
        </div>
    </section>
@else
    <section class="goods">
        <div class="goods__container container">
            <div class="goods__items">
                @foreach($objects as $object)
                    <a href="{{ route('goods.view', $object->id) }}" class="goods__item-link">
                        <div class="goods__item">
                            <div class="goods__item-image">
                                <img src="{{ $object->image_url }}" alt="{{ $object->name }}">
                            </div>
                            <div class="goods__item-info">
                                <p>Площадь {{ $object->area }} м<sup>2</sup></p>
                            </div>
                            <div class="goods__item-cost goods__cost">
                                <p>Цена за м<sup>2</sup></p>
                                <div class="goods__cost-text">{{ $object->price }}</div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div style="display: flex; justify-content: center; margin-top: 50px">
                {{ $object->withQueryString()->links() }}
            </div>
        </div>
    </section>
@endif

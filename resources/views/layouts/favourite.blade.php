<section class="goods">
    <div class="goods__container container">
        <div class="goods__items">
            @forelse($objects as $object)
                <a href="{{ route('estate.view', $object->id) }}" class="goods__item-link">
                    <div class="goods__item">
                        <div class="goods__item-image">
                            <img src="{{ $object->image_url }}" alt="{{ $object->name }}">
                        </div>
                        <div class="goods__item-info">
                            <p>Площадь {{ $object->area }} м<sup>2</sup></p>
                        </div>
                        <div class="goods__item-info">
                            <p>Название проекта <b>{{ $project->name }}</b></p>
                        </div>
                        <div class="goods__item-info">
                            <p>Площадь {{ $project->area }} м<sup>2</sup></p>
                        </div>
                        <div class="goods__item-cost goods__cost">
                            <p>Цена</p>
                            <div class="goods__cost-text">{{ $project->price }} BYN</div>
                        </div>
                    </div>
                </a>
            @empty
                <p style="color: white; display: flex; align-items: center; justify-content: center; font-size: 36px; font-weight: bold">Список пуст</p>
            @endforelse
        </div>
        <div style="display: flex; justify-content: center; margin-top: 50px">
            {{ $objects->withQueryString()->links() }}
        </div>
    </div>
</section>

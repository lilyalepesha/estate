<section class="goods">
    <div class="goods__container container">
        <form action="{{ route('goods.index') }}" method="GET">
            <div class="goods__filter">
                <div class="goods__filter-wrapper">
                    <select name="type" id="type" class="goods__filter-select">
                        <option value="" selected>Выберите тип</option>
                        @foreach(\App\Enums\ProjectTypeEnum::cases() as $type)
                            <option value="{{ $type->value }}" {{ request('type') == $type->value ? 'selected' : '' }}>
                                {{ $type->label() }}
                            </option>
                        @endforeach
                    </select>
                    <div class="slash">|</div>
                    <input name="name" class="goods__filter-select" placeholder="Введите название проекта">
                </div>
                <button class="goods__filter-button">
                    <svg width="10" height="10" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.25 14.25C11.5637 14.25 14.25 11.5637 14.25 8.25C14.25 4.93629 11.5637 2.25 8.25 2.25C4.93629 2.25 2.25 4.93629 2.25 8.25C2.25 11.5637 4.93629 14.25 8.25 14.25Z"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.7498 15.7498L12.4873 12.4873" stroke="white" stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    <span style="font-size: 8px">Поиск</span>
                </button>
            </div>
        </form>
        <div class="goods__items">
            @foreach($projects as $project)
                <a href="{{ route('goods.view', $project->id) }}" class="goods__item-link">
                    <div class="goods__item">
                        <div style="margin-bottom: 10px" class="goods__item-image">
                            <img src="{{ $project->image_url }}" alt="{{ $project->name }}">
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
            @endforeach
        </div>
        <div style="display: flex; justify-content: center; margin-top: 50px">
            {{ $projects->withQueryString()->links() }}
        </div>
    </div>
</section>

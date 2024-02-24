<section class="goods">
    <div class="goods__container container">
        <div class="goods__filter">
            <div class="goods__filter-wrapper">
                <select name="type" id="type" class="goods__filter-select">
                    <option value="" selected>Выберите тип</option> <!-- Добавляем первый вариант -->
                    @foreach(\App\Enums\ProjectTypeEnum::cases() as $type)
                        <option value="{{ $type->value }}">{{ $type->label() }}</option>
                    @endforeach
                </select>
                <div class="slash">|</div> <!-- Добавляем разделитель -->
                <select name="region" id="region" class="goods__filter-select">
                    <option value="" selected>Выберите регион</option> <!-- Добавляем первый вариант -->
                    @foreach(\App\Models\Region::query()->pluck('name', 'id') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <button class="goods__filter-button">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.25 14.25C11.5637 14.25 14.25 11.5637 14.25 8.25C14.25 4.93629 11.5637 2.25 8.25 2.25C4.93629 2.25 2.25 4.93629 2.25 8.25C2.25 11.5637 4.93629 14.25 8.25 14.25Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15.7498 15.7498L12.4873 12.4873" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Поиск
            </button>
        </div>
        <div class="goods__items">
        </div>
    </div>
</section>

<section class="goods">
    <div class="goods__container container">
        <form action="{{ route('estate.index') }}" method="GET">
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
                    <select name="area" id="area" class="goods__filter-select">
                        <option value="" selected>Выберите область</option>
                        @foreach(\App\Models\Region::query()->pluck('area')->filter() as $area)
                            <option value="{{ $area }}" {{ $area }}>
                                {{ $area }}
                            </option>
                        @endforeach
                    </select>
                    <div class="slash">|</div>
                    <select name="region" id="region" class="goods__filter-select">
                        <option value="" selected>Выберите город</option>
                        @foreach(\App\Models\Region::query()->pluck('name') as $region)
                            <option value="{{ $region }}" {{ $region }}>
                                {{ $region }}
                            </option>
                        @endforeach
                    </select>
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
            @foreach($estates as $estate)
                <a href="{{ route('estate.view', $estate->id) }}" class="goods__item-link">
                    <div class="goods__item">
                        @if(auth()->guard('architects')->check())
                            <input type="hidden" name="user_type" id="userType" value="{{ $userType }}">
                            <input type="hidden" name="favourite_type" id="favouriteType" value="{{ $favouriteType }}">
                            <input type="hidden" name="favourite_id" id="favouriteId" value="{{ $estate->id }}">
                            <input type="hidden" name="user_id" id="userId"
                                   value="{{ \Illuminate\Support\Facades\Auth::guard('architects')->id() }}">
                        @endif
                        @auth
                            <input type="hidden" name="user_type" id="userType" value="{{ $userType }}">
                            <input type="hidden" name="favourite_type" id="favouriteType" value="{{ $favouriteType }}">
                            <input type="hidden" name="favourite_id" id="favouriteId" value="{{ $estate->id }}">
                            <input type="hidden" name="user_id" id="userId"
                                   value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                        @endauth
                        @auth
                            <div class="goods__item-start-container">
                                <svg class="goods_item-start" width="33" height="31" viewBox="0 0 33 31" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.9743 1.00294L20.1757 10.6032C20.3799 11.2156 20.9531 11.6287 21.5987 11.6287H31.9023C32.3898 11.6287 32.589 12.2551 32.1912 12.5368L23.9005 18.4059C23.361 18.7877 23.1351 19.4777 23.3442 20.1047L26.5214 29.6325C26.6743 30.0909 26.1526 30.4779 25.7582 30.1988L17.3667 24.2583C16.8474 23.8907 16.1526 23.8907 15.6333 24.2583L7.24179 30.1988C6.84741 30.4779 6.32572 30.0909 6.47857 29.6325L9.65582 20.1047C9.8649 19.4777 9.63897 18.7877 9.09954 18.4059L0.808844 12.5368C0.410949 12.2551 0.610239 11.6287 1.09774 11.6287H11.4013C12.0469 11.6287 12.6201 11.2156 12.8243 10.6032L16.0257 1.00293C16.1777 0.547167 16.8223 0.547164 16.9743 1.00294Z"
                                        stroke="white"/>
                                </svg>
                            </div>
                        @endauth
                        @if(auth()->guard('architects')->check())
                            <div class="goods__item-start-container">
                                <svg class="goods_item-start" width="33" height="31" viewBox="0 0 33 31" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.9743 1.00294L20.1757 10.6032C20.3799 11.2156 20.9531 11.6287 21.5987 11.6287H31.9023C32.3898 11.6287 32.589 12.2551 32.1912 12.5368L23.9005 18.4059C23.361 18.7877 23.1351 19.4777 23.3442 20.1047L26.5214 29.6325C26.6743 30.0909 26.1526 30.4779 25.7582 30.1988L17.3667 24.2583C16.8474 23.8907 16.1526 23.8907 15.6333 24.2583L7.24179 30.1988C6.84741 30.4779 6.32572 30.0909 6.47857 29.6325L9.65582 20.1047C9.8649 19.4777 9.63897 18.7877 9.09954 18.4059L0.808844 12.5368C0.410949 12.2551 0.610239 11.6287 1.09774 11.6287H11.4013C12.0469 11.6287 12.6201 11.2156 12.8243 10.6032L16.0257 1.00293C16.1777 0.547167 16.8223 0.547164 16.9743 1.00294Z"
                                        stroke="white"/>
                                </svg>
                            </div>
                        @endif
                        <div class="goods__item-image">
                            <img src="{{ $estate->image_url }}" alt="{{ $estate->name }}">
                        </div>
                        <div class="goods__item-info">
                            <p>Площадь {{ $estate->area }} м<sup>2</sup></p>
                        </div>
                        <div class="goods__item-cost goods__cost">
                            <p>Цена:</p>
                            <div class="goods__cost-text">{{ $estate->price }} BYN</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div style="display: flex; justify-content: center; margin-top: 50px">
            {{ $estates->withQueryString()->links() }}
        </div>
    </div>
</section>

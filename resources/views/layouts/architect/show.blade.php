<section class="architect">
    <div class="architect__container container">
        <div class="architect__item">
            <div class="architect__item-image architect__image">
                <img src="{{ asset('storage/' . $architect->avatar_url) }}" alt="architect">
                <p class="architect__image-title">
                    {{ \Illuminate\Support\Str::ucfirst($architect->name)
                        . ' ' . \Illuminate\Support\Str::ucfirst($architect->last_name)
                        . ' ' . \Illuminate\Support\Str::ucfirst($architect->father_name)
                    }}
                </p>
                <div class="architect__image-stars architect__stars">
                    <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                    </svg>
                    <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                    </svg>
                    <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                    </svg>
                    <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                    </svg>
                    <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                    </svg>
                    <p class="architect__stars-rating">
                        4.9
                    </p>
                </div>
            </div>
            <div class="architect__item-content architect__content">
                <h3 class="architect__content-title">
                    Описание
                </h3>
                <p class="architect__content-description">
                    {{ $architect->description }}
                </p>
            </div>
        </div>
        <p class="goods__items-title">Личные работы</p>
        <div class="goods__items">
            @foreach($projects as $project)
                <a href="{{ route('goods.view', $project->id) }}" class="goods__item-link">
                    <div class="goods__item">
                        <div class="goods__item-image">
                            <img src="{{ $project->image_url }}" alt="{{ $project->name }}">
                        </div>
                        <div class="goods__item-info">
                            <p>Площадь {{ $project->area }} м<sup>2</sup></p>
                        </div>
                        <div class="goods__item-cost goods__cost">
                            <p>Цена за м<sup>2</sup></p>
                            <div class="goods__cost-text">{{ $project->price_per_meter }}</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div style="display: flex; justify-content: center; margin-top: 50px">
            {{ $projects->withQueryString()->links() }}
        </div>
        @auth
            <div class="architect__comment">
                <h1 class="architect__comment-title">Оставьте комментарий</h1>
                <form method="POST" action="{{ route('review.store') }}" class="architect__comment-form">
                    @csrf
                    <div class="architect__image-stars architect__stars">
                        <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                        </svg>
                        <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                        </svg>
                        <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                        </svg>
                        <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                        </svg>
                        <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                        </svg>
                    </div>
                    <input type="hidden" name="architect_id" value="{{ $architect->id }}">
                    <textarea name="text" class="architect__comment" placeholder="Напишите комментарий"></textarea>
                    <button type="submit">Отправить</button>
                </form>
            </div>
        @endauth
        <h3 class="comments__items-title">Отзывы</h3>
        <div class="comments__items">
            @foreach($comments as $comment)
                <div class="comment__item">
                    <div class="comment__item-title">
                        <img src="{{ asset('storage/' . \App\Models\User::query()->firstWhere('id', '=', $comment->user_id)->avatar_url) }}" alt="avatar">
                        <p>
                            {{ \Illuminate\Support\Str::ucfirst( \App\Models\User::query()->firstWhere('id', '=', $comment->user_id)?->name) ??  \Illuminate\Support\Str::ucfirst( \App\Models\User::query()->firstWhere('id', '=', $comment->user_id)?->email) }}
                        </p>
                    </div>
                    <div class="comment__item-stars">
                        <div class="architect__image-stars architect__stars">
                            <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                            </svg>
                            <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                            </svg>
                            <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                            </svg>
                            <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                            </svg>
                            <svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.1953 0.193359L20.0121 11.9401L32.3633 11.9401L22.3709 19.1999L26.1877 30.9466L16.1953 23.6868L6.20296 30.9466L10.0197 19.1999L0.0273514 11.9401L12.3786 11.9401L16.1953 0.193359Z" fill="#8F90A6"/>
                            </svg>
                        </div>
                    </div>
                    <div class="comment__item-text">
                        {{ $comment->text }}
                    </div>
                </div>
            @endforeach
        </div>
        <div style="display: flex; justify-content: center; margin-top: 50px">
            {{ $comments->withQueryString()->links() }}
        </div>
    </div>
</section>

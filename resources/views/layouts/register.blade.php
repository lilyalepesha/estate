<section class="register">
    <div class="register__container container">
        <h1 class="register__title">
            Создайте свою учетную запись
        </h1>
        <form class="register__form form" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="register__form-wrapper form__wrapper">
                <div class="register__form-input-wrapper form__input-wrapper">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_3_2756" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="5" y="3" width="15" height="18">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 7C14.5 5.897 13.603 5 12.5 5C11.397 5 10.5 5.897 10.5 7C10.5 8.103 11.397 9 12.5 9C13.603 9 14.5 8.103 14.5 7ZM16.5 7C16.5 9.206 14.706 11 12.5 11C10.294 11 8.5 9.206 8.5 7C8.5 4.794 10.294 3 12.5 3C14.706 3 16.5 4.794 16.5 7ZM5.5 20C5.5 16.14 8.641 13 12.5 13C16.359 13 19.5 16.14 19.5 20C19.5 20.552 19.053 21 18.5 21C17.947 21 17.5 20.552 17.5 20C17.5 17.243 15.257 15 12.5 15C9.743 15 7.5 17.243 7.5 20C7.5 20.552 7.053 21 6.5 21C5.947 21 5.5 20.552 5.5 20Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_3_2756)">
                            <rect x="0.5" width="24" height="24" fill="#8F90A6"/>
                        </g>
                    </svg>
                    <input name="email" value="{{ old('email') }}" class="register__form-input form__input" type="text" required placeholder="Email">

                    <div class="error-validation">
                        @error('email')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="register__form-input-wrapper form__input-wrapper">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_3_2761" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="2" width="17" height="20">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 16C11.948 16 11.5 15.552 11.5 15C11.5 14.448 11.948 14 12.5 14C13.052 14 13.5 14.448 13.5 15C13.5 15.552 13.052 16 12.5 16ZM12.5 12C10.846 12 9.5 13.346 9.5 15C9.5 16.654 10.846 18 12.5 18C14.154 18 15.5 16.654 15.5 15C15.5 13.346 14.154 12 12.5 12ZM18.5 19C18.5 19.552 18.052 20 17.5 20H7.5C6.948 20 6.5 19.552 6.5 19V11C6.5 10.448 6.948 10 7.5 10H8.5H10.5H14.5H16.5H17.5C18.052 10 18.5 10.448 18.5 11V19ZM10.5 6.111C10.5 4.947 11.397 4 12.5 4C13.603 4 14.5 4.947 14.5 6.111V8H10.5V6.111ZM17.5 8H16.5V6.111C16.5 3.845 14.706 2 12.5 2C10.294 2 8.5 3.845 8.5 6.111V8H7.5C5.846 8 4.5 9.346 4.5 11V19C4.5 20.654 5.846 22 7.5 22H17.5C19.154 22 20.5 20.654 20.5 19V11C20.5 9.346 19.154 8 17.5 8Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_3_2761)">
                            <rect x="0.5" width="24" height="24" fill="#8F90A6"/>
                        </g>
                    </svg>

                    <input name="password" value="{{ old('password') }}"  class="register__form-input form__input" type="password" required placeholder="Пароль">

                    <div class="error-validation">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="register__form-input-wrapper form__input-wrapper">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_3_2761" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="2" width="17" height="20">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 16C11.948 16 11.5 15.552 11.5 15C11.5 14.448 11.948 14 12.5 14C13.052 14 13.5 14.448 13.5 15C13.5 15.552 13.052 16 12.5 16ZM12.5 12C10.846 12 9.5 13.346 9.5 15C9.5 16.654 10.846 18 12.5 18C14.154 18 15.5 16.654 15.5 15C15.5 13.346 14.154 12 12.5 12ZM18.5 19C18.5 19.552 18.052 20 17.5 20H7.5C6.948 20 6.5 19.552 6.5 19V11C6.5 10.448 6.948 10 7.5 10H8.5H10.5H14.5H16.5H17.5C18.052 10 18.5 10.448 18.5 11V19ZM10.5 6.111C10.5 4.947 11.397 4 12.5 4C13.603 4 14.5 4.947 14.5 6.111V8H10.5V6.111ZM17.5 8H16.5V6.111C16.5 3.845 14.706 2 12.5 2C10.294 2 8.5 3.845 8.5 6.111V8H7.5C5.846 8 4.5 9.346 4.5 11V19C4.5 20.654 5.846 22 7.5 22H17.5C19.154 22 20.5 20.654 20.5 19V11C20.5 9.346 19.154 8 17.5 8Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_3_2761)">
                            <rect x="0.5" width="24" height="24" fill="#8F90A6"/>
                        </g>
                    </svg>

                    <input name="password_confirmation" value="{{ old('password_confirmation') }}"  class="register__form-input form__input" type="password" required placeholder="Пароль">

                    <div class="error-validation">
                        @error('password_confirmation')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="register__form-input-wrapper form__input-wrapper">
                    <input name="avatar" class="register__form-input--file register__form-input" type="file" required>
                    <div class="error-validation">
                        @error('avatar')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <label for="remember" class="register__form__checkbox">
                <input type="checkbox" id="remember" name="remember">
                Запомнить меня
            </label>
            <button class="register__form-button blue-button" type="submit">Войти</button>
        </form>
        <div class="form__registration">
            Уже есть аккаунт? <a href="{{ route('login.index') }}">Войти</a>
        </div>
    </div>
</section>

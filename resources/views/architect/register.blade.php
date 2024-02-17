<section class="architect_register">
    <div class="architect_register__container container">
        <h1 class="architect_register__title">
            Оставьте заявку
        </h1>
        <form class="architect_register__form form" action="{{ route('register.store') }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="architect_register__form-wrapper form__wrapper">
                <div class="architect_register__form-input-wrapper form__input-wrapper">
                    <input name="email" value="{{ old('email') }}" class="architect_register__form-input form__input" type="text"
                           required placeholder="Email">

                    <div class="error-validation">
                        @error('email')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="architect_register__form-input-wrapper form__input-wrapper">

                    <input name="password" value="{{ old('password') }}" class="architect_register__form-input form__input"
                           type="password" required placeholder="Пароль">

                    <div class="error-validation">
                        @error('password')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="architect_register__form-input-wrapper form__input-wrapper">

                    <input name="password_confirmation" value="{{ old('password_confirmation') }}"
                           class="architect_register__form-input form__input" type="password" required placeholder="Пароль">

                    <div class="error-validation">
                        @error('password_confirmation')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="architect_register__form-input-wrapper form__input-wrapper">
                    <input name="avatar" class="architect_register__form-input--file architect_register__form-input" type="file" required>
                    <div class="error-validation">
                        @error('avatar')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <label for="remember" class="architect_register__form__checkbox">
                <input type="checkbox" id="remember" name="remember">
                Запомнить меня
            </label>
            <button class="architect_register__form-button blue-button" type="submit">Войти</button>
        </form>
        <div class="form__registration">
            Уже есть аккаунт? <a href="{{ route('login.index') }}">Войти</a>
        </div>
    </div>
</section>

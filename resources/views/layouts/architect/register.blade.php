<section class="architect_register">
    <div class="architect_register__container container">
        <h1 class="architect_register__title">
            Оставьте заявку
        </h1>
        <form class="architect_register__form form" action="{{ route('architects.register.store') }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="architect_register__form-wrapper form__wrapper">
                <div class="architect_register__form-input-wrapper form__input-wrapper">
                    <input name="name" value="{{ old('name') }}" class="architect_register__form-input form__input"
                           type="text" required placeholder="Имя">

                    <div class="error-validation">
                        @error('name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="architect_register__form-input-wrapper form__input-wrapper">
                    <input name="last_name" value="{{ old('last_name') }}" class="architect_register__form-input form__input"
                           type="text" required placeholder="Фамилия">

                    <div class="error-validation">
                        @error('last_name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="architect_register__form-input-wrapper form__input-wrapper">
                    <input name="father_name" value="{{ old('father_name') }}" class="architect_register__form-input form__input"
                           type="text" required placeholder="Отчество">

                    <div class="error-validation">
                        @error('father_name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>

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
                    <input name="avatar" class="architect_register__form-input--file architect_register__form-input" type="file" required>
                    <div class="error-validation">
                        @error('avatar')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="architect_register__form-button blue-button" type="submit">Войти</button>
        </form>
        <div class="architect_form__registration">
            Уже есть аккаунт? <a href="{{ route('architect.login.index') }}">Войти</a>
        </div>
    </div>
</section>

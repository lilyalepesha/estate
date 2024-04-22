document.addEventListener('DOMContentLoaded', function() {
    const filterButton = document.querySelector('.goods__filter-button');

    loadProjects();

    filterButton.addEventListener('click', function() {
        // Загрузка отфильтрованных проектов при клике на кнопку фильтра
        loadProjects();
    });
});

// Функция для загрузки проектов
function loadProjects() {
    const type = document.getElementById('type').value;
    const region = document.getElementById('region').value;

    let url = '/api/goods';

    // Добавляем параметры к URL, если они не пустые
    if (type.trim() !== '' || region.trim() !== '') {
        url += `?type=${type}&region=${region}`;
    }

    fetch(url, {
        method: 'GET', // Используем метод GET для получения данных
        headers: {
            'Content-Type': 'application/json', // Устанавливаем заголовок Content-Type
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Получаем CSRF токен
        },
    })
        .then(response => response.json()) // Преобразуем ответ сервера в JSON
        .then(data => {
            // Обновляем данные на странице
            updateGoodsItems(data.data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Функция для обновления товаров на странице
function updateGoodsItems(data) {
    const goodsItemsContainer = document.querySelector('.goods__items');
    goodsItemsContainer.innerHTML = ''; // Очищаем контейнер товаров

    // Добавляем новые товары на страницу
    data.forEach(item => {
        const isFavorite = item.is_favourite; // Получаем состояние избранного из API
        const goodsItem = `
        <div class="goods__item" data-id="${item.id}"> <!-- Добавлен атрибут data-id -->
            <div class="goods__item-start-container">
                <svg class="goods_item-start ${isFavorite ? 'active' : ''}" width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.9743 1.00294L20.1757 10.6032C20.3799 11.2156 20.9531 11.6287 21.5987 11.6287H31.9023C32.3898 11.6287 32.589 12.2551 32.1912 12.5368L23.9005 18.4059C23.361 18.7877 23.1351 19.4777 23.3442 20.1047L26.5214 29.6325C26.6743 30.0909 26.1526 30.4779 25.7582 30.1988L17.3667 24.2583C16.8474 23.8907 16.1526 23.8907 15.6333 24.2583L7.24179 30.1988C6.84741 30.4779 6.32572 30.0909 6.47857 29.6325L9.65582 20.1047C9.8649 19.4777 9.63897 18.7877 9.09954 18.4059L0.808844 12.5368C0.410949 12.2551 0.610239 11.6287 1.09774 11.6287H11.4013C12.0469 11.6287 12.6201 11.2156 12.8243 10.6032L16.0257 1.00293C16.1777 0.547167 16.8223 0.547164 16.9743 1.00294Z" stroke="white"/>
                </svg>
            </div>
            <div class="goods__item-image">
                <img src="${item.image_url}" alt="#!">
            </div>
            <div class="goods__item-info">
                <p>${item.region_name}</p>
                <p>${item.area} м<sup>2</sup></p>
            </div>
            <h3 class="goods__item-title">${item.street}</h3>
            <div class="goods__item-cost goods__cost">
                <p>Цена за м<sup>2</sup></p>
                <div class="goods__cost-text">${item.price}</div>
            </div>
        </div>
        `;
        goodsItemsContainer.innerHTML += goodsItem;
    });

    // Добавляем обработчик клика на звезду
    const starContainers = document.querySelectorAll('.goods__item-start-container');
    starContainers.forEach(starContainer => {
        starContainer.addEventListener('click', function() {
            const projectId = this.closest('.goods__item').getAttribute('data-id'); // Получаем ID проекта
            const isFavorite = !this.querySelector('.goods_item-start').classList.contains('active'); // Получаем текущее состояние избранного

            this.querySelector('.goods_item-start').classList.toggle('active', isFavorite); // Добавляем/удаляем класс active при клике на звезду

            toggleFavorite(projectId, isFavorite); // Вызываем функцию для обновления состояния избранного
        });
    });
}

// Функция для обновления состояния избранного
function toggleFavorite(projectId, isFavorite) {
    fetch('/api/update/favourites', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            project_id: projectId,
            is_favourite: isFavorite // Отправляем текущее состояние избранного на сервер
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Избранное обновлено успешно');
                // Сохраняем состояние избранного в локальном хранилище
                localStorage.setItem(`project_${projectId}_favorite`, isFavorite);
            } else {
                console.error('Ошибка при обновлении избранного:', data.message);
            }
        })
        .catch(error => {
            console.error('Ошибка при выполнении запроса:', error);
        });
}

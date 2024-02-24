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
        const goodsItem = `
            <div class="goods__item">
                <div class="goods__item-image">
                    <img src="${item.image_url}" alt="#!">
                </div>
                <div class="goods__item-info">
                    <p>${item.region_name}</p>
                    <p>${item.area} м<sup>2</sup</p>
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
}

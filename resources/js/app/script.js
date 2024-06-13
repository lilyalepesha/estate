document.addEventListener('DOMContentLoaded', () => {
    const showMoreButton = document.getElementById('show-more-btn');
    const estateItems = document.getElementById('estate-items');

    // Функция для загрузки данных
    const loadData = (showMore) => {
        let url = '/api/projects';
        if (showMore) {
            url += '?show-more=true';
        }

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    let html = '';
                    data.message.forEach(item => {
                        html += `
                        <a href="/goods/${item.project_id}" class="goods__item-link">
                            <div class="estate__item">
                                <img src="${item.image_url}" alt="img">
                                <div class="estate__item-content estate__content">
                                    <div class="estate__content-info">
                                        <p>${item.region_name}</p>
                                        <p>${item.area} BYN</p>
                                    </div>
                                    <h4 class="estate__content-title">${item.region_street}</h4>
                                    <div class="estate__content-cost estate__cost">
                                        <p>Цена</p>
                                        <div class="estate__cost-text">${item.price}</div>
                                    </div>
                                </div>
                            </div>
                        </a>`;
                    });
                    estateItems.innerHTML = html;
                } else {
                    console.error('Ошибка при загрузке данных');
                }
            })
            .catch(error => console.error('Ошибка при выполнении запроса:', error));
    };

    // При загрузке страницы загружаем только первые 6 записей
    loadData(false);

    // При нажатии на кнопку "Показать ещё" загружаем все записи
    showMoreButton.addEventListener('click', () => {
        loadData(true);
    });
});

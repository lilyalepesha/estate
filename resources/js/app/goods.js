document.addEventListener('DOMContentLoaded', function () {
    const filterButton = document.querySelector('.goods__filter-button');

    loadProjects();

    filterButton.addEventListener('click', function () {
        loadProjects();
    });
});

function loadProjects() {
    const type = document.getElementById('type').value;
    const region = document.getElementById('region').value;

    let url = '/api/goods';

    if (type.trim() !== '' || region.trim() !== '') {
        url += `?type=${type}&region=${region}`;
    }

    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
        .then(response => response.json())
        .then(data => {
            updateGoodsItems(data.data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function updateGoodsItems(data) {
    const goodsItemsContainer = document.querySelector('.goods__items');
    goodsItemsContainer.innerHTML = '';

    data.forEach(item => {
        const isFavorite = item.is_favourite;
        const isArchitect = item.is_architect;

        const goodsItem = `
            <a href="/goods/${item.id}" class="goods__item-link"> <!-- Добавляем ссылку на страницу товара с ID -->
                <div class="goods__item" data-id="${item.id}">
                    <div class="goods__item-start-container" style="${isArchitect ? '' : 'display: none;'}"> <!-- Скрываем кнопку избранного, если is_architect == false -->
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
            </a>
        `;

        goodsItemsContainer.innerHTML += goodsItem;

        document.querySelectorAll('.goods__item').forEach(item => {
            item.addEventListener('click', function () {
                showView(this.getAttribute('data-id'));
            });
        });

        const starContainers = document.querySelectorAll('.goods__item-start-container');
        starContainers.forEach(starContainer => {
            starContainer.addEventListener('click', function () {
                const projectId = this.closest('.goods__item').getAttribute('data-id');
                const isFavorite = !this.querySelector('.goods_item-start').classList.contains('active');
                this.querySelector('.goods_item-start').classList.toggle('active', isFavorite);

                toggleFavorite(projectId, isFavorite);
            });
        });


        function toggleFavorite(projectId, isFavorite) {
            fetch('/api/update/favourites', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    project_id: projectId,
                    is_favourite: isFavorite
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Избранное обновлено успешно');
                        localStorage.setItem(`project_${projectId}_favorite`, isFavorite);
                    } else {
                        console.error('Ошибка при обновлении избранного:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Ошибка при выполнении запроса:', error);
                });
        }

        function showView(projectId) {
            fetch(`/api/goods/view/${projectId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response from server:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    })
}

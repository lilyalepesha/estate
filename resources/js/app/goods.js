document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.goods_item-start');

    stars.forEach(star => {
        star.addEventListener('click', function (event) {
            event.preventDefault();
            const goodsItem = this.closest('.goods__item');

            if (!goodsItem) {
                console.error('Goods item not found');
                return;
            }

            const userType = document.getElementById('userType')?.value;
            const favouriteType = document.getElementById('favouriteType')?.value;
            const favouriteId = goodsItem.querySelector('#favouriteId')?.value;
            const userId = document.getElementById('userId')?.value;

            if (!userType || !favouriteType || !favouriteId || !userId) {
                console.error('Required fields are missing');
                return;
            }

            const isFavourite = goodsItem.classList.contains('active');

            fetch('api/update/favourites', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    user_type: userType,
                    favourite_type: favouriteType,
                    favourite_id: favouriteId,
                    user_id: userId,
                    remove: isFavourite // Pass this to handle removal
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        star.classList.add('active');
                    } else {
                        star.classList.remove('active');
                        console.error(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.goods_item-start');

    stars.forEach(star => {
        const goodsItem = star.closest('.goods__item');
        if (!goodsItem) {
            console.error('Goods item not found for star:', star);
            return;
        }

        const favouriteId = goodsItem.querySelector('#favouriteId')?.value;
        const userId = document.getElementById('userId')?.value;
        const userType = document.getElementById('userType')?.value;
        const favouriteType = document.getElementById('favouriteType')?.value;

        if (!userType || !favouriteType || !favouriteId || !userId) {
            console.error('Required fields are missing');
            return;
        }

        star.addEventListener('click', function (event) {
            event.preventDefault();

            const isFavourite = star.classList.contains('active');

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
                        if (isFavourite) {
                            star.classList.remove('active');
                        } else {
                            star.classList.add('active');
                        }

                        window.location.reload();

                    } else {
                        window.location.reload();
                        console.error(data.message);
                    }
                })
                .catch(error => console.error('Error updating favourites:', error));
        });

        // Initial check and set star class
        fetch(`api/check/favourites?user_type=${userType}&favourite_type=${favouriteType}&favourite_id=${favouriteId}&user_id=${userId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success && data.data) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            })
            .catch(error => console.error('Error checking initial favourites state:', error));
    });
});

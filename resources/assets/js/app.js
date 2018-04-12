/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


$('#products-form').on('submit', function (event) {

    event.preventDefault();

    let data = new FormData();

    data.set('name', $('#name').val());
    data.set('quantity', $('#quantity').val());
    data.set('price', $('#price').val());

    axios.post('/products', data)
        .then(response => {
            window.location.reload();

            //Flash message
        })
        .catch(error => {
            console.log(error)
        })
});

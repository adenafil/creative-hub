import axios from "axios";

let cart = document.getElementById('addCart');

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('addCart').addEventListener('submit', function(event) {

        const formData = new FormData(this);

        const idProduct = document.getElementById('id-product').value;

        axios.post(`/products/${idProduct}/add-to-cart`, formData)
            .then(response => {
                console.log(response.data);
                cart.remove();
            })
            .catch(error => {
                console.error('There was an error!', error);
            });
    });

})

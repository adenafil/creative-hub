import axios from "axios";

document.addEventListener('DOMContentLoaded', () => {
    const x = document.querySelectorAll('a[data-product-id]');
    x.forEach(element => {
        element.addEventListener('click', event => {
            // console.log("click " + element.parentElement.parentElement.parentElement.parentElement.remove());
            length = element.parentElement.parentElement.parentElement.parentElement.parentElement.querySelectorAll('.border-t').length
            if (length === 1) {
                element.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.remove();
            } else {
                console.log('sini');
                element.parentElement.parentElement.parentElement.parentElement.remove();
            }
        })
    })

    const deletesLink = document.querySelectorAll('.delete-cart-products');
    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
    document.querySelectorAll('.delete-cart-products').forEach(e => {
        e.addEventListener('click', event => {
            event.preventDefault();
            console.log(e.getAttribute('data-product-id'));
            const id = e.getAttribute('data-product-id');
            const url = `/cart/delete/${id}`;

            axios.delete(url, {
                headers: {
                    'X-CSRF-TOKEN': csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : null
                }
            })
                .then(function (response) {

                    console.log(response);

                })
                .catch(function(error) {
                    console.error('There was an error deleting the product:', error);
                    alert('Failed to delete product.');
                });

        })
    })
})

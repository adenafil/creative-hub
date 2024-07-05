import axios from "axios";

const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
document.addEventListener('DOMContentLoaded', () => {
    const buttonPaymentMethod = document.querySelectorAll('a[data-id-payment-method]');
    buttonPaymentMethod.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            console.log(button.getAttribute('data-id-payment-method'));
            const id = button.getAttribute('data-id-payment-method');
            const url = `/profile/payment-method/delete/${id}`;

            axios.delete(url, {
                headers : {
                    'X-CSRF-TOKEN': csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : null
                }
            })
                .then(function (response) {
                    console.log(response);
                    button.parentElement.remove();
                })
                .catch(function (error) {
                    console.error('There was an error deleting the payment product:', error);
                    alert('Failed to payment product.');
                })
        })
    })
})

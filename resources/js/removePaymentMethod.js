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
                .then(response => {
                    if (response.data.success) {
                        // Handle success, e.g., show a success message or update the UI
                        console.log(response);
                        button.parentElement.remove();
                        console.log(response.data.message);
                    } else {
                        // Handle failure if success is false but status code is 200
                        console.error(response.data.message);
                    }
                })
                .catch(function (error) {
                    console.error('There was an error deleting the payment product:', error);
                    alert('Payment Method Tidak Boleh Kosong.');
                })
        })
    })
})

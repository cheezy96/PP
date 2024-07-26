import Swal from "sweetalert2"
import "../styles/style.css";

export default {
    confirm: async function(title, text) {
        let promise = new Promise(function(resolve) {
            Swal.fire({
                title,
                text,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                customClass: {
                    // actions: 'my-actions', // actions means both buttons
                    confirmButton:'btn-2',
                    cancelButton:  'btn-1',
                },
              }).then((result) => {
                console.log(result);
                if(result.isConfirmed) {
                    console.log('resolved');
                    resolve(true);
                }
                resolve(false);
              });
        });
        
        return promise;
    }
}


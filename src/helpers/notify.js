import Swal from "sweetalert2"

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
                confirmButtonText: "Yes, delete it!"
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
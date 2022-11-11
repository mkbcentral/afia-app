import Swal from 'sweetalert2'
window.addEventListener('delete-patient-dialog',event=>{
    Swal.fire({
        title: 'Voulez-vous vraiment',
        text: "supprimer le patient ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('patientListener');
        }})
        window.addEventListener('data-dialog-deleted',event=>{
            Swal.fire(
                'Oprétion !',
                event.detail.message,
                'success'
            );
        })
})
window.addEventListener('delete-tarification-dialog',event=>{
    Swal.fire({
        title: 'Voulez-vous vraiment',
        text: "supprimer l'examen ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('tarificationListener');
        }})
        window.addEventListener('data-dialog-deleted',event=>{
            Swal.fire(
                'Oprétion !',
                event.detail.message,
                'success'
            );
        })
})

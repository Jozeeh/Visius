destroy = function(e){
    let url = e.getAttribute('url')
    let token = e.getAttribute('token')
    var resultado = window.confirm('¿Estas seguro de eliminar al usuario?');
    if (resultado === true) {
        
            const request = new XMLHttpRequest();
            request.open('delete', url);
            request.setRequestHeader('X-CSRF-TOKEN', token);
            request.onload = () => {
                if(request.status==200){
                    e.closest('tr').remove()
                    alert('Usuario Eliminado');
                }
            }
            request.onerror = err => rejects(err);
            request.send();
        
    } else { 
        window.alert('Se ah cancelado');
    }
}
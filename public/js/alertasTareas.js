revision = function(e){
    let url = e.getAttribute('url')
    let token = e.getAttribute('token')
    var resultado = window.confirm('¿La tarea ya ah sido finalizada?');
    if (resultado === true) {
        
            const request = new XMLHttpRequest();
            request.open('get', url);
            request.setRequestHeader('X-CSRF-TOKEN', token);
            request.onload = () => {
                if(request.status==200){
                    e.closest('tr').remove()
                    alert('Tarea finalizada');
                }
            }
            request.onerror = err => rejects(err);
            request.send();
        
    } else { 
        window.alert('No se ah aprobado la tarea como finalizada');
    }
}
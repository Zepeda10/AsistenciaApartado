function confirmarEliminar(e){
		var res = confirm("¿Desea eliminar el registro?");
		if(res == false){
		    e.preventDefault();
		}
}

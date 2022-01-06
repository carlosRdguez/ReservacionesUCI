(function(){
    

    // carga los datos de esta pagina
    function cargarIndicadoresMensuales() {
        // Viajes realizados
        var peticion = new XMLHttpRequest();
		peticion.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
                // Actualizar elemento
                if(this.responseText != "Campo faltante") {
                    respuestas = this.responseText.split('*');
                    document.getElementById('viajesRealizados').innerHTML = respuestas[0];
                    html = '';
                    if(respuestas[1] != "Sin informacion") {
                        if(parseInt(respuestas[1]) < 0) {
                            html = "<span class=\"text-danger\"> <i class=\"mdi mdi-arrow-bottom-right\"></i> "+respuestas[1]+"% </span>"+
                            "<span class=\"text-muted\">Desde el último mes</span>";
                        }
                        else if(parseInt(respuestas[1]) > 0) {
                            html = "<span class=\"text-success\"> <i class=\"mdi mdi-arrow-bottom-right\"></i> +"+respuestas[1]+"% </span>"+
                            "<span class=\"text-muted\">Desde el último mes</span>";
                        }
                        else {
                            html = "<span class=\"text-success\"> <i class=\"mdi mdi-arrow-bottom-right\"></i> +"+respuestas[1]+"% </span>"+
                            "<span class=\"text-muted\">Desde el último mes</span>";
                        }
                        document.getElementById('viajesRealizadosPorciento').innerHTML = html;
                    }

                    document.getElementById('viajeros').innerHTML = respuestas[4];
                    html = '';
                    if(respuestas[5] != "Sin informacion") {
                        if(parseInt(respuestas[5]) < 0) {
                            html = "<span class=\"text-danger\"> <i class=\"mdi mdi-arrow-bottom-right\"></i> "+respuestas[5]+"% </span>"+
                            "<span class=\"text-muted\">Desde el último mes</span>";
                        }
                        else if(parseInt(respuestas[5]) > 0) {
                            html = "<span class=\"text-success\"> <i class=\"mdi mdi-arrow-bottom-right\"></i> +"+respuestas[5]+"% </span>"+
                            "<span class=\"text-muted\">Desde el último mes</span>";
                        }
                        else {
                            html = "<span class=\"text-success\"> <i class=\"mdi mdi-arrow-bottom-right\"></i> +"+respuestas[5]+"% </span>"+
                            "<span class=\"text-muted\">Desde el último mes</span>";
                        }
                        document.getElementById('viajerosPorciento').innerHTML = html;
                    }
                    
                    document.getElementById('ganancias').innerHTML = respuestas[2] + "$";
                    html = '';
                    if(respuestas[3] != "Sin informacion") {
                        if(parseInt(respuestas[3]) < 0) {
                            html = "<span class=\"text-danger\"> <i class=\"mdi mdi-arrow-bottom-right\"></i> "+respuestas[3]+"% </span>"+
                            "<span class=\"text-muted\">Desde el último mes</span>";
                        }
                        else if(parseInt(respuestas[3]) > 0) {
                            html = "<span class=\"text-success\"> <i class=\"mdi mdi-arrow-bottom-right\"></i> +"+respuestas[3]+"% </span>"+
                            "<span class=\"text-muted\">Desde el último mes</span>";
                        }
                        else {
                            html = "<span class=\"text-success\"> <i class=\"mdi mdi-arrow-bottom-right\"></i> +"+respuestas[3]+"% </span>"+
                            "<span class=\"text-muted\">Desde el último mes</span>";
                        }
                        document.getElementById('gananciasPorciento').innerHTML = html;
                    }
                    
                    document.getElementById('reservaciones').innerHTML = respuestas[6];
                    html = '';

                    if(respuestas[7] != "Sin informacion") {
                        if(parseInt(respuestas[7]) < 0) {
                            html = "<span class=\"text-danger\"> <i class=\"mdi mdi-arrow-bottom-right\"></i> "+respuestas[7]+"% </span>"+
                            "<span class=\"text-muted\">Desde el último mes</span>";
                        }
                        else if(parseInt(respuestas[7]) > 0) {
                            html = "<span class=\"text-success\"> <i class=\"mdi mdi-arrow-bottom-right\"></i> +"+respuestas[7]+"% </span>"+
                            "<span class=\"text-muted\">Desde el último mes</span>";
                        }
                        else {
                            html = "<span class=\"text-success\"> <i class=\"mdi mdi-arrow-bottom-right\"></i> +"+respuestas[7]+"% </span>"+
                            "<span class=\"text-muted\">Desde el último mes</span>";
                        }
                        document.getElementById('reservacionesPorciento').innerHTML = html;
                    }
                }
                
            }
        }
        a = new Date();
        fecha = a.getFullYear().toString() + "-";
        if (a.getMonth()+1 < 10) {
            fecha += "0" + (a.getMonth()+1).toString() + "-" + a.getDate();
        }
        else {
            fecha += (a.getMonth()+1).toString() + "-" + a.getDate();
        }
        peticion.open('GET', 'php/indexServidor.php?accion=cargarIndicadoresMensuales&fecha='+fecha, true);
        peticion.send();
        
    }
    function cargarTablaVentasMes() {
        // Ventas por mes
        var peticion = new XMLHttpRequest();
		peticion.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
                // Actualizar elemento
                // Bar chart
                new Chart(document.getElementById("chartjs-dashboard-bar"), {
                    type: "bar",
                    data: {
                        labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                        datasets: [{
                            label: "Este año",
                            backgroundColor: window.theme.primary,
                            borderColor: window.theme.primary,
                            hoverBackgroundColor: window.theme.primary,
                            hoverBorderColor: window.theme.primary,
                            data: this.responseText.split('*'),
                            barPercentage: .75,
                            categoryPercentage: .5
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    display: false
                                },
                                stacked: false,
                                ticks: {
                                    stepSize: 20
                                }
                            }],
                            xAxes: [{
                                stacked: false,
                                gridLines: {
                                    color: "transparent"
                                }
                            }]
                        }
                    }
                });
            }
        }
        a = new Date();
        fecha = a.getFullYear().toString() + "-";
        if (a.getMonth()+1 < 10) {
            fecha += "0" + (a.getMonth()+1).toString() + "-" + a.getDate();
        }
        else {
            fecha += (a.getMonth()+1).toString() + "-" + a.getDate();
        }
        peticion.open('GET', 'php/indexServidor.php?accion=cargarTablaVentasMes&fecha='+fecha, true);
        peticion.send();
    }
    function cargarTablaUltimosViajes() {
        // Ultimos viajes
        var peticion = new XMLHttpRequest();
		peticion.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
                // Actualizar elemento
                document.getElementById('ultimosViajes').innerHTML = this.responseText;
            }
        }
        a = new Date();
        fecha = a.getFullYear().toString() + "-";
        if (a.getMonth()+1 < 10) {
            fecha += "0" + (a.getMonth()+1).toString() + "-" + a.getDate();
        }
        else {
            fecha += (a.getMonth()+1).toString() + "-" + a.getDate();
        }
        peticion.open('GET', 'php/indexServidor.php?accion=cargarTablaUltimosViajes&fecha='+fecha, true);
        peticion.send();
    }






    cargarIndicadoresMensuales();
    cargarTablaVentasMes();
    cargarTablaUltimosViajes();
    /*

        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
        <span class="text-muted">Desde el último mes</span>



        <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>

    */
}());
$(function () {
  "use strict";
  
});

let myChart, myChartGasto;
comparacion();
topProductos();
reporteGastos();
stockMinimo();

function comparacion() {
    if (myChart) {
        myChart.destroy();
    }
    const anio = document.querySelector('#anio').value;
    
    const url = base_url + 'admin/comparacion/' + anio;
    const http = new XMLHttpRequest();
    //Abrir una Conexion - POST - GET
    http.open("GET", url, true);
    //Enviar Datos
    http.send();
    //verificar estados
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        document.querySelector('#totalVentas').textContent = res.totalVentas.total;
    document.querySelector('#totalCompras').textContent  = res.totalCompras.total;
        // chart 1

        var ctx = document.getElementById("comparacion").getContext("2d");

        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, "#6078ea");
        gradientStroke1.addColorStop(1, "#17c5ea");

        var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, "#ff8359");
        gradientStroke2.addColorStop(1, "#ffdf40");

        myChart = new Chart(ctx, {
            type: "bar",
            data: {
            labels: [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Setiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            datasets: [
                {
                label: "Ventas",
                data: [res.venta.enero, res.venta.febrero, res.venta.marzo, res.venta.abril, res.venta.mayo, res.venta.junio, res.venta.julio, res.venta.agosto, res.venta.setiembre, res.venta.octubre, res.venta.noviembre, res.venta.diciembre],
                borderColor: gradientStroke1,
                backgroundColor: gradientStroke1,
                hoverBackgroundColor: gradientStroke1,
                pointRadius: 0,
                fill: false,
                borderWidth: 0,
                },
                {
                label: "Compras",
                data: [res.compra.enero, res.compra.febrero, res.compra.marzo, res.compra.abril, res.compra.mayo, res.compra.junio, res.compra.julio, res.compra.agosto, res.compra.setiembre, res.compra.octubre, res.compra.noviembre, res.compra.diciembre],
                borderColor: gradientStroke2,
                backgroundColor: gradientStroke2,
                hoverBackgroundColor: gradientStroke2,
                pointRadius: 0,
                fill: false,
                borderWidth: 0,
                },
            ],
            },

            options: {
            maintainAspectRatio: false,
            legend: {
                position: "bottom",
                display: false,
                labels: {
                boxWidth: 8,
                },
            },
            tooltips: {
                displayColors: false,
            },
            scales: {
                xAxes: [
                {
                    barPercentage: 0.5,
                },
                ],
            },
            },
        });
        }
    };
    
}

function topProductos() {
    const url = base_url + 'admin/topProductos/';
    const http = new XMLHttpRequest();
    //Abrir una Conexion - POST - GET
    http.open("GET", url, true);
    //Enviar Datos
    http.send();
    //verificar estados
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        // chart 2

        var ctx = document.getElementById("topProductos").getContext("2d");

        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, "#fc4a1a");
        gradientStroke1.addColorStop(1, "#f7b733");

        var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, "#4776e6");
        gradientStroke2.addColorStop(1, "#8e54e9");

        var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke3.addColorStop(0, "#ee0979");
        gradientStroke3.addColorStop(1, "#ff6a00");

        var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke4.addColorStop(0, "#42e695");
        gradientStroke4.addColorStop(1, "#3bb2b8");
        let nombre = [];
        let cantidad = [];

        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i].descripcion);
            cantidad.push(res[i].ventas);
        }

        var myChart1 = new Chart(ctx, {
            type: "doughnut",
            data: {
            labels: nombre,
            datasets: [
                {
                backgroundColor: [
                    gradientStroke1,
                    gradientStroke2,
                    gradientStroke3,
                    gradientStroke4,
                ],
                hoverBackgroundColor: [
                    gradientStroke1,
                    gradientStroke2,
                    gradientStroke3,
                    gradientStroke4,
                ],
                data: cantidad,
                borderWidth: [1, 1, 1, 1],
                },
            ],
            },
            options: {
            maintainAspectRatio: false,
            cutoutPercentage: 75,
            legend: {
                position: "bottom",
                display: true,
                labels: {
                boxWidth: 8,
                },
            },
            tooltips: {
                displayColors: false,
            },
            },
        });
        }
    };
}

function reporteGastos() {
    if (myChartGasto) {
        myChartGasto.destroy();
    }
    const anioGasto = document.querySelector('#anioGasto').value;

    const url = base_url + 'admin/gastos/' + anioGasto;
    const http = new XMLHttpRequest();
    //Abrir una Conexion - POST - GET
    http.open("GET", url, true);
    //Enviar Datos
    http.send();
    //verificar estados
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        // chart 3

        var ctx = document.getElementById("gastos").getContext("2d");

        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, "#008cff");
        gradientStroke1.addColorStop(1, "rgba(22, 195, 233, 0.1)");

        myChartGasto = new Chart(ctx, {
            type: "line",
            data: {
            labels: ["Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Setiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"],
            datasets: [
                {
                label: "Monto",
                data: [res.enero, res.febrero, res.marzo, res.abril, res.mayo, res.junio, res.julio, res.agosto, res.setiembre, res.octubre, res.noviembre, res.diciembre],
                pointBorderWidth: 2,
                pointHoverBackgroundColor: gradientStroke1,
                backgroundColor: gradientStroke1,
                borderColor: gradientStroke1,
                borderWidth: 3,
                },
            ],
            },
            options: {
            maintainAspectRatio: false,
            legend: {
                position: "bottom",
                display: false,
            },
            tooltips: {
                displayColors: false,
                mode: "nearest",
                intersect: false,
                position: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10,
            },
            },
        });
        }
    };
    
}

function stockMinimo() {
    const url = base_url + 'admin/minimosProductos/';
    const http = new XMLHttpRequest();
    //Abrir una Conexion - POST - GET
    http.open("GET", url, true);
    //Enviar Datos
    http.send();
    //verificar estados
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            // chart 4
            var ctx = document.getElementById("stockMinimo").getContext("2d");
            let nombre = [];
            let cantidad = [];

            for (let i = 0; i < res.length; i++) {
                nombre.push(res[i].descripcion);
                cantidad.push(res[i].cantidad);
            }

            var myChart = new Chart(ctx, {
                type: "pie",
                data: {
                labels: nombre,
                datasets: [
                    {
                    backgroundColor: [
                    '#0c62e0',
                    // '#515a62',
                    '#128e0a',
                    '#e4ad07',
                    '#e20e22'
                    ],

                    hoverBackgroundColor: [
                        '#0c62e0',
                        // '#515a62',
                        '#128e0a',
                        '#e4ad07',
                        '#e20e22'
                    ],

                    data: cantidad,
                    borderWidth: [1, 1, 1],
                    },
                ],
                },
                options: {
                maintainAspectRatio: false,
                cutoutPercentage: 0,
                legend: {
                    position: "bottom",
                    display: true,
                    labels: {
                    boxWidth: 8,
                    },
                },
                tooltips: {
                    displayColors: false,
                },
                },
            });
        }
    };
}
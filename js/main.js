if(document.URL.includes("computadoras.php")){
    function filtrar(){
        let tipo = $("#tipo");
        let fecha1 = $("#fecha1");
        let fecha2 = $("#fecha2");
        let nombre = $("#nombre");

        if(tipo[0].value == 0 && fecha2[0].value == "" && nombre[0].value == ""){
            location.reload()
        }else{
            $.ajax({
                url: "../php/server.php?compu_filter",
                type: "post",
                data: {"tipo": tipo[0].value, "fecha1": fecha1[0].value, "fecha2": fecha2[0].value, "nombre": nombre[0].value},
                success : function(data){
                    console.log(data)
                    $("#table-c-body").html(data);
                }
            })
        }
    }

    $("#nombre").keyup(filtrar);
    $("#tipo").change(filtrar);
    $("#fecha2").change(()=>{
        console.log("date1")
        if(fecha1.value != ""){
            filtrar()
        }
    });

    $("#fecha1").change(()=>{
        console.log("date2")
        if(fecha2.value != ""){
            filtrar()
        }
    });
}
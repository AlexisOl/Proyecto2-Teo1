import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Validators, FormBuilder } from '@angular/forms';
import { areas } from 'src/app/models/areas';
import { asignacionVentaArea } from 'src/app/models/asignacionVentaArea';
import { clientes } from 'src/app/models/clientes';
import { empleadoFactura } from 'src/app/models/ermpleadoFactura';
import { facturas } from 'src/app/models/facturas';
import { venta } from 'src/app/models/venta';
import { RecepcionServicioService } from 'src/app/services/recepcion-servicio.service';
@Component({
  selector: 'app-alquiler-empleado',
  templateUrl: './alquiler-empleado.component.html',
  styleUrls: ['./alquiler-empleado.component.css']
})
export class AlquilerEmpleadoComponent implements OnInit {
  //areglos generales
  datos: any;
  areas:any;
  areasSolicitadas:any=[];

  // elementos a agregar
  binding1:any
  binding2:any


  //elementos de utilidad clietnes
  nit:any;
  usuarioSeleccionado:any;
  nombreCliente:any
  detalle:any
  fecha:any


  //elemento de utilidad para enlazar la factura
  facturaObtenida:any;
  idFacturaActual:any;
  idusuarioVenta:any


  //movimineto del forrm group
  firstFormGroup = this._formBuilder.group({
    firstCtrl: [''],
  });
  secondFormGroup = this._formBuilder.group({
    secondCtrl: [''],
  });
  isLinear = true;

  constructor(private _formBuilder: FormBuilder,
              private empleadoServicio: RecepcionServicioService,
              private http: HttpClient) {}


  //funcion para actualizar elementos solicitados
  areasRequeridas(area:areas){
    this.areas = this.areas.filter((quitar: any) => quitar.nombre !== area.nombre);
    //aqui mejor crear el objeto de tipo "venta"
    const nuevaVenta:asignacionVentaArea = new asignacionVentaArea();
    nuevaVenta.idArea = area.idArea;
    nuevaVenta.nombreArea = area.nombre;
    nuevaVenta.precioUnitario = area.precio;

    // pero son para
    nuevaVenta.horaInicio = parseInt("11");
    nuevaVenta.horaFin = parseInt(area.horaFin);
    nuevaVenta.fecha = null;

    this.areasSolicitadas.push(nuevaVenta);
  }

  //funcion para ver clientes por nit
  verPorNit() {
    this.empleadoServicio.obtenerClientePorNit(String(this.nit)).subscribe(
      (vercliente:clientes) => {
        console.log(vercliente);
        this.usuarioSeleccionado = vercliente;
        //regresa como array asi [0]

         this.nombreCliente =this.usuarioSeleccionado[0].nombre;
      }
    ) ;
  }


  //FUNCION PARA DETERMINAR MONTO HORAS

  DeterminarValoresAreas(){
    console.log(this.areasSolicitadas);

  }
// solo para ver elementos generales
verElementosGeneralesAreas(){
  console.log(this.areasSolicitadas);
  this.areasSolicitadas.forEach(
    (elementos:any) => {
      if (elementos.horaInicio <elementos.horaFin) {
        elementos.horasTotal =  elementos.horaFin -elementos.horaInicio;
        elementos.preciosParciales = elementos.horasTotal*elementos.precioUnitario;
        // los elementos que si se van a comparar
        elementos.horaCorrecta = true;
      }
    }

  )

}
//funcion para ingresar ventas DB
 ingresoVentas(idFactura:number|null){

  this.areasSolicitadas.forEach(
    (generar:any) => {
      const nuevaVenta: venta = new venta();
      nuevaVenta.horas = generar.horasTotal;
      nuevaVenta.idArea = generar.idArea;
      nuevaVenta.montoParcial = generar.preciosParciales;
      nuevaVenta.idFactura = idFactura;
      nuevaVenta.fechaVenta = generar.fecha;
      console.log(nuevaVenta);

      //ahroa mandar elemento
      this.empleadoServicio.crearVentaDetllada(nuevaVenta).subscribe();
    }
  );


  //luego el ingreso de la facuta por empleado;

  const nuevaFacturaAsociada: empleadoFactura = new empleadoFactura();
  nuevaFacturaAsociada.idEmpleado = this.idusuarioVenta;
  nuevaFacturaAsociada.idFactura = idFactura;


  this.empleadoServicio.crearFacturaAsociada(nuevaFacturaAsociada).subscribe();

}

//generador de factura

   generarFactura(){
    const nuevaFactura: facturas = new facturas();
    nuevaFactura.detalle = this.detalle;
    nuevaFactura.nitCliente = this.nit;
    nuevaFactura.fecha = this.fecha;
    nuevaFactura.idFactura = null;
    this.empleadoServicio.crearFactura(nuevaFactura).subscribe(
    );



}

ingresoParaVentas(){
  const nuevaFactura: facturas = new facturas();
  nuevaFactura.detalle = this.detalle;
  nuevaFactura.nitCliente = this.nit;
  nuevaFactura.fecha = this.fecha;
  nuevaFactura.idFactura = null;
  this.empleadoServicio.obtenerFacturaCompra(nuevaFactura).subscribe(
    (nuevo:facturas) => {
      console.log(nuevo);
      let facturaObtenida:any = new facturas();
      facturaObtenida=nuevo;
      this.idFacturaActual = facturaObtenida[0].idFactura
       console.log("aquiiiiiiiii "+this.idFacturaActual);
    }

  );
}







  //--------- INICIALIZADOR
  //--------- INICIALIZADOR
  //--------- INICIALIZADOR
  //--------- INICIALIZADOR

  ngOnInit(): void {

    this.idusuarioVenta = 1;
    // para obtener a cada usuario
    this.empleadoServicio.verUsuarios().subscribe(
      clientes => {
        console.log(clientes);
        this.datos = clientes;

      }
    );
    // para obtenet cada area
    this.empleadoServicio.obtenerAreasGenerales().subscribe(
      areas => {
        this.areas = areas;
      }
    )

  }
}

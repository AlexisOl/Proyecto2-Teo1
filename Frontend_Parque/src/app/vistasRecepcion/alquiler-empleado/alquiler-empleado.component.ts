import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Validators, FormBuilder } from '@angular/forms';
import { areas } from 'src/app/models/areas';
import { asignacionVentaArea } from 'src/app/models/asignacionVentaArea';
import { clientes } from 'src/app/models/clientes';
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
    //ver si es valido con las horas min < max

  }








  //--------- INICIALIZADOR
  //--------- INICIALIZADOR
  //--------- INICIALIZADOR
  //--------- INICIALIZADOR

  ngOnInit(): void {

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

import { Component, OnInit } from '@angular/core';
import { areas } from 'src/app/models/areas';
import { asignacionVentaArea } from 'src/app/models/asignacionVentaArea';
import { reservacion } from 'src/app/models/reservacion';
import { RecepcionServicioService } from 'src/app/services/recepcion-servicio.service';

@Component({
  selector: 'app-reservaciones-empleados',
  templateUrl: './reservaciones-empleados.component.html',
  styleUrls: ['./reservaciones-empleados.component.css']
})
export class ReservacionesEmpleadosComponent implements OnInit {
  areasSolicitadas:any=[];
  areas:any
  idEmpleado:any
  nit:any


  constructor(private rececpcionServicio: RecepcionServicioService){}


  //funcion para mandar a pedir areas
  verAreas(){
    // para obtenet cada area
    this.rececpcionServicio.obtenerAreasGenerales().subscribe(
      areas => {
        this.areas = areas;
      }
    )
  }


    //funcion para actualizar elementos solicitados
    areasRequeridas(area:areas){
      this.areas = this.areas.filter((quitar: any) => quitar.nombre !== area.nombre);
      //aqui mejor crear el objeto de tipo "venta"
      const nuevaReservacion:reservacion = new reservacion();
      nuevaReservacion.idArea = area.idArea;
      nuevaReservacion.nitCliente =this.nit;

      // pero son para
      nuevaReservacion.idEmpleado = parseInt("2");
      nuevaReservacion.fecha_reserva =null;
      nuevaReservacion.fecha_fin_reserva = null;

      this.areasSolicitadas.push(nuevaReservacion);
    }


    //ver reservaciones
    DeterminarValoresAreas(){
      console.log(this.areasSolicitadas);
      this.areasSolicitadas.forEach(
        (reservacionIndividual:any) => {
          reservacionIndividual.fecha_fin_reserva=reservacionIndividual.fecha_reserva
          this.rececpcionServicio.generarReservacion(reservacionIndividual).subscribe();
        }
      )

    }
  ngOnInit() {
    this.verAreas();
  }

}

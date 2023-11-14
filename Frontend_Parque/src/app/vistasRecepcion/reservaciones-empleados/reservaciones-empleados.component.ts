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
  areasSolicitadasFinal:any=[];
  areas:any
  idEmpleado:any
  nit:any

  // elementos de ayuda
  invalidezReservacion:boolean = false;


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
      //hacer funcion de cambio de array en caso no sea valido
    this.areasSolicitadas.filter((area:any) => !area.invalido);
      console.log(this.areasSolicitadas);
      console.log("nuevo", this.areasSolicitadasFinal);
      this.areasSolicitadasFinal.forEach(
        (reservacionIndividual:any) => {
          reservacionIndividual.fecha_fin_reserva=reservacionIndividual.fecha_reserva
          this.rececpcionServicio.generarReservacion(reservacionIndividual).subscribe();
        }
      )

    }


 //funcion para ver si se pueden las reservas
    verValidaciones() {
      this.areasSolicitadas.forEach((reservacionIndividual: any) => {
        this.rececpcionServicio.yaHayReservaciones(reservacionIndividual.idArea, reservacionIndividual.fecha_reserva).subscribe(
          sihay => {
            console.log(sihay);

            if (!sihay) {
              // Verificar si el idArea ya está en areasSolicitadasFinal
              const areaExistente = this.areasSolicitadasFinal.find((area: any) => area.idArea === reservacionIndividual.idArea);
              if (!areaExistente) {
                this.areasSolicitadasFinal.push(reservacionIndividual);
              }
            } else {
              this.invalidezReservacion = true;
              const areaExistente = this.areasSolicitadasFinal.find((area: any) => area.idArea === reservacionIndividual.idArea);
              if (areaExistente) {
                this.areasSolicitadasFinal.pop(reservacionIndividual);
              }
            }
          }
        );
      });
    }

  ngOnInit() {
    this.verAreas();
  }

}

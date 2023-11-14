import { Component, OnInit } from '@angular/core';
import { usuarios } from 'src/app/models/usuarios';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';
import { RecepcionServicioService } from 'src/app/services/recepcion-servicio.service';

@Component({
  selector: 'app-ver-agenda',
  templateUrl: './ver-agenda.component.html',
  styleUrls: ['./ver-agenda.component.css']
})
export class VerAgendaComponent implements OnInit{
  datos:any;
  reservaciones:any;
  usuarios:usuarios[];

  constructor(private empleadoServicio:RecepcionServicioService,
    private adminServicio: AdministradorService){}

    private obtenerEmpleados()  {
      this.adminServicio.obtenerEmpleados().subscribe(dato=>{
        this.usuarios = dato;
      });
    }


  ngOnInit() {



    this.obtenerEmpleados();
    this.empleadoServicio.verReservacionesGlobales().subscribe(
      facturasGeneradas => {
        this.reservaciones = facturasGeneradas;
        console.log(facturasGeneradas);
      }
    );


    this.empleadoServicio.obtenerFacturasGlobales().subscribe(
      facturasGeneradas => {
        this.datos = facturasGeneradas;
        console.log(this.datos);
      }
    );


  }


}


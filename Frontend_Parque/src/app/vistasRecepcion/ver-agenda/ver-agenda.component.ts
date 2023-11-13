import { Component, OnInit } from '@angular/core';
import { RecepcionServicioService } from 'src/app/services/recepcion-servicio.service';

@Component({
  selector: 'app-ver-agenda',
  templateUrl: './ver-agenda.component.html',
  styleUrls: ['./ver-agenda.component.css']
})
export class VerAgendaComponent implements OnInit{
  datos:any;


  constructor(private empleadoServicio:RecepcionServicioService){}




  ngOnInit() {
    this.empleadoServicio.obtenerFacturasGlobales().subscribe(
      facturasGeneradas => {
        this.datos = facturasGeneradas;
      }
    )
  }
}


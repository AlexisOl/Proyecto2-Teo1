import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-header-recepcion',
  templateUrl: './header-recepcion.component.html',
  styleUrls: ['./header-recepcion.component.css']
})
export class HeaderRecepcionComponent {


  constructor(private rutas:Router) {}

  irAlquiler() {
    this.rutas.navigate(['./generalRecepcion/alquiler']);
  }
  irInicioRecepcion() {
    this.rutas.navigate(['./generalRecepcion']);
  }
  irReservacion() {
    this.rutas.navigate(['./generalRecepcion/reservaciones']);
  }
  irCrearCliente() {
    this.rutas.navigate(['./generalRecepcion/crearCliente']);
  }
  irVerAgenda() {
    this.rutas.navigate(['./generalRecepcion/verAgenda']);
  }
}

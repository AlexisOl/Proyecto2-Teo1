import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { LoginService } from 'src/app/services/login/login.service';

@Component({
  selector: 'app-header-recepcion',
  templateUrl: './header-recepcion.component.html',
  styleUrls: ['./header-recepcion.component.css']
})
export class HeaderRecepcionComponent {


  constructor(private rutas:Router,public loginService:LoginService) {}

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

  public cerrarSesion(){
    this.loginService.logOut();
    window.location.reload();
  }

}

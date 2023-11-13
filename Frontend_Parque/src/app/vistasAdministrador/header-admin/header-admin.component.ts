import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { LoginService } from 'src/app/services/login/login.service';

@Component({
  selector: 'app-header-admin',
  templateUrl: './header-admin.component.html',
  styleUrls: ['./header-admin.component.css']
})
export class HeaderAdminComponent {

  constructor(private rutas:Router,public loginService:LoginService) {}

  irAreas() {
    this.rutas.navigate(['administrador/areas']);
  }
  irEmpleados() {
    this.rutas.navigate(['administrador/empleados']);
  }
  irClientes() {
    this.rutas.navigate(['administrador/clientes']);
  }
  irAnuncios() {
    this.rutas.navigate(['administrador/anuncios']);
  }
  irComentarios() {
    this.rutas.navigate(['administrador/comentarios']);
  }

  public cerrarSesion(){
    this.loginService.logOut();
    window.location.reload();
  }

}

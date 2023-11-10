import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-header-admin',
  templateUrl: './header-admin.component.html',
  styleUrls: ['./header-admin.component.css']
})
export class HeaderAdminComponent {

  constructor(private rutas:Router) {}

  irAreas() {
    this.rutas.navigate(['administrador/areas']);
  }
  irEmpleados() {
    this.rutas.navigate(['administrador/empleados']);
  }
  irClientes() {
    this.rutas.navigate(['administrador/clientes']);
  }
  irComentarios() {
    this.rutas.navigate(['administrador/comentarios']);
  }

}

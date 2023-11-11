import { Component } from '@angular/core';
import { usuarios } from 'src/app/models/usuarios';

@Component({
  selector: 'app-empleados-admin',
  templateUrl: './empleados.component.html',
  styleUrls: ['./empleados.component.css']
})
export class EmpleadosComponent {

  usuarios: usuarios[] = [
    { id:1, nombre: "Luisa Lopez", usuario:'llop', rol: 1, contrasenia: '' },
    { id:1, nombre: "Antonino Conte", usuario:'acont', rol: 2, contrasenia: '' },
    { id:1, nombre: "Virginia Diaz", usuario:'vdiaz', rol: 3, contrasenia: '' },
  ];

}





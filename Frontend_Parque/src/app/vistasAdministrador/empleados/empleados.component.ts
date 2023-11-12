import { Component } from '@angular/core';
import { usuarios } from 'src/app/models/usuarios';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';

@Component({
  selector: 'app-empleados-admin',
  templateUrl: './empleados.component.html',
  styleUrls: ['./empleados.component.css']
})
export class EmpleadosComponent {

  usuarios:usuarios[];

  constructor(private administradorService:AdministradorService){}

  ngOnInit(): void {
    this.obtenerEmpleados();
  }

  private obtenerEmpleados()  {
    this.administradorService.obtenerEmpleados().subscribe(dato=>{
      this.usuarios = dato;
    });
  }



}





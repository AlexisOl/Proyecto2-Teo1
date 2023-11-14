import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Rol } from 'src/app/models/rol';
import { usuarios } from 'src/app/models/usuarios';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';

@Component({
  selector: 'app-editar-empleado',
  templateUrl: './editar-empleado.component.html',
  styleUrls: ['./editar-empleado.component.css']
})
export class EditarEmpleadoComponent {

  id_empleado:any;
  empleado:usuarios;
  roles:Rol[];


  constructor(private administradorService:AdministradorService,private router:Router){
    this.id_empleado = this.router.getCurrentNavigation()?.extras;
  }

  ngOnInit(): void {
    this.obtenerEmpleado();
    this.obtenerRoles();
  }

  private obtenerEmpleado(){
    this.administradorService.obtenerEmpleadoId(this.id_empleado).subscribe(data=>{
      this.empleado = data;
    });
  }

  private obtenerRoles()  {
    this.administradorService.obtenerRoles().subscribe(data=>{
      this.roles = data;
    });
  }




}

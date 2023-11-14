import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Rol } from 'src/app/models/rol';
import { usuarios } from 'src/app/models/usuarios';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-editar-empleado',
  templateUrl: './editar-empleado.component.html',
  styleUrls: ['./editar-empleado.component.css']
})
export class EditarEmpleadoComponent {

  id_empleado:any;
  empleado:usuarios;
  roles:Rol[];
  nuevaContrasenia:string;


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

  public actualizarEmpleado()  {
    
    if(this.empleado.nombre && this.empleado.rol){

      console.log(this.empleado)

      this.administradorService.actualizarEmpleado(this.empleado).subscribe((response)=>{

        if(response.success){

          Swal.fire({title:'Se actualizó la información del empleado',icon:'success'});
          

        }else{
          
          Swal.fire({title:'No se pudo actualizar el empleado',icon:'error'});
          
        }

      });
      
    }else{
      Swal.fire({title:'Debes ingresar el nombre y el rol',icon:'error'});
    }

  }

  public actualizarContrasenia()  {

    //si esta vacio no actualiza
    if(this.nuevaContrasenia){

      this.administradorService.actualizarContrasenia(this.nuevaContrasenia,this.empleado.idEmpleado).
          subscribe((response)=>{
            if(response.success){
              Swal.fire({title:'Contraseña actualizada',icon:'success'});
            }else{
              Swal.fire({title:'No pudo actualizarse la contraseña',icon:'error'});
            }
      });

    }else{
      Swal.fire({title:'Debes ingresar una contraseña',icon:'error'});
    }



  }





}

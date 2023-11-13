import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Rol } from 'src/app/models/rol';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-crear-empleado',
  templateUrl: './crear-empleado.component.html',
  styleUrls: ['./crear-empleado.component.css']
})
export class CrearEmpleadoComponent {

  nombre:string;
  usuario:string;
  contrasenia:string;
  tipoEmpleado:number;
  
  roles:Rol[];

  constructor(private administradorService:AdministradorService,private router:Router){}

  ngOnInit(): void {
    this.obtenerRoles();
  }

  private obtenerRoles()  {
    this.administradorService.obtenerRoles().subscribe(data=>{
      this.roles = data;
    });
  }

  public crearEmpleado(){
    
    if(this.nombre && this.usuario && this.contrasenia && this.tipoEmpleado){

      this.administradorService.validarUsuarioUnico(this.usuario).subscribe(confirmacion=>{

        if(confirmacion){
          Swal.fire({title:'El nombre de usuario ya esta registrado',icon:'error'});    
        }else{

          let usuario = {
            nombre: this.nombre,
            usuario: this.usuario,
            contrasenia:this.contrasenia,
            rol: this.tipoEmpleado
          };

          this.administradorService.crearEmpleado(usuario).subscribe(confirmacion=>{
            if(confirmacion){
              Swal.fire({title:'Empleado agregado exitosamente',icon:'success'}).then(()=>{
                this.router.navigate(['administrador/empleados']);
              });
            }else{
              Swal.fire({title:'No pudo agregarse el empleado',icon:'error'});    
            }
          });
        }

      });

    }else{

      Swal.fire({title:'Debes ingresar todos los campos',icon:'error'});
      
    }
  }

}

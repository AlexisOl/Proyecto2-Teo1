import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-crear-tipo-area',
  templateUrl: './crear-tipo-area.component.html',
  styleUrls: ['./crear-tipo-area.component.css']
})
export class CrearTipoAreaComponent {

  nombre:string;

  constructor(private administradorService:AdministradorService,private router:Router){}

  public crearTipoArea(){
    
    if(this.nombre){

      this.administradorService.validarTipoAreaUnica(this.nombre).subscribe(confirmacion=>{


        if(!confirmacion){

          let nuevo= {
            nombre:this.nombre
          }
          this.administradorService.crearTipoArea(nuevo).subscribe(confirm=>{

            if(confirm){
              Swal.fire({title:'Tipo de área creada exitosamente',icon:'success'}).then(()=>{
                this.router.navigate(['administrador/areas']);
              });    
            }else{
              Swal.fire({title:'No pudo crearse el tipo de área',icon:'error'});
            }

          });


        }else{
          Swal.fire({title:'Ya existe el tipo de área',icon:'error'});
        }

      });
      

    }else{

      Swal.fire({title:'El campo del nombre no puede estar vacio',icon:'error'});

    }

  }

}

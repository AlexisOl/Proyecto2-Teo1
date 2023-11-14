import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Anuncio } from 'src/app/models/anuncio';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-crear-anuncio',
  templateUrl: './crear-anuncio.component.html',
  styleUrls: ['./crear-anuncio.component.css']
})
export class CrearAnuncioComponent {

  titulo:string;
  descripcion:string;
  
  constructor(private administradorService:AdministradorService,private router:Router){}


  public crearAnuncio(){
    if(this.titulo&&this.descripcion){
      
      let anuncio = {
        titulo: this.titulo,
        descripcion: this.descripcion,
        urlImagen: 'pendiente'
      }

      this.administradorService.crearAnuncio(anuncio).subscribe((confirmacion)=>{
        if(confirmacion){
          Swal.fire({title:'Se creó el anuncio',icon:'success'}).then(() => {
            this.router.navigate(['administrador/anuncios']);
          });    
        }else{
          Swal.fire({title:'No pudo crearse el anuncio',icon:'error'});    
        }
      })
 

    }else{
      Swal.fire({title:'Ingresar un titulo y una descripción para el anuncio',icon:'error'});
    }
  }


}

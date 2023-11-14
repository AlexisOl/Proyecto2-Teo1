import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Anuncio } from 'src/app/models/anuncio';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-anuncios',
  templateUrl: './anuncios.component.html',
  styleUrls: ['./anuncios.component.css']
})
export class AnunciosComponent {

  anuncios:Anuncio[];

  constructor(private routes:Router,private adminstradorService:AdministradorService){

  }

  ngOnInit(): void {
    this.obtenerAnuncios();
  }

  public obtenerAnuncios(){
    this.adminstradorService.obtenerAnuncios().subscribe(data=>{
      this.anuncios = data;
    });
  }

  public crearAnuncio(){

  this.routes.navigate(['administrador/crear-anuncio']);

  }

  public editarAnuncio(idAnuncio:any){
    const id = idAnuncio;
    this.routes.navigate(['administrador/editar-anuncio'],id);
  }

  public eliminarAnuncio(idAnuncio:any){
    const id = idAnuncio;
    this.adminstradorService.eliminarAnuncio(id).subscribe(confirmacion=>{
      if(confirmacion){
        
        Swal.fire({
          title: 'Se eliminó el anuncio correctamente',
          icon: 'success'
        }).then(() => {
          window.location.reload();
        });

      }else{
        Swal.fire({title:'No pudo eliminarse el anuncio',icon:'error'});
      }
    });
  }



}

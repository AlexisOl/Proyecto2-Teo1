import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Anuncio } from 'src/app/models/anuncio';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';

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

  public eliminarAnuncio(){

  }



}

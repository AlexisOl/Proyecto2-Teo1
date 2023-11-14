import { Component } from '@angular/core';
import { Anuncio } from 'src/app/models/anuncio';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';

@Component({
  selector: 'app-anuncios-clientes',
  templateUrl: './anuncios-clientes.component.html',
  styleUrls: ['./anuncios-clientes.component.css']
})
export class AnunciosClientesComponent {

  anuncios:Anuncio[];

  constructor(private adminstradorService:AdministradorService){

  }

  ngOnInit(): void {
    this.obtenerAnuncios();
  }

  public obtenerAnuncios(){
    this.adminstradorService.obtenerAnuncios().subscribe(data=>{
      this.anuncios = data;
      //console.log(data)
    })
  }



}

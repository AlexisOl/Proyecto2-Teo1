import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Anuncio } from 'src/app/models/anuncio';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-editar-anuncio',
  templateUrl: './editar-anuncio.component.html',
  styleUrls: ['./editar-anuncio.component.css']
})
export class EditarAnuncioComponent {

  id_anuncio:any;
  anuncio:Anuncio;
    
  
  constructor(private administradorService:AdministradorService,private router:Router){
    this.id_anuncio = this.router.getCurrentNavigation()?.extras;
  }

  ngOnInit(): void {
    this.obtenerAnuncio();
  }

  private obtenerAnuncio(){
    this.administradorService.obtenerAnuncioId(this.id_anuncio).subscribe(data=>{
      this.anuncio = data;
    });
  }

  public actualizarAnuncio(){
  
    if(this.anuncio.titulo && this.anuncio.descripcion ){

      this.administradorService.actualizarAnuncio(this.anuncio).subscribe((response)=>{

        if (response) {
          Swal.fire({ title: 'Anuncio actualizado exitosamente', icon: 'success' }).then(() => {
            this.router.navigate(['administrador/anuncios']);
          });
        } else {
          Swal.fire({ title: 'No pudo actualizarse el anuncio', icon: 'error' });
        }
      });

    }else{
      Swal.fire({title:'Ingresa el titulo y descripcion del anuncio',icon:'error'});
    }

  }

}

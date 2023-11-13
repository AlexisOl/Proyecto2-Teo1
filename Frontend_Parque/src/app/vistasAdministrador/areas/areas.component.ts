import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Area } from 'src/app/models/area';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';

@Component({
  selector: 'app-areas-admin',
  templateUrl: './areas.component.html',
  styleUrls: ['./areas.component.css']
})
export class AreasComponent {

  areas:Area[];

  constructor(private administradorService:AdministradorService,private router:Router){}

  ngOnInit(): void {
    this.obtenerAreas();
  }

  private obtenerAreas()  {
    this.administradorService.obtenerAreas().subscribe(data=>{
      this.areas = data;
    });
  }

  public crearArea(){
    this.router.navigate(['administrador/crear-area']);
  }

  public crearTipoArea(){
    this.router.navigate(['administrador/crear-tipo-area']);
  }

  public editarArea(id:any){
    var id:any = id;
    this.router.navigate(['administrador/editar-area'],id);
  }

}
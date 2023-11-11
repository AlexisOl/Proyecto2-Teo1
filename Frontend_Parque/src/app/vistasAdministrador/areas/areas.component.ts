import { Component } from '@angular/core';
import { Area } from 'src/app/models/area';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';

@Component({
  selector: 'app-areas-admin',
  templateUrl: './areas.component.html',
  styleUrls: ['./areas.component.css']
})
export class AreasComponent {

  areas:Area[];

  constructor(private administradorService:AdministradorService){}

  ngOnInit(): void {
    this.obtenerAreas();
  }

  private obtenerAreas()  {
    this.administradorService.obtenerAreas().subscribe(data=>{
      this.areas = data;
    });
  }

}

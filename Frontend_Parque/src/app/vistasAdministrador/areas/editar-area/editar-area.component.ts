import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Area } from 'src/app/models/area';
import { TipoArea } from 'src/app/models/tipoArea';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-editar-area',
  templateUrl: './editar-area.component.html',
  styleUrls: ['./editar-area.component.css']
})
export class EditarAreaComponent {
  
  id_area:any;
  area:Area;
  nombreNuevo:string;
  
  tiposAreas:TipoArea[];

  constructor(private administradorService:AdministradorService,private router:Router){
    this.id_area = this.router.getCurrentNavigation()?.extras;
  }

  ngOnInit(): void {
    this.obtenerTiposAreas();
    this.obtenerArea();
  }

  private obtenerTiposAreas()  {
    this.administradorService.obtenerTipoArea().subscribe(data=>{
      this.tiposAreas = data;
    });
  }

  private obtenerArea(){
    this.administradorService.obtenerAreaId(this.id_area).subscribe(data=>{
      this.area = data;
      this.nombreNuevo = this.area.nombre;
    });

  }

  public actualizarArea(){

    if(this.area.nombre && this.area.tipoArea && this.area.horaInicio && this.area.horaFin && this.area.descripcion){
      
      
      if (this.area.capacidad <= 0) {
        Swal.fire({ title: 'La capacidad debe ser mayor a 0', icon: 'error' });
        return;
      }
      
      if (this.area.precio < 0) {
        Swal.fire({ title: 'El precio debe ser mayor o igual a 0', icon: 'error' });
        return;
      }
      
      if (this.area.horaInicio === this.area.horaFin) {
        Swal.fire({ title: 'La hora de apertura y cierre no pueden ser iguales', icon: 'error' });
        return;
      }
      
                
          this.administradorService.actualizarArea(this.area).subscribe((response) => {
                      
            if (response.success) {
              Swal.fire({ title: 'Área actualizada exitosamente', icon: 'success' }).then(() => {
                this.router.navigate(['administrador/areas']);
              });
            } else {
              Swal.fire({ title: 'No pudo agregarse el área', icon: 'error' });
            }
          });
      
  
    }else{
      
      
      Swal.fire({title:'Debes ingresar todos los campos',icon:'error'});
      
    }
  }

  public cambiarNombre(){
      this.administradorService.validarAreaUnica(this.nombreNuevo).subscribe(confirmacion=>{
        console.log(this.nombreNuevo)
        if(!confirmacion){

          this.administradorService.actualizarNombre(this.nombreNuevo,this.area.idArea).subscribe((response)=>{

            if (response.success) {
              Swal.fire({ title: 'Nombre actualizado exitosamente', icon: 'success' });
            } else {
              Swal.fire({ title: 'No pudo actualizarse el nombre', icon: 'error' });
            }
          });

        }else{
          Swal.fire({title:'El nombre del área ya esta en uso, ingresa uno nuevo',icon:'error'});
        }

      });
  }

}

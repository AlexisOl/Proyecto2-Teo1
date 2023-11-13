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
    });
  }

  /*public crearArea(){
   
    if(this.nombre && this.capacidad && this.tipoArea && this.precio && this.horaApertura && this.horaCierra && this.descripcion){
      
  
      if (this.capacidad <= 0) {
        Swal.fire({ title: 'La capacidad debe ser mayor a 0', icon: 'error' });
        return;
      }
      
      if (this.precio < 0) {
        Swal.fire({ title: 'El precio debe ser mayor o igual a 0', icon: 'error' });
        return;
      }
      
      if (this.horaApertura === this.horaCierra) {
        Swal.fire({ title: 'La hora de apertura y cierre no pueden ser iguales', icon: 'error' });
        return;
      }
      
      this.administradorService.validarAreaUnica(this.nombre).subscribe(confirmacion => {
        if (confirmacion) {
          Swal.fire({ title: 'Ya hay un área con el mismo nombre, ingresa un nuevo nombre', icon: 'error' });
        } else {
          const area = {
            nombre: this.nombre,
            capacidad: this.capacidad,
            tipoArea: this.tipoArea,
            precio: this.precio,
            horaInicio: this.horaApertura+":00",
            horaFin: this.horaCierra+":00",
            descripcion: this.descripcion
          };
      
          this.administradorService.crearArea(area).subscribe(confirmacion => {
            if (confirmacion) {
              Swal.fire({ title: 'Área agregada exitosamente', icon: 'success' }).then(() => {
                this.router.navigate(['administrador/areas']);
              });
            } else {
              Swal.fire({ title: 'No pudo agregarse el área', icon: 'error' });
            }
          });
        }
      });
  
    }else{

      Swal.fire({title:'Debes ingresar todos los campos',icon:'error'});
      
    }
  }*/
}

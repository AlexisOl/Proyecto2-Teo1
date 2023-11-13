import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Rol } from 'src/app/models/rol';
import { TipoArea } from 'src/app/models/tipoArea';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-crear-area',
  templateUrl: './crear-area.component.html',
  styleUrls: ['./crear-area.component.css']
})
export class CrearAreaComponent {

  nombre:string;
  capacidad:number;
  tipoArea:number;
  precio:number;
  horaApertura:string;
  horaCierra:string;
  descripcion:string;
  
  tiposAreas:TipoArea[];

  constructor(private administradorService:AdministradorService,private router:Router){}

  ngOnInit(): void {
    this.obtenerTiposAreas();
  }

  private obtenerTiposAreas()  {
    this.administradorService.obtenerTipoArea().subscribe(data=>{
      this.tiposAreas = data;
    });
  }

  public crearArea(){
   
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
  }

}

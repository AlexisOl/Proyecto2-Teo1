import { Component, OnInit } from '@angular/core';
import { clientes } from 'src/app/models/clientes';
import { RecepcionServicioService } from 'src/app/services/recepcion-servicio.service';

@Component({
  selector: 'app-cliente-ingreso',
  templateUrl: './cliente-ingreso.component.html',
  styleUrls: ['./cliente-ingreso.component.css']
})
export class ClienteIngresoComponent implements OnInit{
  nombre:any;
  nit:any;
  estado:any;
  ubicacion:any;

  //constructor
  constructor(private servicioRecepcion: RecepcionServicioService){}
  //funcion para enviar info ingreso cliente;
  enviarDatos(): void {
    const datos = {
      nombre: this.nombre,
      nit: this.nit,
      estado: this.estado,
      ubicacion: this.ubicacion
    };

    this.servicioRecepcion.enviarDatos(datos).subscribe(ver => {
      console.log(ver);
    });

  }

  ingresarCliente() {
    console.log(this.nombre, this.nit, this.estado, this.ubicacion);

    //creacion de objeto
    const nuevoCliente:clientes = new clientes();
    nuevoCliente.nit = this.nit;
    nuevoCliente.id = null;
    nuevoCliente.nombre = this.nit;
    nuevoCliente.estado = this.estado;
    nuevoCliente.ubicacion= this.ubicacion;

    this.servicioRecepcion.ingresoCliente(nuevoCliente).subscribe(
      (ingresado) => {
        console.log(ingresado);

      }
    )


  }

  ngOnInit() {

  }


}

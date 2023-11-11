import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Validators, FormBuilder } from '@angular/forms';
import { areas } from 'src/app/models/areas';
import { clientes } from 'src/app/models/clientes';
import { RecepcionServicioService } from 'src/app/services/recepcion-servicio.service';
@Component({
  selector: 'app-alquiler-empleado',
  templateUrl: './alquiler-empleado.component.html',
  styleUrls: ['./alquiler-empleado.component.css']
})
export class AlquilerEmpleadoComponent implements OnInit {
  //areglos generales
  datos: any;
  areas:any;
  areasSolicitadas:any=[];


  //elementos de utilidad clietnes
  nit:any;
  usuarioSeleccionado:any;
  nombreCliente:any



  //movimineto del forrm group
  firstFormGroup = this._formBuilder.group({
    firstCtrl: ['', Validators.required],
  });
  secondFormGroup = this._formBuilder.group({
    secondCtrl: ['', Validators.required],
  });
  isLinear = false;

  constructor(private _formBuilder: FormBuilder,
              private empleadoServicio: RecepcionServicioService,
              private http: HttpClient) {}


  //funcion para actualizar elementos solicitados
  areasRequeridas(area:areas){
    this.areas = this.areas.filter((quitar: any) => quitar.nombre !== area.nombre);
    this.areasSolicitadas.push(area);
  }

  //funcion para ver clientes por nit
  verPorNit() {
    this.empleadoServicio.obtenerClientePorNit(String(this.nit)).subscribe(
      (vercliente:clientes) => {
        console.log(vercliente);
        this.usuarioSeleccionado = vercliente;
        //regresa como array asi [0]

         this.nombreCliente =this.usuarioSeleccionado[0].nombre;
      }
    ) ;
  }


  ngOnInit(): void {

    // para obtener a cada usuario
    this.empleadoServicio.verUsuarios().subscribe(
      clientes => {
        console.log(clientes);
        this.datos = clientes;

      }
    );
    // para obtenet cada area
    this.empleadoServicio.obtenerAreasGenerales().subscribe(
      areas => {
        this.areas = areas;
      }
    )

  }
}

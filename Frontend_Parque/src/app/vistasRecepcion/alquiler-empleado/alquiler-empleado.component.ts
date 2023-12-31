import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Validators, FormBuilder } from '@angular/forms';
import { RecepcionServicioService } from 'src/app/services/recepcion-servicio.service';
@Component({
  selector: 'app-alquiler-empleado',
  templateUrl: './alquiler-empleado.component.html',
  styleUrls: ['./alquiler-empleado.component.css']
})
export class AlquilerEmpleadoComponent implements OnInit {
  datos: any;
  nit:any;


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


  verPorNit() {
    this.empleadoServicio.obtenerClientePorNit(String(this.nit)).subscribe(
      vercliente => {
        console.log(vercliente);
      }
    ) ;
  }


  ngOnInit(): void {
    this.empleadoServicio.verUsuarios().subscribe(
      clientes => {
        console.log(clientes);
        this.datos = clientes;

      }
    )
  }
}

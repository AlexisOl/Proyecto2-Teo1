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
              private empleadoServicio: RecepcionServicioService) {}


              verPorNit() {
                console.log(this.nit);

                this.empleadoServicio.buscarClienteNit(this.nit).subscribe(
                  (elemento: any) => {
                    console.log(elemento);
                  },
                  (error: any) => {
                    console.error(error);
                  }
                );
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

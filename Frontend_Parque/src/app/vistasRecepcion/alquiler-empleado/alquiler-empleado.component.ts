import { Component } from '@angular/core';
import { Validators, FormBuilder } from '@angular/forms';
@Component({
  selector: 'app-alquiler-empleado',
  templateUrl: './alquiler-empleado.component.html',
  styleUrls: ['./alquiler-empleado.component.css']
})
export class AlquilerEmpleadoComponent {
  firstFormGroup = this._formBuilder.group({
    firstCtrl: ['', Validators.required],
  });
  secondFormGroup = this._formBuilder.group({
    secondCtrl: ['', Validators.required],
  });
  isLinear = false;

  constructor(private _formBuilder: FormBuilder) {}
}

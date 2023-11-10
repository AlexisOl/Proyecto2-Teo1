import { Component } from '@angular/core';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {

  loginData = {
    usuario: '',
    contrasenia: '',
  };

  public login(){
    
    this.validarCredenciales() == true ? this.iniciarSesion() : Swal.fire({title:'Debes ingresar un usuario y contraseña',icon:'error'});

  }

  public validarCredenciales(){
    if(this.loginData.usuario =='' || this.loginData.contrasenia ==''){
      return false;
    }
    return true;
  }

  public iniciarSesion(){
    alert("Ingresar");
  }

}

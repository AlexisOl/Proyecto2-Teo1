import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { LoginService } from 'src/app/services/login/login.service';
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

  constructor(private loginService: LoginService,private router:Router) {
    
  }

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
   /* this.loginService.login(this.loginData).subscribe((data:any)=>{
      if(data==''){
      
        Swal.fire({
          icon: 'warning',
          title: 'Credenciales incorrectas',
          confirmButtonText: 'Continuar'
        });

      }else{

       // this.loginService.sesion(data);

        if (this.loginService.getUsuario()!=null) {

          switch (this.loginService.getRol()) {
            //admin general
            case 1:
              this.router.navigate(['adminstrador']);
              this.loginService.loginStatusSubject.next(true);
              break;
            //finanzas
            case 2:
              this.router.navigate(['generalRecepcion']);
              this.loginService.loginStatusSubject.next(true);
              break;
            //recepcionista
            case 3:
              this.router.navigate(['recepcionista']);
              this.loginService.loginStatusSubject.next(true);
              break;
          }
        }
        

      }

    });*/
    this.router.navigate(['administrador']);
  }

}

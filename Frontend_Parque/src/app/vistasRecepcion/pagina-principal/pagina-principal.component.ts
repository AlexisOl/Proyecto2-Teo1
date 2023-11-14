import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { usuarios } from 'src/app/models/usuarios';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';
import { LoginService } from 'src/app/services/login/login.service';

@Component({
  selector: 'app-pagina-principal',
  templateUrl: './pagina-principal.component.html',
  styleUrls: ['./pagina-principal.component.css']
})
export class PaginaPrincipalComponent {

  nombre:string;
  usuario:string;
  rol:string;

  constructor(public login:LoginService,private router:Router){}

  ngOnInit(): void {
    
    this.nombre = this.login.getNombre();
    this.usuario = this.login.getUsuario();
    this.rol = this.login.getRol();


  }



}

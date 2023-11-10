import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, Subject } from 'rxjs';
import { usuarios } from 'src/app/models/usuarios';

const baseURL ="http://localhost/Backend_Parque/index.php";

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  
  public loginStatusSubject = new Subject<boolean>;

  constructor(private http:HttpClient) { }

  public login(loginData: any): Observable<usuarios> {

    return this.http.post<usuarios>(`${baseURL}/login`, loginData);
      
  }

  public sesion(usuario:any){

    localStorage.setItem('usuario',JSON.stringify(usuario));
  }

  public estaLoggeado(){
    let userStorage = localStorage.getItem('usuario');

    if(userStorage==undefined || userStorage == '' || userStorage == null){
      return false;
    }else{
      return true;
    }

  }

  public logOut(){
    localStorage.removeItem('usuario');
    return true;
  }

  public getUsuario(){
    let userStorage = localStorage.getItem('usuario');
    if(userStorage!=null){
      return JSON.parse(userStorage);
    }else{
      this.logOut();
      return null;
    }
  }

  public getRol(){
    let userStorage = this.getUsuario();
    if(userStorage!=null){
      return userStorage.rol;
    }else{
      this.logOut();
      return null;
    }
  }

  public getNombre(){
    let userStorage = this.getUsuario();
    if(userStorage!=null){
      return userStorage.nombre;
    }else{
      this.logOut();
      return null;
    }
  }

  public getNombreUsuario(){
    let userStorage = this.getUsuario();
    if(userStorage!=null){
      return userStorage.usuario;
    }else{
      this.logOut();
      return null;
    }
  }

  public getId(){
    let userStorage = this.getUsuario();
    if(userStorage!=null){
      return userStorage._id;
    }else{
      this.logOut();
      return null;
    }
  }

}

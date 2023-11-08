import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { usuarios } from '../models/usuarios';

@Injectable({
  providedIn: 'root'
})
export class RecepcionServicioService {


  readonly URL ="http://localhost:8080/api/";

  constructor(private http: HttpClient) { }


  //funcion para ver a los usuarios SOLO PRUEBA

  verUsuarios():Observable<usuarios> {
    return this.http.get<usuarios>(this.URL+"verUsuarios");
  }
}

import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { usuarios } from '../models/usuarios';

@Injectable({
  providedIn: 'root'
})
export class RecepcionServicioService {


  // GENERO LA URL DEL LOCALHOST
  readonly URL ="http://localhost/Backend_Parque/controladores/recepcion.php";

  constructor(private http: HttpClient) { }


  //funcion para ver a los usuarios SOLO PRUEBA

  verUsuarios():Observable<any> {
    return this.http.get<any>(this.URL+"?action=getColaboradores");
  }

  buscarClienteNit(nit:string):Observable<any> {
    return this.http.get<any>(this.URL+"?action=getClienteNit&datos="+nit);
  }
}

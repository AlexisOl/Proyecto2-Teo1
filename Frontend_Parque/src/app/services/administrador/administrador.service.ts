import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Area } from 'src/app/models/area';
import { clientes } from 'src/app/models/clientes';
import { usuarios } from 'src/app/models/usuarios';

const baseURL ="http://localhost/Backend_Parque";

@Injectable({
  providedIn: 'root'
})
export class AdministradorService {

  constructor(private http: HttpClient) { }

public obtenerEmpleados(): Observable<usuarios[]> {

  return this.http.get<usuarios[]>(`${baseURL}/obtener-empleados-admin`);
      
}

public obtenerClientes(): Observable<clientes[]> {

  return this.http.get<clientes[]>(`${baseURL}/obtener-clientes-admin`);
      
}

public obtenerAreas(): Observable<Area[]> {

  return this.http.get<Area[]>(`${baseURL}/obtener-areas-admin`);
      
}

}

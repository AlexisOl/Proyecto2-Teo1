import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Area } from 'src/app/models/area';
import { clientes } from 'src/app/models/clientes';
import { Rol } from 'src/app/models/rol';
import { TipoArea } from 'src/app/models/tipoArea';
import { usuarios } from 'src/app/models/usuarios';

const baseURL ="http://localhost/Backend_Parque/index.php?action=";
const baseURL2 ="http://localhost/Backend_Parque/index.php";

@Injectable({
  providedIn: 'root'
})

            /** MOSTAR */
export class AdministradorService {

  constructor(private http: HttpClient) { }

public obtenerEmpleados(): Observable<usuarios[]> {

  return this.http.get<usuarios[]>(`${baseURL}obtener-empleados-admin`);
      
}

public obtenerClientes(): Observable<clientes[]> {

  return this.http.get<clientes[]>(`${baseURL}obtener-clientes-admin`);
      
}

public obtenerAreas(): Observable<Area[]> {

  return this.http.get<Area[]>(`${baseURL}obtener-areas-admin`);
      
}

public obtenerRoles(): Observable<Rol[]> {

  return this.http.get<Rol[]>(`${baseURL}obtener-roles-admin`);
      
}

public obtenerTipoArea(): Observable<TipoArea[]> {

  return this.http.get<TipoArea[]>(`${baseURL}obtener-tipos-area`);
      
}

public obtenerAreaId(id:any): Observable<Area> {

  const params = new HttpParams().set('id', id);

  return this.http.get<Area>(`${baseURL}obtener-area-admin`, {params} );
      
}

        /** VALIDACIONES */

public validarUsuarioUnico(usuario:any): Observable<boolean> {

  const params = new HttpParams().set('usuario', usuario);

  return this.http.get<boolean>(`${baseURL}validar-usuario-admin`, {params} );
      
}

public validarAreaUnica(nombre:any): Observable<boolean> {

  const params = new HttpParams().set('nombre', nombre);

  return this.http.get<boolean>(`${baseURL}validar-nombre-area`, {params} );
      
}

public validarTipoAreaUnica(nombre:any): Observable<boolean> {

  const params = new HttpParams().set('nombre', nombre);

  return this.http.get<boolean>(`${baseURL}validar-nombre-tipo-area`, {params} );
      
}

              /** INSERCIONES */

public crearEmpleado(usuario:any):Observable<any>{

  return this.http.post<any>(`${baseURL2}?registrarEmpleado=1`,usuario);

}

public crearTipoArea(nombre:any):Observable<boolean>{

  return this.http.post<boolean>(`${baseURL2}?crear-tipo-area=1`,nombre);

}

public crearArea(area:any):Observable<any>{

  return this.http.post<any>(`${baseURL2}?crear-area=1`,area);

}


}

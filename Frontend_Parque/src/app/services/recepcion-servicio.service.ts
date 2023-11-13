import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { usuarios } from '../models/usuarios';
import { clientes } from '../models/clientes';
import { areas } from '../models/areas';
import { facturas } from '../models/facturas';
import { venta } from '../models/venta';
import { empleadoFactura } from '../models/ermpleadoFactura';

@Injectable({
  providedIn: 'root'
})
export class RecepcionServicioService {


  // GENERO LA URL DEL LOCALHOST
  readonly URL ="http://localhost/Backend_Parque/controladores/recepcion.php";
  readonly URL2 ="http://localhost/Backend_Parque/index.php";
  private url = 'http://localhost/Backend_Parque/index.php';

  constructor(private http: HttpClient) { }


  //funcion para ver a los usuarios SOLO PRUEBA

  verUsuarios():Observable<any> {
    return this.http.get<any>("http://localhost/Backend_Parque/index.php?action=getColaboradores");
  }

  buscarClienteNit(nit:string):Observable<any> {
    return this.http.get<any>(this.URL2+"?action=getClienteNit&datos="+nit);
  }

  buscarClienteNitPrueba(nit:string):Observable<any> {
    return this.http.get<any>(this.URL2+"?insertar=1,"+nit);
  }


  //ver clientes
  obtenerClientePorNit(nit: string): Observable<clientes> {
    const url = `${this.url}?verCliente=${nit}`;
    return this.http.get<clientes>(url);
  }


  //funcion para ingresar clientes
  ingresoCliente(clienteIngreso: clientes):Observable<clientes> {
    return this.http.post<clientes>(this.URL2+"?insertar=1,",clienteIngreso);


  }
    // Utiliza este método para enviar datos al servidor
    enviarDatos(datos: any): Observable<any> {
      const httpOptions = {
        headers: new HttpHeaders({
          'Content-Type': 'application/json'
        })
      };
      return this.http.post<any>("http://localhost/Backend_Parque/index.php", datos, httpOptions);
    }


    //funcion para obtener las areas
    obtenerAreasGenerales():Observable<areas> {
      return this.http.get<areas>(this.url+"?verArea=1");
    }

    //funcion para ingreso de facturas

    crearFactura(nuevaFactura: facturas):Observable<facturas> {
      const httpOptions = {
        headers: new HttpHeaders({
          'Content-Type': 'application/json'
        })
      };
      return this.http.post<facturas>(this.url+"?ingresoFactura=1", nuevaFactura, httpOptions);
    }

    //funcion para la creacion de ventas detalladas

    crearVentaDetllada(nuevaVenta:venta):Observable<venta> {
      const httpOptions = {
        headers: new HttpHeaders({
          'Content-Type': 'application/json'
        })
      };
      return this.http.post<venta>(this.url+"?ingresoVentaDetallada=1", nuevaVenta, httpOptions);
    }

    //funcion para la creacion de venta por usuario
    crearFacturaAsociada(nuevaFacturaAsociada:empleadoFactura):Observable<empleadoFactura> {
      const httpOptions = {
        headers: new HttpHeaders({
          'Content-Type': 'application/json'
        })
      };
      return this.http.post<empleadoFactura>(this.url+"?ingresoFactura=1", nuevaFacturaAsociada, httpOptions);
    }

    //buscar facturas
      //ver clientes
  obtenerFacturaCompra(factura:facturas): Observable<facturas> {
    const url = `${this.url}?verFactura=${factura.nitCliente}&detalleFactura=${factura.detalle}&fechaFactura=${factura.fecha}`;
    return this.http.get<facturas>(url);
  }
}

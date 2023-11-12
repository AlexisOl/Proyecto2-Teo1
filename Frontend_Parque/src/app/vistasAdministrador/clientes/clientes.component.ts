import { Component } from '@angular/core';
import { clientes } from 'src/app/models/clientes';
import { AdministradorService } from 'src/app/services/administrador/administrador.service';

@Component({
  selector: 'app-clientes-admin',
  templateUrl: './clientes.component.html',
  styleUrls: ['./clientes.component.css']
})
export class ClientesComponent {

  clientes:clientes[];

  constructor(private administradorService:AdministradorService){}

  ngOnInit(): void {
    this.obtenerEmpleados();
  }

  private obtenerEmpleados()  {
    this.administradorService.obtenerClientes().subscribe(dato=>{
      this.clientes = dato;
    });
  }

}

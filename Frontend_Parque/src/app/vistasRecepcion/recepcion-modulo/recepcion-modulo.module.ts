import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes, RouterModule } from '@angular/router';
import { PaginaPrincipalComponent } from '../pagina-principal/pagina-principal.component';
import { AlquilerEmpleadoComponent } from '../alquiler-empleado/alquiler-empleado.component';
import { ReservacionesEmpleadosComponent } from '../reservaciones-empleados/reservaciones-empleados.component';
import { ClienteIngresoComponent } from '../cliente-ingreso/cliente-ingreso.component';
import { VerAgendaComponent } from '../ver-agenda/ver-agenda.component';

const routes:Routes = [
  {path: '',
  component:PaginaPrincipalComponent,
  },
  {path: 'alquiler',
  component:AlquilerEmpleadoComponent,
  },
  {path: 'reservaciones',
  component:ReservacionesEmpleadosComponent,
  },
  {path: 'crearCliente',
  component:ClienteIngresoComponent,
  },

  {path: 'verAgenda',
  component:VerAgendaComponent,
  }

]

@NgModule({
  declarations: [],
  imports: [
    RouterModule.forChild(routes)
  ],
  exports: [RouterModule]
})
export class RecepcionModuloModule { }

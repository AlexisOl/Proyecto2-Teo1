import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { VistaInicialComponent } from './vistaGeneral/vista-inicial/vista-inicial.component';
import { LoginComponent } from './vistaGeneral/login/login.component';
import { FinanzasGuard } from './services/login/guard/finanzas.guard';
import { AdminGuard } from './services/login/guard/admin.guard';
import { RecepcionGuard } from './services/login/guard/recepcion.guard';
import { PaginaPrincipalAdminstradorComponent } from './vistasAdministrador/pagina-principal-adminstrador/pagina-principal-adminstrador.component';
import { ClientesComponent } from './vistasAdministrador/clientes/clientes.component';
import { AreasComponent } from './vistasAdministrador/areas/areas.component';
import { EmpleadosComponent } from './vistasAdministrador/empleados/empleados.component';
import { ComentariosComponent } from './vistasAdministrador/comentarios/comentarios.component';
import { CrearEmpleadoComponent } from './vistasAdministrador/empleados/crear-empleado/crear-empleado.component';
import { CrearAreaComponent } from './vistasAdministrador/areas/crear-area/crear-area.component';
import { CrearTipoAreaComponent } from './vistasAdministrador/areas/crear-tipo-area/crear-tipo-area.component';
import { AnunciosComponent } from './vistasAdministrador/anuncios/anuncios.component';
import { EditarAreaComponent } from './vistasAdministrador/areas/editar-area/editar-area.component';


const routes: Routes = [

  {path: '', redirectTo:'inicio',  pathMatch: 'full'},
  {path: 'inicio', component: VistaInicialComponent},
  {path: 'login', component: LoginComponent},
  {path: 'administrador', component: PaginaPrincipalAdminstradorComponent,canActivate: [AdminGuard]},
  {path: 'administrador/areas', component: AreasComponent,canActivate: [AdminGuard]},
  {path: 'administrador/editar-area', component: EditarAreaComponent,canActivate: [AdminGuard]},
  {path: 'administrador/crear-area', component: CrearAreaComponent,canActivate: [AdminGuard]},
  {path: 'administrador/crear-tipo-area', component: CrearTipoAreaComponent,canActivate: [AdminGuard]},
  {path: 'administrador/empleados', component: EmpleadosComponent,canActivate: [AdminGuard]},
  {path: 'administrador/crear-empleado', component: CrearEmpleadoComponent,canActivate: [AdminGuard]},
  //{path: 'administrador/editar-empleado', component: EmpleadosComponent,canActivate: [AdminGuard]},
  {path: 'administrador/clientes', component: ClientesComponent,canActivate: [AdminGuard]},
  {path: 'administrador/anuncios', component: AnunciosComponent,canActivate: [AdminGuard]},
  {path: 'administrador/comentarios', component: ComentariosComponent,canActivate: [AdminGuard]},

  // path para lo de rececpion
  {path: 'generalRecepcion',
  loadChildren: () => import('./vistasRecepcion/recepcion-modulo/recepcion-modulo.module').then(m => m.RecepcionModuloModule), /*canActivate: [FinanzasGuard]*/},
  { path: "**", redirectTo: "inicio"}

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

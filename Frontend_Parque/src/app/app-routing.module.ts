import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { VistaInicialComponent } from './vistaGeneral/vista-inicial/vista-inicial.component';
import { LoginComponent } from './vistaGeneral/login/login.component';

const routes: Routes = [

  {path: '', redirectTo:'inicio',  pathMatch: 'full'},
  {path: 'inicio', component: VistaInicialComponent},
  {path: 'login', component: LoginComponent},

  // path para lo de rececpion
  {path: 'generalRecepcion',
  loadChildren: () => import('./vistasRecepcion/recepcion-modulo/recepcion-modulo.module').then(m => m.RecepcionModuloModule) }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

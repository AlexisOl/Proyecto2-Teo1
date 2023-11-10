import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { VistaInicialComponent } from './vistaGeneral/vista-inicial/vista-inicial.component';
import { LoginComponent } from './vistaGeneral/login/login.component';
import { FinanzasGuard } from './services/login/guard/finanzas.guard';
import { AdminGuard } from './services/login/guard/admin.guard';
import { RecepcionGuard } from './services/login/guard/recepcion.guard';


const routes: Routes = [

  {path: '', redirectTo:'inicio',  pathMatch: 'full'},
  {path: 'inicio', component: VistaInicialComponent},
  {path: 'login', component: LoginComponent},

  // path para lo de rececpion
  {path: 'generalRecepcion',
  loadChildren: () => import('./vistasRecepcion/recepcion-modulo/recepcion-modulo.module').then(m => m.RecepcionModuloModule), canActivate: [FinanzasGuard] }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

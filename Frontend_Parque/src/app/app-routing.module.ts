import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { VistaInicialComponent } from './vistaGeneral/vista-inicial/vista-inicial.component';
import { LoginComponent } from './vistaGeneral/login/login.component';

const routes: Routes = [

  {path: '', redirectTo:'inicio',  pathMatch: 'full'},
  {path: 'inicio', component: VistaInicialComponent},
  {path: 'login', component: LoginComponent},

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { CarouselModule } from 'ngx-bootstrap/carousel';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import {HttpClientModule} from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { VistaInicialComponent } from './vistaGeneral/vista-inicial/vista-inicial.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { FooterComponent } from './utilidades/footer/footer.component';
import { HeaderGeneralComponent } from './vistaGeneral/header-general/header-general.component';
import { LoginComponent } from './vistaGeneral/login/login.component';
import { PaginaPrincipalComponent } from './vistasRecepcion/pagina-principal/pagina-principal.component';
import { HeaderRecepcionComponent } from './vistasRecepcion/header-recepcion/header-recepcion.component';
import {MatToolbarModule} from '@angular/material/toolbar';
import {MatIconModule} from '@angular/material/icon';
import { MatMenuModule } from '@angular/material/menu';
import { MatButtonModule } from '@angular/material/button';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AlquilerEmpleadoComponent } from './vistasRecepcion/alquiler-empleado/alquiler-empleado.component'
import {MatInputModule} from '@angular/material/input';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatStepperModule} from '@angular/material/stepper';
import { ReservacionesEmpleadosComponent } from './vistasRecepcion/reservaciones-empleados/reservaciones-empleados.component';
import { ClienteIngresoComponent } from './vistasRecepcion/cliente-ingreso/cliente-ingreso.component';
import { MatCardModule } from '@angular/material/card';
import { VerAgendaComponent } from './vistasRecepcion/ver-agenda/ver-agenda.component';

@NgModule({
  declarations: [
    AppComponent,
    VistaInicialComponent,
    FooterComponent,
    HeaderGeneralComponent,
    LoginComponent,
    PaginaPrincipalComponent,
    HeaderRecepcionComponent,
    AlquilerEmpleadoComponent,
    ReservacionesEmpleadosComponent,
    ClienteIngresoComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    NgbModule,
    ReactiveFormsModule,
    MatCardModule,
    MatToolbarModule,
    MatIconModule,
    MatMenuModule,
    MatButtonModule,
    BrowserAnimationsModule,
    MatFormFieldModule,
    MatInputModule,
    MatStepperModule,
    CarouselModule.forRoot(),
    VerAgendaComponent
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

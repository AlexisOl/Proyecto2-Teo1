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
import { EmpleadosComponent } from './vistasAdministrador/empleados/empleados.component';
import { AreasComponent } from './vistasAdministrador/areas/areas.component';
import { HeaderAdminComponent } from './vistasAdministrador/header-admin/header-admin.component';
import { CrearEmpleadoComponent } from './vistasAdministrador/empleados/crear-empleado/crear-empleado.component';
import { CrearAreaComponent } from './vistasAdministrador/areas/crear-area/crear-area.component';
import { CrearTipoAreaComponent } from './vistasAdministrador/areas/crear-tipo-area/crear-tipo-area.component';
import { AnunciosComponent } from './vistasAdministrador/anuncios/anuncios.component';
import { CrearAnuncioComponent } from './vistasAdministrador/anuncios/crear-anuncio/crear-anuncio.component';
import { EditarAnuncioComponent } from './vistasAdministrador/anuncios/editar-anuncio/editar-anuncio.component';
import { EditarEmpleadoComponent } from './vistasAdministrador/empleados/editar-empleado/editar-empleado.component';
import { EditarAreaComponent } from './vistasAdministrador/areas/editar-area/editar-area.component';

import { ClientesComponent } from './vistasAdministrador/clientes/clientes.component';
import { ComentariosComponent } from './vistasAdministrador/comentarios/comentarios.component';
import { PaginaPrincipalAdminstradorComponent } from './vistasAdministrador/pagina-principal-adminstrador/pagina-principal-adminstrador.component';
import { AnunciosClientesComponent } from './vistaGeneral/vista-inicial/anuncios-clientes/anuncios-clientes.component';


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
    VerAgendaComponent,
    HeaderAdminComponent,
    EmpleadosComponent,
    AreasComponent,
    HeaderAdminComponent,
    CrearEmpleadoComponent,
    CrearAreaComponent,
    CrearTipoAreaComponent,
    AnunciosComponent,
    CrearAnuncioComponent,
    EditarAnuncioComponent,
    EditarEmpleadoComponent,
    EditarAreaComponent,
    ClientesComponent,
    PaginaPrincipalAdminstradorComponent,
    AnunciosClientesComponent
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
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

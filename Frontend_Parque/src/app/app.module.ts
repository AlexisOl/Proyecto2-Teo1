import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import {HttpClientModule} from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { VistaInicialComponent } from './vistaGeneral/vista-inicial/vista-inicial.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { FooterComponent } from './utilidades/footer/footer.component';
import { HeaderGeneralComponent } from './vistaGeneral/header-general/header-general.component';
import { LoginComponent } from './vistaGeneral/login/login.component';



@NgModule({
  declarations: [
    AppComponent,
    VistaInicialComponent,
    FooterComponent,
    HeaderGeneralComponent,
    LoginComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    NgbModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

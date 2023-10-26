import { TestBed } from '@angular/core/testing';

import { UsuarioSesionServicioService } from './usuario-sesion-servicio.service';

describe('UsuarioSesionServicioService', () => {
  let service: UsuarioSesionServicioService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(UsuarioSesionServicioService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});

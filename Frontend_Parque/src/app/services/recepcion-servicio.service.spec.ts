import { TestBed } from '@angular/core/testing';

import { RecepcionServicioService } from './recepcion-servicio.service';

describe('RecepcionServicioService', () => {
  let service: RecepcionServicioService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(RecepcionServicioService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});

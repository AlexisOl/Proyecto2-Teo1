import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ReservacionesEmpleadosComponent } from './reservaciones-empleados.component';

describe('ReservacionesEmpleadosComponent', () => {
  let component: ReservacionesEmpleadosComponent;
  let fixture: ComponentFixture<ReservacionesEmpleadosComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ReservacionesEmpleadosComponent]
    });
    fixture = TestBed.createComponent(ReservacionesEmpleadosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

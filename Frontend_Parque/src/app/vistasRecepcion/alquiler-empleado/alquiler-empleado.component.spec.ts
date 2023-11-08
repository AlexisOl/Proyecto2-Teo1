import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AlquilerEmpleadoComponent } from './alquiler-empleado.component';

describe('AlquilerEmpleadoComponent', () => {
  let component: AlquilerEmpleadoComponent;
  let fixture: ComponentFixture<AlquilerEmpleadoComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [AlquilerEmpleadoComponent]
    });
    fixture = TestBed.createComponent(AlquilerEmpleadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

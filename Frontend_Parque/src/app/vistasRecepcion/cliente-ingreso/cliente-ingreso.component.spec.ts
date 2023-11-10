import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ClienteIngresoComponent } from './cliente-ingreso.component';

describe('ClienteIngresoComponent', () => {
  let component: ClienteIngresoComponent;
  let fixture: ComponentFixture<ClienteIngresoComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ClienteIngresoComponent]
    });
    fixture = TestBed.createComponent(ClienteIngresoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { ComponentFixture, TestBed } from '@angular/core/testing';

import { VistasAdministradorComponent } from './vistas-administrador.component';

describe('VistasAdministradorComponent', () => {
  let component: VistasAdministradorComponent;
  let fixture: ComponentFixture<VistasAdministradorComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [VistasAdministradorComponent]
    });
    fixture = TestBed.createComponent(VistasAdministradorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

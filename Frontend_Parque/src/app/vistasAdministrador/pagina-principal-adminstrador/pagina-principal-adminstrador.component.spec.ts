import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PaginaPrincipalAdminstradorComponent } from './pagina-principal-adminstrador.component';

describe('PaginaPrincipalAdminstradorComponent', () => {
  let component: PaginaPrincipalAdminstradorComponent;
  let fixture: ComponentFixture<PaginaPrincipalAdminstradorComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PaginaPrincipalAdminstradorComponent]
    });
    fixture = TestBed.createComponent(PaginaPrincipalAdminstradorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

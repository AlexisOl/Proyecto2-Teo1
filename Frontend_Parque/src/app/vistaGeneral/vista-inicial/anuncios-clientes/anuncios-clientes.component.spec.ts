import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AnunciosClientesComponent } from './anuncios-clientes.component';

describe('AnunciosClientesComponent', () => {
  let component: AnunciosClientesComponent;
  let fixture: ComponentFixture<AnunciosClientesComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [AnunciosClientesComponent]
    });
    fixture = TestBed.createComponent(AnunciosClientesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

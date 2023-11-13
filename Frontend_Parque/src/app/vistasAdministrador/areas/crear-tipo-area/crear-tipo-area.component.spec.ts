import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CrearTipoAreaComponent } from './crear-tipo-area.component';

describe('CrearTipoAreaComponent', () => {
  let component: CrearTipoAreaComponent;
  let fixture: ComponentFixture<CrearTipoAreaComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [CrearTipoAreaComponent]
    });
    fixture = TestBed.createComponent(CrearTipoAreaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

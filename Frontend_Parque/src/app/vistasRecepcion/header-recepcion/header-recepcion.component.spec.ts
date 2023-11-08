import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HeaderRecepcionComponent } from './header-recepcion.component';

describe('HeaderRecepcionComponent', () => {
  let component: HeaderRecepcionComponent;
  let fixture: ComponentFixture<HeaderRecepcionComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [HeaderRecepcionComponent]
    });
    fixture = TestBed.createComponent(HeaderRecepcionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

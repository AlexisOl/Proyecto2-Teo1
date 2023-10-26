import { Component } from '@angular/core';

@Component({
  selector: 'app-vista-inicial',
  templateUrl: './vista-inicial.component.html',
  styleUrls: ['./vista-inicial.component.css']
})
export class VistaInicialComponent {
  images = [944, 1011, 984].map((n) => `https://picsum.photos/id/${n}/900/500`);

}

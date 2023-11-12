export class asignacionVentaArea {
  //elementode areas
  idArea!:number|undefined
  nombreArea!:string
  precioUnitario!:number
  // tal vez solo para control
  horaInicio!:number
  horaFin!:number
  //para ventas
  horasTotal:number =0
  fecha!:Date|null;


  // solo elementos de decision
  preciosParciales:number =0
  horaCorrecta:boolean=false



}

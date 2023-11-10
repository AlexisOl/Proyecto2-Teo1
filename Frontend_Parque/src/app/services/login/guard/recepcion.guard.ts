import { Injectable, inject } from "@angular/core";
import { ActivatedRouteSnapshot, CanActivateFn, Router, RouterStateSnapshot } from "@angular/router";
import { LoginService } from "src/app/services/login/login.service";


@Injectable({
  providedIn: 'root'
})

class PermissionsServiceRecepcion {

  constructor(private loginService:LoginService,private router: Router) {}

  canActivate(next: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean {
    
    if(this.loginService.estaLoggeado()&& this.loginService.getRol()==3){
      return true;
    }

    
    this.router.navigate(['login']);
    return false;

  }
}

export const RecepcionGuard: CanActivateFn = (next: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean => {
  return inject(PermissionsServiceRecepcion).canActivate(next, state);
}
import { Injectable, inject } from "@angular/core";
import { ActivatedRouteSnapshot, CanActivateFn, Router, RouterStateSnapshot } from "@angular/router";
import { LoginService } from "src/app/services/login/login.service";


@Injectable({
  providedIn: 'root'
})

class PermissionsServiceFinanzas {

  constructor(private loginService:LoginService,private router: Router) {}

  canActivate(next: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean {
    
    if(this.loginService.estaLoggeado()&& this.loginService.getRol()==2){
      return true;
    }

    
    this.router.navigate(['login']);
    return false;

  }
}

export const FinanzasGuard: CanActivateFn = (next: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean => {
  return inject(PermissionsServiceFinanzas).canActivate(next, state);
}
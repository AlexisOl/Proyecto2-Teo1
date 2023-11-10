import { Injectable, inject } from "@angular/core";
import { ActivatedRouteSnapshot, CanActivateFn, Router, RouterStateSnapshot } from "@angular/router";
import { LoginService } from "src/app/services/login/login.service";


class PermissionsServiceAdmin {

  constructor(private loginService:LoginService,private router: Router) {}

  canActivate(next: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean {
    
    if(this.loginService.estaLoggeado()&& this.loginService.getRol()==1){
      return true;
    }

    
    this.router.navigate(['login']);
    return false;

  }
}

export const AdminGuard: CanActivateFn = (next: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean => {
  return inject(PermissionsServiceAdmin).canActivate(next, state);
}
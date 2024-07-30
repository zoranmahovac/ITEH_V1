import { HttpEvent, HttpHandler, HttpInterceptor, HttpInterceptorFn, HttpRequest } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable()
export class TokenInterceptor implements HttpInterceptor{

  constructor() {}

  //ova metoda samo presrece http zahtev i bukvalno u njegov heder dodaje dati token kako bi user prisao ruti autorizovan, inace body je isti
  intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<unknown>> {
   const token = localStorage.getItem('token');
   const authReq = req.clone({
    setHeaders: { Authorization: `Bearer ${token}`},
   });
   
    return next.handle(authReq);
  }
}

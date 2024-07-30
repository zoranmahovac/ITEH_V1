import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class BrosuraService {

  url: string = 'http://localhost:8000/api';
  constructor(private http:HttpClient){}

  getBrosure(): Observable<any>{

    return this.http.get(`${this.url}/brosure`);
  }
}

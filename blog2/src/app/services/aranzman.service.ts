import { HttpClient, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Aranzman } from '../models/aranzman';
import { map } from 'rxjs/operators';


@Injectable({
  providedIn: 'root'
})
export class AranzmanService {

  url: string = 'http://localhost:8000/api';
  constructor(private http:HttpClient){}

  getAranzmani(): Observable<any>{

    return this.http.get(`${this.url}/aranzmani`);
  }

  getAranzmaniPaged(page:number, pageSize:number): Observable<any>{
    let params = new HttpParams()
    .set('page',page.toString())
    .set('pageSize',pageSize.toString());
    return this.http.get(`${this.url}/aranzmani`,{params});
  }

  getPaginatedAranzmani(page:number): Observable<any>{
    console.log("TYPE:"+typeof(this.http.get(`${this.url}/brosure?page=${page}`)));
    return this.http.get(`${this.url}/brosure?page=${page}`);
  }

}

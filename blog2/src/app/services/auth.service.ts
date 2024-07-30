import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { User } from '../models/user';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  url="http://localhost:8000/api";
  constructor(private http:HttpClient) { }


  login(user: User): Observable<any>{
    return this.http.post(`${this.url}/login`,user);
  }

    // vraca mi ceo http odgovor sa acces tokenom, gmailom, sifrom itd...
    //ovaj token access je kao session ID i on se javlja samo jedanput i traje samo tokom te jedne sesije

  logout(): Observable<any>{
    localStorage.removeItem('token');
    return this.http.post(`${this.url}/logout`,{});
  }


}

import { Injectable } from '@angular/core';
import { User } from '../models/user';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class RegisterService { // u servisu se pise biznis logika, a komponente sluze za prihvatanje podataka poput kontrolera 
  
  url:string = 'http://127.0.0.1:8000/api/register';

  
  // da bi se ovaj servis koristio, potrebno je da se Injectuje, to se postize u konstruktoru register ts fajla
  constructor(private http: HttpClient) { }

  register(user: User):Observable<any> { // neka user bude any, da ne bismo specificirali tip - broj, objekat, formgroup, formcontrol... 
    console.log('login');
    return this.http.post(this.url,user); // POVRATNA VREDNOST JE Observable, genericki tip, bilo kog tipa. Ja ne znam kog je tipa tj. koji objekat sa kojim poljima
  } // ovde se salju podaci API-ju

}

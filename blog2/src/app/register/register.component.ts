import { Component, OnInit } from '@angular/core';
import {FormGroup, FormBuilder, Validators, FormControl} from '@angular/forms';
import { RegisterService } from '../services/register.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrl: './register.component.scss'
})
export class RegisterComponent implements OnInit{
  //emailFormControl = new FormControl('', [Validators.required, Validators.email]);
  registerForm: FormGroup; // forma za registraciju ne mora da ima početnu vrednost
  
  get emailFormControl() {
    return this.registerForm.get('email') as FormControl; // as FormControl da ne bi bio null, FormControl objekat moze da pozove hasError metodu 
  }

  get passwordFormControl() {
    return this.registerForm.get('password') as FormControl;
  }

  get nameFormControl(){
    return this.registerForm.get("name") as FormControl; 
  }

  constructor(private fb:FormBuilder, private registerService: RegisterService, private router: Router) {} // treba nam FormBuilder instanca da bismo napravili grupu, objekat forme 

  ngOnInit(): void {
    this.registerForm = this.fb.group({
      name:['',[Validators.required]],
      email:['', [Validators.email,Validators.required]], //email je prazan niz, kod mejla ne pise nista, imamo 2 validatora,prvi je za email - to je email validator i mejl je required polje
      password: ['',[Validators.required]] // password je prazan niz ... 
    }); // forma je objekat koji prima email, pass, ime
  }
/*  
  {
    ime, 
    email, 
    password,
    adresa:[            // adresa je forma unutar forme 
      ulica ,           // cela forma se predstavlja preko objekta sa nekim propertyjima
      broj, 
      grad, 
    ]
  }
*/

  onSubmit(){
      if (this.registerForm.valid) {
        this.registerService.register(this.registerForm.value).subscribe(res=>localStorage.setItem('token',res.access_token)); // ako je forma validna, prosledini mi vrednosti sa formne. 
        this.router.navigate(['/login'])
      }
      // ovo je objekat koji ima name, email, password 
      
      // da se ubaci rezultat i njegov access token u application, local storage i htttp...


      //console.log(this.registerForm.valid);
      //console.log(this.registerForm.value);
  }



}

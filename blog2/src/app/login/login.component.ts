import { Component } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { AuthService } from '../services/auth.service';
import { Route, Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrl: './login.component.scss'
})
export class LoginComponent {

  loginForm:FormGroup;

  constructor(private fb:FormBuilder, private authService:AuthService, private router:Router){}

  ngOnInit(): void {
    this.loginForm = this.fb.group({
      email:['',[Validators.email, Validators.required]],
      password:['',[Validators.required]],
    });
  }

  get emailFormControl() {
    return this.loginForm.get('email') as FormControl;
  }

  get passwordFormControl() {
    return this.loginForm.get('password') as FormControl;
  }

  //moramo ih transformisati u FormControl type kako bi u html kodu ovi objekti mogli da pozovu metodu hasError npr


  onSubmit(){

    console.log(this.loginForm.value);
    
    if(this.loginForm.valid){
      
      this.authService.login(this.loginForm.value).subscribe(
        res => (localStorage.setItem('token',res.access_token)) //super praksa da stavimo access token u local storage kad se user loguje, pa da ga brisemo iz local storrage-a kad se on unloguje
      );
      //this.router.navigate(['profile']); 
      console.log("logged in.");
      console.log(localStorage.getItem('token')); //ispisi mi access token iz local storrage-a
    }else{
      console.log("not logged in");
    }
  }




}
